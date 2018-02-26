config.countryLeagueTeam = $('.page-content-wrapper.country-league-team');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

// Clickable - site selection
// change site selection
// show available tables for selected site.
config.countryLeagueTeam.on('change', '.select-site', function() {
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

    /*
     *  ----- FUNCTIONS -----
    ----------------------------------------------------------------------*/

// Functions
// populate country selector with all country exist in system
function countryLeagueTeamShowAllCountries() {
    $.ajax({
        url: config.coreUrl + "/country/all" + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = {
                countries: response,
            }
            var element = config.countryLeagueTeam;

            var template = element.find('.template-select-country').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.select-country').html(html).change();
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
}