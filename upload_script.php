#!/usr/bin/php

<!doctype html>
<html lang="en">
   <head>
   </head>
   <body>
<?php
if ((($_FILES["file"]["type"] == "text/plain")
|| ($_FILES["file"]["type"] == "text/x-c")
|| ($_FILES["file"]["type"] == "text/x-java-source")
|| ($_FILES["file"]["type"] == "application/pdf"))
&& ($_FILES["file"]["size"] < 20000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    echo "Type: " . $_FILES["file"]["type"] . "<br />";
    echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

    if (file_exists("uploads/" . $_FILES["file"]["name"]))
      {
      echo $_FILES["file"]["name"] . " already exists. ";
      }
    else
      {
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "uploads/" . $_FILES["file"]["name"]);
      echo "Stored in: " . "uploads/" . $_FILES["file"]["name"];
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>
   </body>
</html>
