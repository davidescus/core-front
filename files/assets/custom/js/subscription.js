config.subscription = $('.page-content-wrapper.subscription');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

    /*
     *  ----- FUNCTIONS -----
    ----------------------------------------------------------------------*/

// Functions
// this will be exectuted on page loading.
// will populate site selector
function subscriptionShowAvailableSites() {
    $.ajax({
        url: config.coreUrl + "/site/ids-and-names" + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = {
                sites: response,
            }
            var element = config.subscription;

            var template = element.find('.template-select-site').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.select-site').html(html);
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
}

// Clickable - site selection
// change site selection
// show available packages for selected site.
config.subscription.on('change', '.select-site', function() {
    $.ajax({
        url: config.coreUrl + "/package-by-site/ids-and-names/" + $(this).val() + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = {
                packages: response,
            }
            var element = config.subscription;

            var template = element.find('.template-select-package').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.select-package').html(html).change();
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
});

