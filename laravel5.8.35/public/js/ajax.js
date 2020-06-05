
// equivalent to jquery ready() function

document.addEventListener('DOMContentLoaded', function() {
    var ajaxResults     = document.getElementById("ajaxResults");
    var defaultResults  = document.getElementById("defaultResults");
    var links           = document.getElementById("links");
}, false);

function getXMLHttpRequest() {
    var request;
    try {
        // Firefox, Safari, Opera, etc.
        request = new XMLHttpRequest();
    } catch (e) {
        try {
            //  first attempt for Internet Explorer
            request = new ActiveXObject("MSXML2.XMLHttp.6.0");
        } catch (e) {
            try {
                 //  second attempt for Internet Explorer
                 request = new ActiveXObject("MSXML2.XMLHttp.3.0");
            } catch (e) {
                // oops, can’t create one!
                request = false;
            }
        }
    }

    return request;
}

function liveSearch(prefix) {
    ajaxRequest = new getXMLHttpRequest();
    if (!ajaxRequest) {
        alert("Request error!");
    }
    var myURL = prefix;
    var search = document.getElementById("search").value;

    if (search) {
        myURL = myURL + "?search=" + search;
        ajaxRequest.onreadystatechange = ajaxResponse;
        ajaxRequest.open("GET", myURL, true);
        ajaxRequest.send(null);
    } else {
        clearSearchResults()
        showDefaultResults();
    }

}

function ajaxResponse() {
    if (ajaxRequest.readyState != 4) {
        return ;
    } else {
        if (ajaxRequest.status == 200) {
            displaySearchResults();
        } else {
            alert("Request failed: " + ajaxRequest.statusText);
        }
    }
}

function displaySearchResults() {
    // hidden default results
    hideDefaultResults();

    // display new results
    ajaxResults.innerHTML = ajaxRequest.responseText;
}


function clearSearchResults() {
    ajaxResults.innerHTML =  '';
}

function showDefaultResults() {
    defaultResults.style.display    = "flex";
    links.style.display             = "flex";
}

function hideDefaultResults() {
    defaultResults.style.display    = "none";
    links.style.display             = "none";
}
