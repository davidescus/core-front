config.countryLeagueTeam = $('.page-content-wrapper.country-league-team');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

// Clickable - country selection
// change country selection
// show available teams in selected country.
config.countryLeagueTeam.on('change', '.select-country', function() {
    $.ajax({
        url: config.coreUrl + "/team-country/" + $(this).val() + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = {
                teams: response,
            }
            var element = config.countryLeagueTeam;

            var template = element.find('.template-select-team').html();
            var compiledTemplate = Template7.compile(template);
            var html = compiledTemplate(data);
            element.find('.select-team').html(html).change();
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
});

// Clickable - team selection
// change team selection
// get team alias if exists.
config.countryLeagueTeam.on('change', '.select-team', function() {
    $.ajax({
        url: config.coreUrl + "/team/alias/get/" + $(this).val() + "?" + getToken(),
        type: "get",
        success: function (response) {
            config.countryLeagueTeam.find('.team-alias').val(response.alias);
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
});

// Clickable - save alias
// save alias for a team.
config.countryLeagueTeam.on('click', '.save', function() {

    var teamId = config.countryLeagueTeam.find('.select-team').val();
    var alias = config.countryLeagueTeam.find('.team-alias').val();

    if (teamId == '-') {
        alert('You must select a team.');
        return;
    }

    $.ajax({
        url: config.coreUrl + "/team/alias/" + teamId + "?" + getToken(),
        type: "post",
        data: {
            teamId: teamId,
            alias: alias,
        },
        success: function (response) {
            alert("Type: --- " + response.type + " --- \r\n" + response.message);
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
