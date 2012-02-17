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
            <!-- Section: Error Message -->
               <h3>Error <?php $errno = $_REQUEST['error']; echo $errno; ?></h3>
               <p><img src="images/monkey.gif" alt="" /></p>
               <p>Please <a class="link" href="http://www.doc.ic.ac.uk/~tb208">return to the home page</a></p>
            </section>
         </div>
         <div style="clear: both;">
            <footer class="body">
               <p>&copy; 2008-2012 Theodore Boyd. &nbsp;</p>
            </footer>
         </div>
         <!-- -->
         </div>
         <div id="sidebar">
            <h3>Search this site</h3>
            <form action="">
               <span class="info">Query:</span> <input type="text" id="txt1" onkeyup="showHint(this.value)" />&nbsp;
               <span id="txtLoad"></span>
            </form>
            <p><span id="txtHint"></span></p>
         </div>
         <div id="footer">
         </div>
      </div>
   </body>
</html>
