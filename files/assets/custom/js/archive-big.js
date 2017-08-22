config.archiveBig = $('.page-content-wrapper.archive-big');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

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

    var param = {
        siteId: config.archiveBig.find('.select-site').val(),
        tableIdentifier: config.archiveBig.find('.select-table').val(),
        date: config.archiveBig.find('.select-date').val(),
    };

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

            console.log(response);

            var data = {
                months: response,
            }
            var element = config.archiveBig;

            var template = element.find('.template-select-date').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.select-date').html(html);
        },
         error: function () {}
    });

}
