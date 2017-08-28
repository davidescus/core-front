config.distribution = $('.page-content-wrapper.distribution');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

// Clickable
// when change select-system-date
// will reload table content with events from selected date.
config.distribution.on('change', '.select-system-date', function() {
    getDistributedEvents($(this).val());
});

// Clickable
// when click on site checkbox
// toogle select/unselect all site events
config.distribution.on('change', '.table-content .select-group-site', function() {
    var siteId = $(this).val();
    var bool = $(this).is(':checked') ? true : false;
    config.distribution.find('.use[data-site-id="' + siteId + '"]').prop('checked', bool);
});

    /*
     *  ----- ACTIONS  -----
    ----------------------------------------------------------------------*/

// Actions
// Publish events in archive
config.distribution.on('click', '.actions .publish', function() {
    $.ajax({
        url: config.coreUrl + "/archive/publish" + "?" + getToken(),
        type: "post",
        data: {
            ids: getCheckedEventsIds(),
        },
        success: function (response) {
            alert("Type: --- " + response.type + " --- \r\n" + response.message);
            getDistributedEvents(config.distribution.find('.select-system-date').val());
        },
        error: function () {}
    });
});

// Actions
// Delete events from distribution
config.distribution.on('click', '.actions .delete', function() {
    $.ajax({
        url: config.coreUrl + "/distribution/delete" + "?" + getToken(),
        type: "post",
        data: {
            ids: getCheckedEventsIds(),
        },
        success: function (response) {
            alert("Type: --- " + response.type + " --- \r\n" + response.message);
            getDistributedEvents(config.distribution.find('.select-system-date').val());
        },
        error: function () {}
    });
});

    /*
     *  ----- Functions -----
    ----------------------------------------------------------------------*/

// Functions - general
// colect in array all checked events from .table-content
// @return []
function getCheckedEventsIds() {
    var d = [];
    config.distribution.find('.table-content .use:checked').each(function(){
        d.push($(this).attr('data-event-id'));
    });
    return d;
}

// Functions
// @string date formaf: YYYY-mm-dd
// get all distributed events and put it on table
function getDistributedEvents(date = '0') {
    $.ajax({
        url: config.coreUrl + "/distribution/" + date + "?" + getToken(),
        type: "get",
        success: function (response) {
            var data = {sites: response};
            var element = config.distribution;

            var template = element.find('.template-table-content').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.table-content').html(html);
        },
        error: function () {}
    });
}
