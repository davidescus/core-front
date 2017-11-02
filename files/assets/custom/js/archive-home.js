config.archiveHome = $('.page-content-wrapper.archive-home');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

// Clickable - site selection
// change site selection
// show available tables for selected site.
config.archiveHome.on('change', '.select-site', function() {
    $.ajax({
        url: config.coreUrl + "/site/available-table/" + $(this).val() + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = {
                tables: response,
            }
            var element = config.archiveHome;

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

// Clickable - table selection
// change table selection
// get archive events for selected: site, table, month
config.archiveHome.on('change', '.select-table', function() {
    showMonthAvailableEventsInBigArchive();
});


// Clickable - publish changes in site
// publish allbig archive changes in site
// - for all tables
config.archiveHome.on('click', '.publishInSite', function() {
    return;
    var siteId = config.archiveHome.find('.select-site').val();

    if (siteId ==  '-') {
        alert('You must select a site.');
        return;
    }

    $.ajax({
        url: config.coreUrl + "/site/update-archive-big/" + siteId  + "?" + getToken(),
        type: "get",
        success: function (response) {
            alert("Type: --- " + response.type + " --- \r\n" + response.message);
        },
        error: function (xhr, textStatus, errorTrown) {
            manageError(xhr, textStatus, errorTrown);
        }
    });
});

// Clickable - show / hide event
// toogle show/hide even
config.archiveHome.on('click', '.table-content-month .show-hide', function() {
    return;
    var $this = $(this);
    $.ajax({
        url: config.coreUrl + "/archive-big/show-hide/" + $this.closest('tr').attr('data-id') + "?" + getToken(),
        type: "get",
        success: function (response) {

            alert("Type: --- " + response.type + " --- \r\n" + response.message);

            if (response.type === 'success') {
                if ($this.hasClass('red'))
                    $this.removeClass('red').addClass('green').text('Show');
                else
                    $this.removeClass('green').addClass('red').text('Hide');
            }
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
function archiveHomeShowAvailableSites() {
    $.ajax({
        url: config.coreUrl + "/site/ids-and-names" + "?" + getToken(),
        type: "get",
        success: function (response) {

            var data = {
                sites: response,
            }
            var element = config.archiveHome;

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
