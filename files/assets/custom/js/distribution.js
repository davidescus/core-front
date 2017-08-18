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
     *  ----- CONTROLS ACTIONS  -----
    ----------------------------------------------------------------------*/



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
