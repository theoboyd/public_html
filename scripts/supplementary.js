/* (C) 2008-2010 Theodore Boyd */

function isChrome() {
   if (navigator.userAgent.toLowerCase().indexOf("chrome") != -1) {
      return true;
   }
   else {
      return false;
   }
}

function detect() {
   if (!isChrome()) {
      document.getElementById("browserwarning").innerHTML = "<div class='gold'><p><strong>Oops!</strong></p><p>You're not using <a class='link' href='http://www.google.com/chrome/'>Google Chrome</a>?<br /><span class='smallprint'>If you're sure you're using Chrome but are still seeing this message, please email me.</span></p></div>";
   }
}

function pageY(elem) {
    return elem.offsetParent ? (elem.offsetTop + pageY(elem.offsetParent)) : elem.offsetTop;
}

var buffer = 50; //Scroll bar buffer

function resizeIframe() {
    var height = document.documentElement.clientHeight;
    height -= pageY(document.getElementById('iframe')) + buffer;
    height = (height < 0) ? 0 : height;
    document.getElementById('iframe').style.height = height + 'px';
    resizeDebug();
}
document.getElementById('iframe').onload=resizeIframe;
window.onresize = resizeIframe;