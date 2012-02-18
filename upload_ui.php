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
      <script type="text/javascript">
         $(document).ready(function() {
            $('#terms-toggle').click(function() {
               $('#terms-box').toggle(400);
               return false;
            });
            $('#upload-toggle').click(function() {
               $('#upload-box').toggle(400);
               return false;
            });
         });
      </script>
     <?php
        // Constants
        $material_prize = "TBD";
        $charity_total = "TBD";
        $charity_name = "charity";
        $max_entries_pp = 5;
        $department_list = "Department of Computing";
        $end_date = date("l jS \of F Y", mktime(0, 0, 0, 1, 1, 2012));
     ?>
   </head>
   <body>
      <div id="wrap">
         <div id="main">
         <!-- -->
            <div style="float: left;">
            <header class="body">
               <h2><img class="thumb" src="images/mvspt.png" alt="" /> MVSPT: <span class="vsmallprint">Material Versus Social Payoff Tournaments</span></h2>
            </header>
            <section id="content" class="body">
            <h3>Introduction</h3>
            <!-- Section: Info -->
            <p>In exchange for some of your time to <strong>write a play strategy for a two-player game</strong>, you will help with a study on the social and material aspects of human competitive gameplay. Not only could you get the satisfaction of winning in a game of intelligence and strategy against your peers and people from around the world, eligible participants could also <strong>win &pound;<?php echo $material_prize ?> and be part of a donation of &pound;<?php echo $charity_total ?> to <?php echo $charity_name ?></strong>!
            <h3>The Game</h3>
            <p>The game to be played is a variant of the Prisoner's Dilemma that incorporates social and material components. You will have the chance to write a algorithm that can play this game against other algorithms (or strategies) submitted by players.</p>
            <h3>Competition</h3>
            <!-- Section: Description -->
               <p>Simplified rules TBD. For a full description of the study, download the project interim report:</p>
               <p><a class="gold" href="uploads/download.php?path=PIR.pdf">Project interim report</a> (Detailed PDF report, .pdf)</p>
            <br />
            <h3>Examples</h3>
               <p>To cater for as many people as possible, we will accept both strategies written out in English, formatted as <a class="plainlink" href="http://en.wikipedia.org/wiki/Pseudocode">pseudocode</a>, and also those written in code (Java, C++ and C).</p>
               <div id="ex-tab1" class="buttonbar">
                  <div class="tabbar">
                     <a class="button tab default">Pseudocode</a>
                     <a class="button tab" href="javascript:switchto('ex-tab1', 'ex-tab2')">Java</a>
                  </div>
                  <?php highlight_file("uploads/Example-Pseudocode-01.txt") ?>
               </div>
               <div id="ex-tab2" class="buttonbar" style="display: none;">
                  <div class="tabbar">
                     <a class="button tab" href="javascript:switchto('ex-tab2', 'ex-tab1')">Pseudocode</a>
                     <a class="button tab default">Java</a>
                  </div>
                  <?php highlight_file("uploads/Example-Java-01.java") ?>
               </div>
               <p>Try downloading one of these examples to get familiar with what a submission should look like. If you haven't done something similar before, it is strongly recommended you download an example and use it as a starting point for your own. You don't even have to change it very much to submit as a successful strategy of your own.</p>
               <p><a class="gold" href="uploads/download.php?path=Example-Pseudocode-01.txt">Example pseudocode strategy</a> (plain text file, .txt)</p>
               <p><a class="gold" href="uploads/download.php?path=Example-Java-01.java">Example Java strategy</a> (Java code, .java)</p>
            <br />
            <h3>Advanced Examples</h3>
               <p>Here are some more involved examples to take a look at:</p>
               <div id="ae-tab1" class="buttonbar">
                  <div class="tabbar">
                     <a class="button tab default">Nash Tit For Tat</a>
                     <a class="button tab" href="javascript:switchto('ae-tab1', 'ae-tab2')">AE-GS</a>
                  </div>
                  <?php highlight_file("uploads/Ali-Ghoroghi-01.java") ?>
               </div>
               <div id="ae-tab2" class="buttonbar" style="display: none;">
                  <div class="tabbar">
                     <a class="button tab" href="javascript:switchto('ae-tab2', 'ae-tab1')">Nash Tit For Tat</a>
                     <a class="button tab default">AE-GS</a>
                  </div>
                  <?php highlight_file("uploads/Georgios-Sakellariou-01.java") ?>
               </div>
               <p>Note how they make use of a <code>NashEquilibrium</code> module to obtain the Nash equilibrium for the particular lambda. This and other useful methods can be found in the source code for the MVSPT package which is available for study below. You may make use of any code that a <code>Strategy</code> class would have access to. If you are writing in pseudocode, you can assume common mathematical functions and the <code>NashEquilibrium</code> module to obtain the Nash equilibrium for a particular lambda as above.</p>
               <p><a class="gold" href="uploads/download.php?path=MVSPT-src.zip">MVSPT Java framework source</a> (Zip archived Java code, .zip)</p>
            <br />
            <h3>Rules And Submission</h3>
            <!-- Section: Terms -->
               <p>Here is where you can submit your strategy! Before that, there are two sets of terms and conditions that you will need to read and agree to. The first is for the rules of the tournament and format of the submitted strategies, which is based on the description above. The second set of rules concerns the technicalities of the competition, the prizes and a few other restrictions, and are equally important.</p>
               <p><a class="link" href="#" id="terms-toggle">Read the terms and submit a strategy</a></p>
               <div id="terms-box" style="display: none;">
                  <br />
                  <h3>Terms And Conditions</h3>
                  <p>These are the terms and conditions of the tournament and strategies:</p>
                  <ol>
                     <li>The winner of the material prize is the person that submitted the strategy which obtained the highest material score in the prize-eligible tournament.</li>
                     <li>There is no winner of the social prize; the donation to charity will be managed by the tournament organisers and attributed proportionally to people whose strategies contributed socially.</li>
                     <li>All submitters agree to having their full name (but not any contact details) listed along with their score online for viewing by other participants and interested parties. This is integral to the study.</li>
                  </ol>
                  <p>These are the terms and conditions of the competition and prizes:</p>
                  <ol>
                     <li>To submit a strategy there are no restrictions on age, residence, etc.</li>
                     <li>The above notwithstanding, to be eligible to receive a monetary prize you must be: (a) Aged 18 or over at the time of submission; (b) A full-time student or member of staff of Imperial College London (The Imperial College of Science, Technology and Medicine, henceforth the "University"); (c) In the <?php echo $department_list ?> at the University.</li>
                     <li>Submissions will only be accepted via this webpage.</li>
                     <li>Submissions will close on <?php echo $end_date ?> at 23:59 GMT.</li>
                     <li>Maximum <?php echo $max_entries_pp ?> entries per person.</li>
                     <li>If participants wish to be eligible for a prize, they <strong><em>must</em></strong> include their name and email address. The winner will be contacted by email. If the winner cannot be contacted and/or cannot receive the prize for any other reason, the next best scoring submission will be considered, and so on.</li>
                     <li>The organiser will endeavour to deliver the prize as quickly as possible, but a delivery time cannot be guaranteed.</li>
                     <li>Fraudulent or plagiarised entries will disqualify <strong><em>all</em></strong> current and future entries belonging to the participant.</li>
                     <li>The winner selection and other rules will be interpreted as on this page but the decision of the organiser is final.</li>
                     <li>Prizes are non-transferable and non-exchangeable. However, if the stated prize is not available, an alternative prize of value acceptable to both the recipient and organiser may need to be provided as a replacement.</li>
                     <li>Anybody can find out who won the competition by emailing the organiser.</li>
                     <li>The competition organiser is Theodore Boyd who is in the University's Department of Computing and can be contacted via the details on <a href="index.html" class="legallink">his homepage.</a></li>
                  </ol>
                  <p>These rules may be subject to change without notice. If a change is made that significantly impacts those submissions already made, we will contact participants that have provided details for that purpose.</p>
            <!-- Section: Upload -->
                  <p><a class="link" href="#" id="upload-toggle"><img class="icon" src="images/certified.png" alt="" /> I agree to all terms</a>&nbsp;<a class="error" href="index.html"><img class="icon" src="images/rejected.png" alt="" /> Cancel</a></p>
                  <div id="upload-box" style="display: none;">
                     <br />
                     <h3>Upload A Strategy</h3>
                     <form action="upload_script.php" method="post" enctype="multipart/form-data">
                        <p>Please upload a plain text file, Java/C/C++ source file or a PDF that is less than 2MB in size.</p>
                        <p>You must give it a unique name. For example, if this is your first submission, a good name is<br /><big><code>FirstName-LastName-01.txt</code></big> (or <big><code>.java/.c/.cpp/.pdf</code></big>).</p>
                        <p>Remember to include your email address in your strategy so that we can contact you if you win!</p>
                        <span>
                           <label for="file">Select a file: </label>
                           <input class="gold" type="file" name="file" id="file" class="file" />
                        </span>
                        <input class="link" type="submit" name="submit" value="Submit" />
                     </form>
                  </div>
               </div>
            <br />
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

