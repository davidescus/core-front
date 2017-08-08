config.site = $('.page-content-wrapper.site');

/*
 * Click actions
 */

    /*
    * when change site selection get site information
    */
$(config.site).on('change', '.site-selection', function(){
    showSiteInfo($(this).val());
});

/*
 * this will populate website selection
 */
function getAllSitesIdsAndNames() {

    $.ajax({
        url: config.coreUrl + "/site/ids-and-names",
        type: "get",
        success: function (response) {

            var data = {
                sites: response,
            }
            var element = config.site;

            var template = element.find('.template-site-selection').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.site-selection').html(html);

            showSiteInfo(response[0].id);
        },
         error: function () {}
    });
}

function showSiteInfo(siteId) {
    $.ajax({
        url: config.coreUrl + "/site/" + siteId,
        type: "get",
        success: function (response) {

            console.log(response);

            // show site name in front;
            showSiteName(response);
            showSiteGeneralConfiguration(response);
        },
         error: function () {

        }
    });
}

function showSiteName(data) {
    var element = config.site;
    var template = element.find('.template-site-name').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.site-name').html(html);
}

function showSiteGeneralConfiguration(data) {
    var element = config.site;
    var template = element.find('.template-site-name').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.site-name').html(html);
}




















