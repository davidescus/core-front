config.site = $('.page-content-wrapper.site');

/*
 * Clicks actions
 ---------------------------------------------------------------------*/

// click on site selection
config.site.on('change', '.site-selection', function(){
    getSiteInfo($(this).val());
    getSitePackages($(this).val());
    getSitePredictions($(this).val());
    getSiteResultStatusAndClass($(this).val());
});

// Add New Site button click
config.site.on('click', '.add-new-site', function(){
    config.site.find('.site-selection').val('new').change();
});

// Add New Package button click
config.site.on('click', '.add-new-package', function(){
    var id = 'new' +  Math.random().toString().substring(2);
    addNewPackageTab(id);
    addNewPackageTabContent(id);
});

// Delete a package for front
config.site.on('click', '.delete-package', function(){
    if (confirm("Are you sure? You will delete active package!")) {
        config.site.find('.package-tab li.active').remove();
        config.site.find('.package-tab-content .tab-pane.active.in').remove();

        config.site.find('.package-tab li').first().addClass('active');
        config.site.find('.package-tab-content .tab-pane').first().addClass('active in');
    }
});

// Save button click
config.site.on('click', '.save-site', function(){

    var data = {
        site : {
            siteId: config.site.find('.site-selection').val(),
            name: config.site.find('.site-general .name').val(),
        },
        status: [],
        prediction: [],
        package: [],
    };

    if (data.site.siteId === 'new') {

        // add new site and retrive id
        var response = addNewSite(data.site);
        if (response.type === 'error') {
            alert(response.message);
            return;
        }

        // set siteId in site-selection and go ahead like an update
        data.site.siteId = response.data.id;

    } else {

        // add new site and retrive id
        var response = updateSite(data.site);
        if (response.type === 'error') {
            alert(response.message);
            return;
        }

        // delete deleted packages
        var existingPackages = getPackagesAssociatesWithSite(data.site.siteId);

        // check if package exist in front
        $.each(existingPackages, function(i, e) {

            // if element not exist in front
            if(config.site.find('.package-tab li[data-id="' + e +'"]').length === 0) {
                var response = deletePackage(e);
                alert(response.message);
            }
        });
    }

    alert(response.message);

    // add results names and classes in data.status array
    config.site.find('.site-result-status .row').each(function(i, e) {
        data['status'].push({
            statusId: $(this).attr('data-status-id'),
            statusName: $(this).find('.statusName').val(),
            statusClass: $(this).find('.statusClass').val(),
        });
    });

    // update results names and classes
    updateSiteResultStatusAndClass(data.status, data.site.siteId);

    // add predictions name and identifiers in data.prediction array
    config.site.find('.site-prediction-name .prediction').each(function(i, e) {
        data['prediction'].push({
            predictionIdentifier: $(this).attr('name'),
            name: $(this).val(),
        });
    });

    // update site predictions name
    updateSitePredictionsNames(data.prediction, data.site.siteId);

    // create or update packages and update associated predictions
    config.site.find('.package-tab-content .package-wrapper').each(function(i, e) {

        var g = $(this).find('.general-info');
        var id = g.attr('data-package-id');

        var package = {
            siteId: data.site.siteId,
            name: g.find('.name').val(),
            identifier: g.find('.identifier').val(),
            tipIdentifier: g.find('.tipIdentifier').val(),
            tableIdentifier: g.find('.tableIdentifier').val(),
            isVip: g.find('input[name="isVip_' + id +'"]:checked').val(),
            isRecurring: g.find('input[name="isRecurring_' + id +'"]:checked').val(),
            subscriptionType: g.find('input[name="subscriptionType_' + id +'"]:checked').val(),
            paymentName: g.find('.paymentName').val(),
            vipFlag: g.find('.vipFlag').val(),
            subscription: g.find('.subscription').val(),
            tipsPerDay: g.find('.tipsPerDay').val(),
            price: g.find('.price').val(),
            oldPrice: g.find('.oldPrice').val(),
            aliasSubscriptionType: g.find('.aliasSubscriptionType').val(),
            aliasTipsPerDay: g.find('.aliasTipsPerDay').val(),
            discount: g.find('.discount').val(),
        };

        // new package
        if (id.match(/new/g)) {

            var response = addNewPackage(package);
            if (response.type === 'error') {
                alert(response.message);
                return;
            }

            // add package id from response
            package.id = response.data.id;

            // asociate package with site
            resp = associatePackageWithSite({
                siteId: data.site.siteId,
                packageId: package.id,
            });

            if (resp.type === 'error') {
                // TODO do something on error
                alert('Association coould not be created');
            }

            alert(resp.message);

        } else {

            // existing package
            package.id = id;
            updatePackage(package, id);
        }

        // collect associated predictions with package
        var associatedPredictions = [];
        $(this).find('.associated-predictions .prediction:checked').each(function(i, e) {
            associatedPredictions.push({
                packageId: package.id,
                predictionIdentifier: $(this).val(),
            });
        });

        // update associated predictions with package
        associatePredicitonsWithPackage(associatedPredictions);

    });

    //console.log(data);
    //return;

});

/*
 * Run on start page
 ---------------------------------------------------------------------*/

// get all sites names and ids to populate site-selection
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
            element.find('.site-selection').html(html).change();
        },
         error: function () {}
    });
}

/*
 * General Informations
 ---------------------------------------------------------------------*/

// store new site
function addNewSite(data) {
    var ret = {};

    $.ajax({
        url: config.coreUrl + "/site",
        type: "post",
        async: false,
        data: data,
        success: function (response) {
            ret = response;
        },
         error: function () {}
    });

    return ret;
}

// store new site
function updateSite(data) {
    var ret = {};

    $.ajax({
        url: config.coreUrl + "/site/update/" + data.siteId,
        type: "post",
        async: false,
        data: data,
        success: function (response) {
            ret = response;
        },
         error: function () {}
    });

    return ret;
}

// get site general informations
function getSiteInfo(siteId) {
    $.ajax({
        url: config.coreUrl + "/site/" + siteId,
        type: "get",
        success: function (response) {

            // show site name in front;
            showSiteName(response);
            showSiteGeneralConfiguration(response);
        },
         error: function () {}
    });
}

// show site name in h1
function showSiteName(data) {
    var element = config.site;
    var template = element.find('.template-site-general').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.site-general').html(html);
}

// show site general configuration
function showSiteGeneralConfiguration(data) {
    var element = config.site;
    var template = element.find('.template-site-name').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.site-name').html(html);
}

/*
 * Results and Status
 ---------------------------------------------------------------------*/

// update results status names and classes
function updateSiteResultStatusAndClass(data, siteId) {

    var params = {data: data};
    $.ajax({
        url: config.coreUrl + "/site-result-status/update/" + siteId,
        type: "post",
        data: params,
        success: function (response) {
            alert(response.message);
        },
         error: function () {}
    });
}

// get site results status names and classes
function getSiteResultStatusAndClass(siteId) {

    // new website
    if (siteId === 'new') {
        showSiteResultStatusNameAndClass({
            status: {1: {}, 2: {}, 3: {}, 4: {}},
        });
        return;
    }

    $.ajax({
        url: config.coreUrl + "/site-result-status/" + siteId,
        type: "get",
        success: function (response) {

            var data = {
                status: response,
            }
            showSiteResultStatusNameAndClass(data);
        },
         error: function () {}
    });
}

// show result status
function showSiteResultStatusNameAndClass(data) {
    var element = config.site;
    var template = element.find('.template-site-result-status').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.site-result-status').html(html);
}

/*
 * Packages
 ---------------------------------------------------------------------*/

// store new package
function addNewPackage(data) {
    var ret = {};

    $.ajax({
        url: config.coreUrl + "/package",
        type: "post",
        async: false,
        data: data,
        success: function (response) {
            ret = response;
        },
         error: function () {}
    });

    return ret;
}

// create associatin package - site
// @return array
function getPackagesAssociatesWithSite(siteId) {
    var ret = {};
    $.ajax({
        url: config.coreUrl + "/site-package/" + siteId,
        type: "get",
        async: false,
        success: function (response) {
            ret = response;
        },
         error: function () {}
    });

    return ret;
}

// create associatin package - site
function associatePackageWithSite(data) {
    var ret = {};
    var params = {data: data};
    $.ajax({
        url: config.coreUrl + "/site-package",
        type: "post",
        async: false,
        data: params,
        success: function (response) {
            ret = response;
        },
         error: function () {}
    });

    return ret;
}

// update site packages
function updatePackage(data, id) {
    var params = {data: data};
    $.ajax({
        url: config.coreUrl + "/package/update/" + id,
        type: "post",
        data: params,
        success: function (response) {
            alert(response.message);
        },
         error: function () {}
    });
}

// delete a package
function deletePackage(id) {
    var ret = {};
    $.ajax({
        url: config.coreUrl + "/package/delete/" + id,
        type: "get",
        async: false,
        success: function (response) {
            ret = response;
        },
         error: function () {}
    });

    return ret;
}

// get site packages
function getSitePackages(siteId) {
    $.ajax({
        url: config.coreUrl + "/package-site/" + siteId,
        type: "get",
        success: function (response) {

            var data = {
                packages: response,
            }

            showPackagesTabs(data);
            showPackagesTabsContent(data);
        },
         error: function () {}
    });
}

// show new packages tab
function addNewPackageTab(id) {

    var data = {
        packages: [{
            id: id,
            name: 'New - ' + id,
        }],
    };

    var element = config.site;
    var template = element.find('.template-package-tab').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.package-tab').append(html);

    element.find('.package-tab li').removeClass('active');
    element.find('.package-tab li[data-id="' + id + '"]').first().addClass('active');
}

// show new package tab content
function addNewPackageTabContent(id) {

    // get all predictions
    var predictions = getPredictions();

    var data = {
        packages: [{
            id: id,
            name: 'New - ' + id,
            associatedPredictions: predictions,
        }],
    };

    var element = config.site;
    var template = element.find('.template-package-tab-content').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.package-tab-content').append(html);

    element.find('.package-tab-content .tab-pane').removeClass('active in');
    element.find('.package-tab-content .tab-pane#package-tab_' + id).addClass('active in');
}

// show packages tabs
function showPackagesTabs(data) {
    var element = config.site;
    var template = element.find('.template-package-tab').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.package-tab').html(html);

    element.find('.package-tab li').first().addClass('active');
}

// show packages tabs content
function showPackagesTabsContent(data) {
    var element = config.site;
    var template = element.find('.template-package-tab-content').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.package-tab-content').html(html);

    element.find('.package-tab-content .tab-pane').first().addClass('active in');
}

/*
 * Predictions
 ---------------------------------------------------------------------*/

// associate predictions with package
function associatePredicitonsWithPackage(data) {

    var params = {data: data};
    $.ajax({
        url: config.coreUrl + "/package-prediction",
        type: "post",
        data: params,
        success: function (response) {
            alert(response.message);
        },
         error: function () {}
    });
}

// update site predictions name
function updateSitePredictionsNames(data, siteId) {

    var params = {data: data};
    $.ajax({
        url: config.coreUrl + "/site-prediction/update/" + siteId,
        type: "post",
        data: params,
        success: function (response) {
            alert(response.message);
        },
         error: function () {}
    });
}

// get site predictions name
function getSitePredictions(siteId) {
    $.ajax({
        url: config.coreUrl + "/site-prediction/" + siteId,
        type: "get",
        success: function (response) {

            var data = {
                predictionGroup: response,
            }

            showSitePredictionsNames(data);
        },
         error: function () {}
    });
}

// show predictions name
function showSitePredictionsNames(data) {
    var element = config.site;
    var template = element.find('.template-site-prediction-name').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.site-prediction-name').html(html);
}

// get all predictions
function getPredictions() {
    var ret = {};
    $.ajax({
        url: config.coreUrl + "/prediction",
        type: "get",
        async: false,
        success: function (response) {
            ret = response;
        },
         error: function () {}
    });
    return ret;
}



















