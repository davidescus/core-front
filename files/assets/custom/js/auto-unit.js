config.autoUnit = $('.page-content-wrapper.auto-unit');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

// Clickable - date selection
// change date selection
// trigger function to get available events in selected date.
// config.archiveBig.on('change', '.select-date', function() {
//     showMonthAvailableEventsInBigArchive();
// });

// Clickable - site selection
// change site selection
// show available tables for selected site.
// config.archiveBig.on('change', '.select-site', function() {
//     $.ajax({
//         url: config.coreUrl + "/site/available-table/" + $(this).val() + "?" + getToken(),
//         type: "get",
//         success: function (response) {

//             var data = {
//                 tables: response,
//             }
//             var element = config.archiveBig;

//             var template = element.find('.template-select-table').html();
//             var compiledTemplate = Template7.compile(template);
//             var html = compiledTemplate(data);
//             element.find('.select-table').html(html).change();
//         },
//         error: function (xhr, textStatus, errorTrown) {
//             manageError(xhr, textStatus, errorTrown);
//         }
//     });
// });


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
