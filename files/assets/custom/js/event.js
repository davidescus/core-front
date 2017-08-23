config.archiveBig = $('.page-content-wrapper.event');

    /*
     *  ----- CLICKABLE ACTIONS -----
    ----------------------------------------------------------------------*/

// Clickable - date selection
// change date selection
// trigger function to get available events in selected date.
config.archiveBig.on('change', '.select-date', function() {
    showMonthAvailableEventsInBigArchive();
});

    /*
     *  ----- Functions -----
    ----------------------------------------------------------------------*/

