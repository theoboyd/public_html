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
               <h2><img class="thumb" src="images/mvspt.png" alt="" /> MVSPT</h2>
            </header>
            <section id="content" class="body">
            <!-- Section: Upload -->
               <h3>Upload A File</h3>
               <p></p>
               <form action="upload_script.php" method="post" enctype="multipart/form-data">
                  <label for="file">Select a file: </label>
                  <input class="info" type="file" name="file" id="file" class="file" />
                  <input class="link" type="submit" name="submit" value="Submit" />

              </form>
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

