config.site = $('.page-content-wrapper.site');

/*
 * this will populate website selection
 */
function getAllSitesIdsAndNames() {

    $.ajax({
        url: config.coreUrl + "/site/ids-and-names",
        type: "get",
        success: function (response) {

            console.log(response);

            var data = {
                sites: response,
            }
            var element = config.site;

            var template = element.find('.template-site-selection').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.site-selection').html(html);
        },
         error: function () {

        }
    });
}
