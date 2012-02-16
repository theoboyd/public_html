#!/usr/bin/php

<!doctype html>
<html lang="en">
   <head>
   </head>
   <body>
      <form action="upload_script.php" method="post" enctype="multipart/form-data">
         <label for="file">Filename:</label>
         <input type="file" name="file" id="file" /> 
         <br />
         <input type="submit" name="submit" value="Submit" />
      </form>
   </body>
</html>
