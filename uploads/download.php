#!/usr/bin/php
<?php
   $saveName = stripslashes($HTTP_GET_VARS["path"]);
   $savePath = stripslashes($HTTP_GET_VARS["path"]);
   header ("Content-Type: application/octet-stream");
   header ("Content-Disposition: attachment; filename=$saveName");
   header ("Content-Transfer-Encoding: binary");
   readfile($savePath);
?>
