let selectTab = function (index, className) {
    let domList = document.getElementsByClassName(className);
    for (let i = 0; i < domList.length; i++) {
        if (i === index) {
            domList[i].style.display = 'block';
        } else {
            domList[i].style.display = 'none';
        }
    }
}

let getRequest = function () {
    let url = location.search;
    let theRequest = [];
    if (url.indexOf("?") != -1) {
        var str = url.substr(1);
        let strs = str.split("&");
        for (let i = 0; i < strs.length; i++) {
            theRequest[strs[i].split("=")[0]] = decodeURI(strs[i].split("=")[1]);
        }
    }
    return theRequest;
}