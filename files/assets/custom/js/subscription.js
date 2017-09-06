config.subscription = $('.page-content-wrapper.subscription');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

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

// Clickable --- search for customer
// live search for existing customer
// every keyup means a new search
config.subscription.on('keyup', '.search-customer' , function() {
    var element = config.subscription.find('.new-subscription');
    var siteId = element.find('.select-site').val();
    if (siteId === '-')
        return

    var filterValue = $(this).val();
    if (filterValue.length < 2) {
        return;
    }

    $.ajax({
        url: config.coreUrl + "/customer/search/" + siteId+ "/" + filterValue + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = {customers: response};
            element.find('.selectable-block').removeClass('hidden');

            var template = element.find('.template-selectable-block').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.selectable-block').html(html);
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
});

// Clickable --- click on customer selctable-row
// when select customer make autocomplete for customer email.
// add class hidden to selectable-block
config.subscription.on('click', '.new-subscription .selectable-row', function() {
    var element = config.subscription.find('.new-subscription');
    element.find('.search-customer').val($(this).attr('data-email'));
    element.find('.selectable-block').addClass('hidden');
});

    /*
     *  ----- Modal Create New Customer -----
    ----------------------------------------------------------------------*/

// Modal --- Create New Customer
// launch modal
config.subscription.on('click', '.new-subscription .create-customer', function() {
    var element = $('#modal-subscription-create-customer');
    element.modal();
});

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

