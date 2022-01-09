function GoBackWithRefresh(event) {
    if ('referrer' in document) {
        window.location = document.referrer;
        /* OR */
        //location.replace(document.referrer);
    } else {
        window.history.back();
    }
}

function GoBackTwiceWithRefresh(filename, id) {
    let link = document.referrer;
    console.log(filename);
    document.getElementById(id).href = link.replace(filename, "grupa");
}