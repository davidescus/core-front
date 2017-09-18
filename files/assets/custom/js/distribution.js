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
// check if events selected
// launch modal for preview and send
config.distribution.on('click', '.actions .preview-and-send', function() {

    $.ajax({
        url: config.coreUrl + "/distribution/preview-and-send/preview" + "?" + getToken(),
        type: "post",
        data: {
            ids: getCheckedEventsIds(),
        },
        success: function (response) {

            if (response.type !== 'success') {
                alert("Type: --- " + response.type + " --- \r\n" + response.message);
                return;
            }

            var element = $('#modal-distribution-preview-and-send');
            var data = response;

            var template = element.find('.template-modal-content').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.modal-content').html(html);
            element.find('.summernote').summernote();
            element.modal();
        },
        error: function (xhr, textStatus, errorTrown) {
            //manageError(xhr, textStatus, errorTrown);
        }
    });
});

// Actions
// trigger procedure to send emails.
config.distribution.on('click', '.actions .send', function() {
    distributionSendEmails();
});


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
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
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
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
});

    /*
     *  ----- Modals -----
    ----------------------------------------------------------------------*/

// Modals --- modal preview-and-send
// Click on send emails.
// trigger send emails procedure
// close modal.
$('#modal-distribution-preview-and-send').on('click', '.send', function() {
    var element = $('#modal-distribution-preview-and-send');
    var template = element.find('.summernote').summernote('code');
    distributionSendEmails(template);
    element.modal('hide');
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
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
}

// Functions
// trigger procedure to send emails.
function distributionSendEmails(template = null) {
    var data = {
        ids: getCheckedEventsIds(),
    };

    if (template !== null)
        data['template'] = template;

    $.ajax({
        url: config.coreUrl + "/distribution/preview-and-send/send" + "?" + getToken(),
        type: "post",
        data: data,
        success: function (response) {
            alert("Type: --- " + response.type + " --- \r\n" + response.message);
            getDistributedEvents(config.distribution.find('.select-system-date').val());
        },
        error: function (xhr, textStatus, errorTrown) {
            //manageError(xhr, textStatus, errorTrown);
        }
    });
}
