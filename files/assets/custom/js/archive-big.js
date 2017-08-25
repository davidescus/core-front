config.archiveBig = $('.page-content-wrapper.archive-big');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

// Clickable - date selection
// change date selection
// trigger function to get available events in selected date.
config.archiveBig.on('change', '.select-date', function() {
    showMonthAvailableEventsInBigArchive();
});

// Clickable - site selection
// change site selection
// show available tables for selected site.
config.archiveBig.on('change', '.select-site', function() {
    $.ajax({
        url: config.coreUrl + "/site/available-table/" + $(this).val(),
        type: "get",
        success: function (response) {

            var data = {
                tables: response,
            }
            var element = config.archiveBig;

            var template = element.find('.template-select-table').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.select-table').html(html).change();
        },
         error: function () {}
    });
});

// Clickable - table selection
// change table selection
// get archive events for selected: site, table, month
config.archiveBig.on('change', '.select-table', function() {
    showMonthAvailableEventsInBigArchive();
});

// Clickable - publish currrent month.
// publish all events for selected month
// - for all tables
config.archiveBig.on('click', '.publishMonth', function() {
    var siteId = config.archiveBig.find('.select-site').val();
    var date = config.archiveBig.find('.select-date').val();

    if (siteId ==  '-') {
        alert('You must select a site.');
        return;
    }
    if (date ==  '-') {
        alert('You must select a month.');
        return;
    }

    $.ajax({
        url: config.coreUrl + "/archive-big/publish-month",
        type: "post",
        data: {
            siteId: siteId,
            date: date,
        },
        success: function (response) {
            alert("Type: --- " + response.type + " --- \r\n" + response.message);
            showMonthAvailableEventsInBigArchive();
        },
         error: function () {}
    });
});

// Clickable - publish changes in site
// publish allbig archive changes in site
// - for all tables
config.archiveBig.on('click', '.publishInSite', function() {
    alert('Not implementd yet');
});

// Clickable - show / hide event
// toogle show/hide even
config.archiveBig.on('click', '.table-content-month .show-hide', function() {
    var $this = $(this);
    $.ajax({
        url: config.coreUrl + "/archive-big/show-hide/" + $this.closest('tr').attr('data-id'),
        type: "get",
        success: function (response) {

            alert("Type: --- " + response.type + " --- \r\n" + response.message);

            if (response.type === 'success') {
                if ($this.hasClass('red'))
                    $this.removeClass('red').addClass('green').text('Show');
                else
                    $this.removeClass('green').addClass('red').text('Hide');
            }
        },
         error: function () {}
    });
});

    /*
     *  ----- Modal Edit -----
    ----------------------------------------------------------------------*/

// Modal - Edit
// get selected event
// get all predictions
// launch modal
config.archiveBig.on('click', '.table-content-month .edit', function() {
    var $this = $(this);
    $.ajax({
        url: config.coreUrl + "/archive-big/event/" + $this.closest('tr').attr('data-id'),
        type: "get",
        success: function (response) {

            if (!response) {
                alert('Maybe this event will not exists anymore.');
                return;
            }

            var data = response;
            var element = $('#archive-big-modal-edit');

            var template = element.find('.template-event-info').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.event-info').html(html);

            // set status selected
            element.find('.status option[value="' + data.statusId + '"]').prop('selected', true).change();

            // set prediction selected
            element.find('.prediction option[value="' + data.predictionId + '"]').prop('selected', true).change();

            element.modal();
        },
         error: function () {}
    });
});

// Modal - Edit
// save edit prediction and status
$('#archive-big-modal-edit').on('click', '.save', function() {
    var element = $('#archive-big-modal-edit');

    $.ajax({
        url: config.coreUrl + "/archive-big/update/prediction-and-status/" + element.find('.event-id').val(),
        type: "post",
        data: {
            siteId: config.archiveBig.find('.select-site').val(),
            predictionId: element.find('.prediction').val(),
            statusId: element.find('.status').val(),
        },
        success: function (response) {

            alert("Type: --- " + response.type + " --- \r\n" + response.message);
            showMonthAvailableEventsInBigArchive();
            element.modal('hide');
        },
         error: function () {}
    });
});

    /*
     *  ----- Functions -----
    ----------------------------------------------------------------------*/

// Functions
// this will be exectuted on page loading.
// will populate site selector
function showAvailableSites() {
    $.ajax({
        url: config.coreUrl + "/site/ids-and-names",
        type: "get",
        success: function (response) {

            var data = {
                sites: response,
            }
            var element = config.archiveBig;

            var template = element.find('.template-select-site').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.select-site').html(html);
        },
         error: function () {}
    });
}

// Functions
// will populate month selector
function showAvailableMonths() {
    $.ajax({
        url: config.coreUrl + "/archive-big/available-months",
        type: "get",
        success: function (response) {

            var data = {
                months: response,
            }
            var element = config.archiveBig;

            var template = element.find('.template-select-date').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.select-date').html(html);

            // select seccond option
            element.find('.select-date option:eq(1)').prop('selected', true);
        },
         error: function () {}
    });

}

// Functions
// this will populate mounth table with events
// it use: select-date, select-site, select-table
function showMonthAvailableEventsInBigArchive() {
    var param = {
        siteId: config.archiveBig.find('.select-site').val(),
        tableIdentifier: config.archiveBig.find('.select-table').val(),
        date: config.archiveBig.find('.select-date').val(),
    };

    if (param.siteId == '-' || param.tableIdentifier == '-' || param.date == '-')
        return;

    $.ajax({
        url: config.coreUrl + "/archive-big/month-events?" + $.param(param),
        type: "get",
        success: function (response) {

            var data = {
                events: response,
            }
            var element = config.archiveBig;

            var template = element.find('.template-table-content-month').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.table-content-month').html(html);
        },
         error: function () {}
    });
}

// Functions
// get and complete predictions in edit modal events
function bigArchiveShowAllPredictions() {
    $.ajax({
        url: config.coreUrl + "/prediction",
        type: "get",
        success: function (response) {

            console.log(response);

            var data = {
                groups: response,
            }
            var element = $('#archive-big-modal-edit');

            var template = element.find('.template-prediction').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.prediction').html(html);
        },
         error: function () {}
    });
}

