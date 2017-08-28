$(document).ready(function() {

    // app start flow
    setActivePage();

    $('.page-sidebar-menu .nav-item').on('click', function() {
        // set active page in config
        config.activePage = $(this).attr('target');
        setActivePage();
    });

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

    /*
     * This function will controll methods
     * executed by specific page
     */
    function setControlFlow() {

        if (config.activePage == 'site') {
            getAllSitesIdsAndNames();
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
    }
});
