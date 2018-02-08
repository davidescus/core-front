config.autoUnit = $('.page-content-wrapper.auto-unit');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

// Clickable - date selection
// change date selection
// trigger function to get available events in selected date.
// config.archiveBig.on('change', '.select-date', function() {
//    autoUnitGetSchedulerForTable();
// });

// Clickable - site selection
// change site selection
// show available tables for selected site.
config.autoUnit.on('change', '.select-site', function() {
    $.ajax({
        url: config.coreUrl + "/site/available-table/" + $(this).val() + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = {
                tables: response,
            }
            var element = config.autoUnit;

            var template = element.find('.template-select-table').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.select-table').html(html).change();
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
});

// Clickable - select table | select date
// change table or date selection
// show scheduler for selected site, date and table.
config.autoUnit.on('change', '.select-table , .select-date', function() {
    autoUnitGetSchedulerForTable();
    autoUnitGetScheduledEventsForTable();
});

// Clickable - change prediction percentage
// calculate sum of total percentage
config.autoUnit.on(
  'change',
  '.content-tip .group-1x2 ,.content-tip .group-ou ,.content-tip .group-ah ,.content-tip .group-gg',
  function() {
    autoUnitCalculatePredictionPercentage();
});

// Clickable - save tip settings
// save current settings for selected tip
config.autoUnit.on('click', '.content-tip .save-tip-settings', function() {
    var elem = config.autoUnit;
    var tipSection = $(this).closest('.panel.panel-default');
    var data = {
        siteId: elem.find('.select-site').val(),
        tableIdentifier: elem.find('.select-table').val(),
        date: elem.find('.select-date').val(),
        tipIdentifier: tipSection.find('.tip-identifier').val(),
        leagues: tipSection.find('.leagues').val(),
        minOdd: tipSection.find('.min-odd').val(),
        maxOdd: tipSection.find('.max-odd').val(),
        win: tipSection.find('.win').val(),
        loss: tipSection.find('.loss').val(),
        draw: tipSection.find('.draw').val(),
        winrate: tipSection.find('.winrate').val(),
        prediction1x2: tipSection.find('.group-1x2').val(),
        predictionOU: tipSection.find('.group-ou').val(),
        predictionAH: tipSection.find('.group-ah').val(),
        predictionGG: tipSection.find('.group-gg').val(),
    };

    $.ajax({
        url: config.coreUrl + "/auto-unit/save-tip-settings/" + "?" + getToken(),
        type: "post",
        data: data,
        success: function (response) {
            alert("Type: --- " + response.type + " --- \r\n" + response.message);
            autoUnitGetSchedulerForTable();
            autoUnitGetScheduledEventsForTable();
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
});

    /*
     *  ----- Functions -----
    ----------------------------------------------------------------------*/

// Functions
// this will be exectuted on page loading.
// will populate site selector
function autoUnitShowAvailableSites() {
    $.ajax({
        url: config.coreUrl + "/site/ids-and-names" + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = {
                sites: response,
            }
            var element = config.autoUnit;

            var template = element.find('.template-select-site').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.select-site').html(html).change();
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
}

// functions
// this will populate mounth table with events
// it use: select-date, select-site, select-table
function autoUnitGetSchedulerForTable() {
    var param = {
        siteId: config.autoUnit.find('.select-site').val(),
        tableIdentifier: config.autoUnit.find('.select-table').val(),
        date: config.autoUnit.find('.select-date').val(),
    };

    if (param.siteId == '-' || param.tableIdentifier == '-') {
        config.autoUnit.find('.table-content-month').html('');
        autoUnitPopulateTipsInTemplate({});
        return;
    }

    $.ajax({
        url: config.coreUrl + "/auto-unit/get-schedule?" + $.param(param) + "&" + getToken(),
        type: "get",
        success: function (response) {
            var data = {
                tips: response,
            }
            autoUnitPopulateTipsInTemplate(data);
            autoUnitCalculatePredictionPercentage();
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
}
// functions
// this will show sum percentage for all prediction groups
function autoUnitCalculatePredictionPercentage() {
    var element = config.autoUnit.find('.content-tip');
    var group1x2 = parseInt(element.find('.group-1x2').val());
    var groupOU = parseInt(element.find('.group-ou').val());
    var groupAH = parseInt(element.find('.group-ah').val());
    var groupGG = parseInt(element.find('.group-gg').val());

    var total = group1x2 + groupOU + groupAH + groupGG;
    element.find('.prediction-percentage').html(total);
}

// functions
// this will get all events for selected month
// will bring past event from archive and new sheduled type of events
function autoUnitGetScheduledEventsForTable() {
    var param = {
        siteId: config.autoUnit.find('.select-site').val(),
        tableIdentifier: config.autoUnit.find('.select-table').val(),
        date: config.autoUnit.find('.select-date').val(),
    };

    if (param.siteId == '-' || param.tableIdentifier == '-' || param.date == 'default') {
        config.autoUnit.find('.table-content-month').html('');
        autoUnitPopulateTipsInTemplate({});
        autoUnitShowAssociatedEventsWithTable({});
        return;
    }

    $.ajax({
        url: config.coreUrl + "/auto-unit/get-scheduled-events?" + $.param(param) + "&" + getToken(),
        type: "get",
        success: function (response) {
            autoUnitShowAssociatedEventsWithTable(response);
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
}

// functions
// this will show all events accordind to selected table
function autoUnitShowAssociatedEventsWithTable(data) {
    var element = config.autoUnit;
    var template = element.find('.template-table-schedule').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.table-schedule').html(html);
}

// functions
// this will populate content-tip with data
function autoUnitPopulateTipsInTemplate(data) {
    var element = config.autoUnit;
    var template = element.find('.template-content-tip').html();
    var compiledTemplate = Template7.compile(template);
    var html = compiledTemplate(data);
    element.find('.content-tip').html(html);
}

    /*
     *  ----- Modal Edit -----
    ----------------------------------------------------------------------*/

// Modal - Edit
// save edit prediction and status
// $('#archive-big-modal-edit').on('click', '.save', function() {
//     var element = $('#archive-big-modal-edit');

//     $.ajax({
//         url: config.coreUrl + "/archive-big/update/prediction-and-status/" + element.find('.event-id').val() + "?" + getToken(),
//         type: "post",
//         data: {
//             siteId: config.archiveBig.find('.select-site').val(),
//             predictionId: element.find('.prediction').val(),
//             statusId: element.find('.status').val(),
//         },
//         success: function (response) {

//             alert("Type: --- " + response.type + " --- \r\n" + response.message);
//             showMonthAvailableEventsInBigArchive();
//             element.modal('hide');
//         },
//         error: function (xhr, textStatus, errorTrown) {
//             manageError(xhr, textStatus, errorTrown);
//         }
//     });
// });
