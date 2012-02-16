#!/usr/bin/php
<!doctype html>
<html lang="en">
   <head>
      <title>Theodore Boyd's DoC Pages</title>
      <meta charset="utf-8">
      <!-- (C) 2008-2011 Theodore Boyd -->
      <link rel="stylesheet" type="text/css" href="scripts/main.css" />
      <link rel="stylesheet" type="text/css" href="scripts/columns.css" />
      <script type="text/javascript" src="scripts/supplementary.js"></script>
      <script type="text/javascript" src="scripts/ajax.js"></script>
      <script type="text/javascript" src="scripts/tabs.js"></script>
      <script type="text/javascript" src="scripts/jquery.js"></script>
      <script type="text/javascript" src="scripts/browser.js"></script>
   </head>
   <body>
      <div id="wrap">
         <div id="main">
         <!-- -->
            <div style="float: left;">
            <header class="body">
               <h2><img class="thumb" src="images/theo.jpg" alt="" /> Theodore Boyd</h2>
            </header>
            <section id="content" class="body">
            <!-- Section: Upload -->
               <h3>Upload A File</h3>
               <p>
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
               <p><a class="link" href="index.html">Return</a> to the main site</p>
            </section>
         </div>
         <div style="clear: both;">
            <footer class="body">
            </footer>
         </div>
         <!-- -->
         </div>
         <div id="sidebar">
         </div>
         <div id="footer">
         </div>
      </div>
   </body>
</html>


