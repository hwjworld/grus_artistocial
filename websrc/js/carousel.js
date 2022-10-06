var _wrapper = document.querySelector(".wrapper");
var _contain = document.querySelector(".contain");
//next picture button
var _nextPic = document.querySelector(".wrapper a:nth-of-type(2)");
//last picture button
var _prevPic = document.querySelector(".wrapper a:nth-of-type(1)");

var _btn = document.querySelector(".btn");
//dot change
var _spots = document.querySelectorAll(".btn span");


// nextPic
_nextPic.onclick = function () {
    next_pic();
}
var index = 0;

function next_pic() {
    _contain.style.left = _contain.offsetLeft - 440 + "px";
    if (_contain.offsetLeft <= -2200) {
        _contain.style.left = 0;
    }
    index++;
    if (index > 4) {
        index = 0;
    }
    spots();
}

// prevPic
_prevPic.onclick = function () {
    prev_pic();
}

function prev_pic() {
    _contain.style.left = _contain.offsetLeft + 440 + "px";
    if (_contain.offsetLeft > 0) {
        _contain.style.left = -1760 + "px";
    }
    index--;
    if (index < 0) {
        index = 4;
    }
    spots();
}

//autoplay
autoplay();
var id;

function autoplay() {
    id = setInterval(function () {
        next_pic();
    }, 2500)
}

//spot change
function spots() {
    for (var i = 0; i < _spots.length; i++) {
        if (i == index) {
            _spots[i].className = "active"
        } else {
            _spots[i].className = ""
        }
    }
}

//onmouseover
_wrapper.onmouseover = function () {
    clearInterval(id);
}
_wrapper.onmouseout = function () {
    autoplay();
}

