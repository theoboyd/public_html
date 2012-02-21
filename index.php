#!/usr/bin/php
<?php
   include('header.php');
   include('header-theo.php');
?>
            <section id="content" class="body">
            <!-- Section: Friendly browser warning -->
                <script type="text/javascript">
                    <!--
                    if (BrowserDetect.browser == "Netscape" || (BrowserDetect.browser == "IE" && BrowserDetect.version < 7))
                    {
                        document.write('<p class="error">This website may not display or function as intended in your current browser: <span class="info">' + BrowserDetect.browser + ' ' + BrowserDetect.version + '</span>. <br /><br />You may want to try <a class="link" href="http://www.google.com/chrome">a new browser</a>, or <a class="link" href="javascript:for(i=0;i<document.styleSheets.length;i++)%7Bvoid(document.styleSheets.item(i).disabled=true);%7Del=document.getElementsByTagName(\'*\');for(i=0;i<el.length;i++)%7Bvoid(el%5Bi%5D.style.cssText=\'\');%7D">disable CSS temporarily</a>.</p>');
                    }
                    // -->
                </script>
            <!-- Section: About -->
               <h3>About</h3>
               <p>Fourth year MEng Computing student</p>
               <p>Department of <a class="link" href="http://www.doc.ic.ac.uk/">Computing</a>, <a class="link" href="http://www.ic.ac.uk/">Imperial College London</a></p>
            <!-- Contact email in Java
               <object classid="java:ICWebDetails.class" codebase="java" type="application/x-java-applet" width="226" height="18">
                  <param name="code" value="ICWebDetails" />
                  <param name="java_codebase" value="java" />
                  <param name="foreground" value="000000" />
                  <param name="background" value="ffffff" />
                  <param name="shadow" value="ffffff" />
                  <p><span class="error">You don't have Java enabled/installed <a class="error" href="http://www.java.com/getjava">get Java</a></span></p>
               </object>
            -->
               <img src="images/email.png" style="vertical-align:middle;height:20px;" alt="" />
            <br />
            <!-- Section: Work -->
               <h3>Work</h3>
               <p><span class="info">2009</span> Go to our <a class="error" href="http://www.doc.ic.ac.uk/project/2008/163/g0816313">award winning<sup class="smallprint">&dagger;</sup> AI 
project <img class="icon" src="images/trophy.png" alt="" /></a>*</p>
               <p><span class="info">2009</span> Access my <a class="link" href="https://wwwhomes.doc.ic.ac.uk/~tb208/files-s/">public files <img class="icon" src="images/lock.png" alt="" /></a></p>
               <p><span class="info">2009</span> Play with my <a class="link" href="java/index.html">Java implementation</a> of <a class="info" href="http://en.wikipedia.org/wiki/Conway's_Game_of_Life">Conway's Game of Life</a></p>
               <p><span class="info">2010</span> View my scripting and web <a class="link" href="https://wwwhomes.doc.ic.ac.uk/~tb208/experiments-s/">experiments site <img class="icon" src="images/lock.png" alt="" /></a></p>
               <p><span class="info">2010</span> Play our <a class="error" href="http://www.doc.ic.ac.uk/project/2009/271/g0927130/stable/tradinggame/trunk/web/">online trading game</a>*</p>
               <p><span class="info">2011</span> You can find more interesting and work-in-progress items by <a class="link" href="javascript:$('#sidebar').css('background-color', '#bbffdd');">searching this site</a>.</p>
            </section>
         </div>
         <div style="clear: both;">
            <footer class="body">
               <div id="qrcode" style="display:none"><p>
                  <img class="barcode outline" src="images/qrcode.png" alt="" /><span class="super">&Dagger;</span>
                  <br /><br />
               </p></div>
               <p>&copy; 2008-2012 Theodore Boyd. &nbsp;* Now archived by the department &mdash; please contact me for the code.<sup>&dagger;</sup>Winner of the Deutsche Bank Prize for best project (Topics in AI: Knowledge Representation). 
&nbsp;<sup>&Dagger;</sup><a href="javascript:toggle('qrcode')" style="color:#000000">QR matrix barcode for this website.</a> &nbsp;<img class="footer-icon" src="images/lock.png" alt="" />Some department users only. &nbsp;Valid HTML5 and CSS3 except custom border-radius.</p>
            </footer>
         </div>
         <!-- -->
         </div>
         <div id="sidebar">
            <h3>Search this site</h3>
            <form action="#">
               <span class="info">Query:</span> <input type="text" id="txt1" tabindex="0" onkeyup="showHint(this.value)" />&nbsp;
               <span id="txtLoad"></span>
            </form>
            <p><span id="txtHint"></span></p>
         </div>
<?php
   include('footer.php');
?>
