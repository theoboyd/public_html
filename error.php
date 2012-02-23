#!/usr/bin/php
<?php
   include('header.php');
   include('header-theo.php');
?>
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
<?php
   include('footer.php');
?>
