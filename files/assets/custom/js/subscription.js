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

// Clickable - package selection
// change package selection
// shw general information about package.
config.subscription.on('change', '.select-package', function() {
    $.ajax({
        url: config.coreUrl + "/package/" + $(this).val() + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = response;
            var element = config.subscription;

            var template = element.find('.template-subscription-values').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.subscription-values').html(html).change();
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
    if (siteId === '-') {
        element.find('.selectable-block').addClass('hidden');
        element.find('.li-create-customer').addClass('hidden');
        return
    }

    var filterValue = $(this).val();
    if (filterValue.length < 2) {
        element.find('.selectable-block').addClass('hidden');
        element.find('.li-create-customer').addClass('hidden');
        return;
    }

    $.ajax({
        url: config.coreUrl + "/customer/search/" + siteId+ "/" + filterValue + "?" + getToken(),
        type: "get",
        success: function (response) {

            if ($.isEmptyObject(response)) {
                element.find('.selectable-block').addClass('hidden');
                element.find('.li-create-customer').removeClass('hidden');
                return;
            }

            var data = {customers: response};
            element.find('.selectable-block').removeClass('hidden');
            element.find('.li-create-customer').addClass('hidden');

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

// Clickable --- save new subscription
// save new subscription
config.subscription.on('click', '.new-subscription .save', function() {
    var element = config.subscription.find('.new-subscription');

    $.ajax({
        url: config.coreUrl + "/subscription/create" + "?" + getToken(),
        type: "post",
        dataType: "json",
        data: {
            packageId : element.find('.select-package').val(),
            type: element.find('.type').val(),
            name: element.find('.name').val(),
            subscription: element.find('.subscription').val(),
            price: element.find('.price').val(),
            dateStart: element.find('.dateStart').val(),
            dateEnd: element.find('.dateEnd').val(),
            customerEmail: element.find('.search-customer').val(),
        },
        success: function (r) {
            alert("Type: --- " + r.type + " --- \r\n" + r.message);

            if (r.type === 'success') {
                subscriptionShowAllSubscriptions();
                element.find('.select-site').val('-').change();
                element.find('.search-customer').val('');
            }
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
});

    /*
     *  ----- Modal Create New Customer -----
    ----------------------------------------------------------------------*/

// Modal --- Create New Customer
// launch modal
config.subscription.on('click', '.new-subscription .create-customer', function() {
    var element = $('#modal-subscription-create-customer');
    var email = config.subscription.find('.new-subscription .search-customer').val();
    element.find('.email').val(email);
    element.modal();
});

// Modal --- Create New Customer
// Click on Save buttonfrom modal.
$('#modal-subscription-create-customer').on('click', '.save', function() {
    var element = $('#modal-subscription-create-customer');
    var siteId = config.subscription.find('.new-subscription .select-site').val();
    if (siteId === '-') {
        alert('Press Close button, and then first select a site.');
        return;
    }

    $.ajax({
        url: config.coreUrl + "/customer/create/" + siteId + "?" + getToken(),
        type: "post",
        dataType: "json",
        data: {
            name : element.find('.name').val(),
            email: element.find('.email').val(),
            activeEmail: element.find('.active-email').val(),
        },
        success: function (r) {

            alert("Type: --- " + r.type + " --- \r\n" + r.message);

            if (r.type === 'success') {
                config.subscription.find('.new-subscription .search-customer').val(r.data.email);
                config.subscription.find('.new-subscription .li-create-customer').addClass('hidden');
                element.modal('hide');
            }
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });

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

// Functions
// show all subscriptions in front
function subscriptionShowAllSubscriptions() {
    $.ajax({
        url: config.coreUrl + "/subscription" + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = {
                subscriptions: response,
            }
            var element = config.subscription;

            var template = element.find('.template-table-subscription').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.table-subscription').html(html);
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
}
