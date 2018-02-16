$(document).ready(function() {

    // app start flow
    setActivePage();

    $('.page-sidebar-menu .nav-item').on('click', function() {
        // set active page in config
        config.activePage = $(this).attr('target');
        setActivePage();
    });

    // show notifications
    setInterval(showLogs, 5000);

    /*
     * Make visible active page and trigger setControlFlow()
     * te retrive json with data for current page
     */
    function setActivePage() {

        // add class active for left mennu
        $('.page-sidebar-menu .nav-item').removeClass('active');
        $('.page-sidebar-menu .nav-item[target="' + config.activePage + '"]').addClass('active');

        // show content of desired page
        $('.page-content-wrapper').addClass('hidden');
        $('.page-content-wrapper.' + config.activePage).removeClass('hidden');

        // trigger setControlFlow() method
        setControlFlow();
    }

    // this will show all notification in front.
    function showLogs() {
        console.log('notification');

        $.ajax({
            url: config.coreUrl + "/get-logs?" + getToken(),
            type: "get",
            success: function (response) {
                console.log(response);

                if (response.type == 'success') {
                    var data = response;

                    var template = $('.template-notification-warning').html();
                    var compiledTemplate = Template7.compile(template);
                    var html = compiledTemplate(data);
                    $('.notification-warning').html(html).change();

                    var template = $('.template-notification-panic').html();
                    var compiledTemplate = Template7.compile(template);
                    var html = compiledTemplate(data);
                    $('.notification-panic').html(html).change();

                }
            },
            error: function (xhr, textStatus, errorTrown) {
                manageError(xhr, textStatus, errorTrown);
            }
        });
    }

    /*
     * This function will controll methods
     * executed by specific page
     */
    function setControlFlow() {

        if (config.activePage == 'site') {
            getAllSitesIdsAndNames();
        }

        if (config.activePage == 'subscription') {
            subscriptionShowAvailableSites();
            subscriptionShowAllSubscriptions();
        }

        if (config.activePage == 'event') {
            eventGetEvents();
        }

        if (config.activePage == 'association') {

            // autocomlete provider and league
            getTableAvailableFiltersValues('run');
            getTableAvailableFiltersValues('ruv');
            getTableAvailableFiltersValues('nun');
            getTableAvailableFiltersValues('nuv');

            // get availlable events number
            getAvailableEventsNumber({ table: "run" });
            getAvailableEventsNumber({ table: "ruv" });
            getAvailableEventsNumber({ table: "nun" });
            getAvailableEventsNumber({ table: "nuv" });

            // get already associated events
            getEventsAssociations('run');
            getEventsAssociations('ruv');
            getEventsAssociations('nun');
            getEventsAssociations('nuv');
        }

        if (config.activePage == 'distribution') {
            getDistributedEvents();
        }

        if (config.activePage == 'archive-big') {
            showAvailableMonths();
            showAvailableSites();
            bigArchiveShowAllPredictions();
        }

        if (config.activePage == 'archive-home') {
            archiveHomeShowAvailableSites();
            archiveHomeShowAllPredictions();
        }

        if (config.activePage == 'auto-unit') {
            autoUnitShowAvailableSites();
        }
    }
});
