config.event = $('.page-content-wrapper.event');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

// Clickable - edit
// get selected event
// launch modal to change result and status
config.event.on('click', '.edit', function() {

});

    /*
     *  ----- Functions -----
    ----------------------------------------------------------------------*/

// Functions
// this execute on page start.
// get all distributed events and show in table
function eventGetEvents() {
    $.ajax({
        url: config.coreUrl + "/event/distributed-events",
        type: "get",
        success: function (response) {

            var data = {events: response};
            var element = config.event;

            var template = element.find('.template-table-content').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.table-content').html(html);
        },
        error: function () {}
    });
}

