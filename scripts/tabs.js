/* (C) 2008-2010 Theodore Boyd */

function loadclose(url) {
   setTimeout(self.close, 100);
   self.opener.location = url;
}
function toggle(obj) {
   var elem = document.getElementById(obj);
   elem.style.display = (elem.style.display != 'none' ? 'none' : '' );
}
function switchto(src, dst) {
   var elemsrc = document.getElementById(src);
   elemsrc.style.display = 'none';
   var elemdst = document.getElementById(dst);
   elemdst.style.display = '';
}
