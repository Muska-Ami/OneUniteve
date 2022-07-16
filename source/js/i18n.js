let langcontainer = document.querySelector(".langselect select");

langcontainer.onchange = function (e) {
    let lang = e.target.value;
    if (lang === "auto") {
        document.cookie = "OU_LANG=empty; expires=Thu, 01 Jan 0000 00:00:00 UTC;";
    } else {
        setCookie("OU_LANG", lang);
    }
    console.log(lang);
}

function setCookie(name, value, daysToLive) {
    var cookie = name + "=" + encodeURIComponent(value);

    if(typeof daysToLive === "number") {
        cookie += "; max-age=" + (daysToLive*24*60*60);
    }
    document.cookie = cookie;
}