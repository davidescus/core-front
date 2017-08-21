config.archiveBig = $('.page-content-wrapper.archive-big');


    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

// Clickable
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
            element.find('.select-table').html(html);
        },
         error: function () {}
    });
});

    /*
     *  ----- 4 Tables -----
    ----------------------------------------------------------------------*/

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
//
// Functions
// will populate site table selector
function showAvailableTablesBySite() {

}
