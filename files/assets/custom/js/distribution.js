config.distribution = $('.page-content-wrapper.distribution');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

// seelect / deselect all events from a site
$('#container-distributed-events').on('change', '.select-group-site', function() {
    if ($(this).is(':checked'))
        $(this).closest('.row').find('.use').prop('checked', true);
    else
        $(this).closest('.row').find('.use').prop('checked', false);
});

/*
 * Manual publish events in archive
 */
$('#container-distributed-events').on('click', '.action-publish', function() {
    var data = [];

    // get events ids for association
    $('#container-distributed-events .use:checked').each(function() {
        var parentPackageId = $(this).closest('.package-row').attr('data-id');
        data.push({
            packageId: parentPackageId,
            distributionId: $(this).attr('data-id'),
        });
    });

    $.ajax({
        url: config.coreUrl + "/archive",
        type: "post",
        dataType: "json",
        data: {
            data: data,
        },
        success: function (response) {

            alert("Type: --- " + response.type + " --- \r\n" + response.message);
            getDistributedEvents();
        },
        error: function () {}
    });
});

/*
 * Delete distributions (bulk)
 */
$('#container-distributed-events').on('click', '.action-delete', function() {
    var ids = [];

    // get events ids for association
    $('#container-distributed-events .use:checked').each(function() {
        ids.push($(this).attr('data-id'));
    });

    $.ajax({
        url: config.coreUrl + "/distribution",
        type: "delete",
        dataType: "json",
        data: {
            ids: ids,
        },
        success: function (response) {

            alert("Type: --- " + response.type + " --- \r\n" + response.message);
            getDistributedEvents();
        },
        error: function () {}
    });
});

    /*
     *  ----- Functions -----
    ----------------------------------------------------------------------*/

// Functions
// @string date formaf: YYYY-mm-dd
// get all distributed events and put it on table
function getDistributedEvents(date = '0') {
    $.ajax({
        url: config.coreUrl + "/distribution/" + date,
        type: "get",
        success: function (response) {

            console.log(response);

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
