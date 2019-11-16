function acceptCookies() {
    document.cookie = "acceptcookies=true";
    alert(document.cookie);
    var cookieValue = getCookie("acceptcookies");
}

function getCookie(name) {
    var value = "; " + document.cookie;
    var parts = value.split("; " + name + "=");
    if (parts.length == 2) {
        return parts
            .pop()
            .split(";")
            .shift();
    }
}
