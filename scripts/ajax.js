var xmlhttp

function showHint(str) {
   if (str.length == 0) { 
      document.getElementById("txtHint").innerHTML = "";
      document.getElementById("txtLoad").innerHTML = "";
      return;
   }
   xmlHttpHint = getXmlHttpObject();
   xmlHttpLoad = getXmlHttpObject();
   if (xmlHttpHint == null) {
      alert ("Your browser does not support XMLHTTP!");
      return;
   }
   if (xmlHttpLoad == null) {
      //alert ("Your browser does not support XMLHTTP!");
      return;
   }
   urlHint = "scripts/ajaxHint.php" + "?q=" + str + "&sid=" + Math.random();
   urlLoad = "scripts/ajaxLoad.php";
   xmlHttpHint.onreadystatechange = stateChangedHint;
   xmlHttpLoad.onreadystatechange = stateChangedLoad;
   xmlHttpHint.open("GET", urlHint, true);
   xmlHttpLoad.open("GET", urlLoad + "?r=0", true);
   xmlHttpHint.send(null);
   xmlHttpLoad.send(null);
} 

function stateChangedHint() { 
   if (xmlHttpHint.readyState == 4) { 
      document.getElementById("txtHint").innerHTML = xmlHttpHint.responseText;
   }
}
function stateChangedLoad() { 
   if (xmlHttpLoad.readyState == 4) { 
      document.getElementById("txtLoad").innerHTML = xmlHttpLoad.responseText;
   }
}

function getXmlHttpObject() {
   if (window.XMLHttpRequest) {
      // Code for IE7+, Firefox, Chrome, Opera and Safari
      return new XMLHttpRequest();
   }
   if (window.ActiveXObject) {
      // Code for IE6 and IE5
      return new ActiveXObject("Microsoft.XMLHTTP");
   }
   return null;
}
