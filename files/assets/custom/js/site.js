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

// Add New button click
config.site.on('click', '.add-new-site', function(){
   config.site.find('.site-selection').val('new').change();
});

// Save button click
config.site.on('click', '.save-site', function(){

    var data = {
        site : {
            siteId: config.site.find('.site-selection').val(),
            name: config.site.find('.site-general .name').val(),
        },
        status: [],
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




















