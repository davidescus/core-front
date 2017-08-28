config.event = $('.page-content-wrapper.event');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

    /*
     *  ----- Modal edit result-status -----
    ----------------------------------------------------------------------*/

// Modal - edit result-status
// get selected event
// launch modal to change result and status
config.event.on('click', '.edit', function() {
    var $this = $(this);
    $.ajax({
        url: config.coreUrl + "/event/by-id/" + $this.closest('tr').attr('data-id') + "?" + getToken(),
        type: "get",
        success: function (response) {

            if (!response) {
                alert('Maybe this event will not exists anymore.');
                return;
            }

            var data = response;
            var element = $('#event-modal-edit-result-status');

            var template = element.find('.template-event-info').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.event-info').html(html);

            // set result if exists.
            element.find('.result').val(data.result);

            // set status selected
            element.find('.status option[value="' + data.statusId + '"]').prop('selected', true).change();

            element.modal();
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
});

// Modal - edit result-status
// save edit result and status
$('#event-modal-edit-result-status').on('click', '.save', function() {
    var element = $('#event-modal-edit-result-status');

    $.ajax({
        url: config.coreUrl + "/event/update-result-status/" + element.find('.event-id').val() + "?" + getToken(),
        type: "post",
        data: {
            result: element.find('.result').val(),
            statusId: element.find('.status').val(),
        },
        success: function (response) {

            alert("Type: --- " + response.type + " --- \r\n" + response.message);

            if (response.type === 'success') {
                eventGetEvents();
                element.modal('hide');
            }
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
});

    /*
     *  ----- Functions -----
    ----------------------------------------------------------------------*/

// Functions
// this execute on page start.
// get all distributed events and show in table
function eventGetEvents() {
    $.ajax({
        url: config.coreUrl + "/event/associated-events" + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = {events: response};
            var element = config.event;

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

