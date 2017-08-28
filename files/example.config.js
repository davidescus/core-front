
    /*
     *  ----- App Configuration -----
    ----------------------------------------------------------------------*/

var config = {
    coreUrl: "http://domain | ip/admin",
    activePage: "association",
};

// check if response server is ok,
// if not redirect to login
function manageError(a, b, c) {

    var href = document.location.href.split("?")[0];
    window.location.replace(href + "?logout=true");
    return;
}
