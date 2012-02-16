#!/usr/bin/php

<?php
// Get the r parameter from URL
$r = $_GET["r"];

if ($r == 0) {
   $response = " <img src=\"../images/throbber.gif\" width=\"16\" height=\"16\" alt=\"\" /> ";
}
else {
   $response = " empty:ajaxLoad.php ";
}

//echo $response;
?>