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
      <script type="text/javascript" src="scripts/ASCIIMathML.js"></script>
     <?php
        // Constants
        $material_prize = "TBD";
        $charity_total = "TBD";
        $charity_name = "charity";
        $max_entries_pp = 5;
        $department_list = "Department of Computing";
        $end_date = "TBD, likely " . date("l jS \of F Y", mktime(0, 0, 0, 3, 1, 2012));

        // Code syntax highlighting
        include("scripts/geshi.php");
        $geshi = new GeSHi();
        //$geshi->set_language_path("/geshi");
        $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS);
        $geshi->set_header_type(GESHI_HEADER_DIV);
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
            <p>The game to be played is a variant of the Prisoner's Dilemma that incorporates social and material components. You will have the chance to write an algorithm that can play this game against other algorithms (strategies) submitted by players.</p>
            <p>We will gradually build up the game description. First we start with the original Prisoner's Dilemma:</p>
            <h4>Prisoner's Dilemma</h4>
            <blockquote>Two people are arrested for committing the same crime, but the police do not possess enough information for a conviction. They are separated such that they cannot communicate with each other. The police offer both of them the same deal &mdash; if one testifies against their partner (defects / betrays), and the other remains silent (cooperates / assists), the betrayer goes free and the cooperator receives the full one-year sentence. If both remain silent, both are sentenced to only one month in jail for a minor charge. If each betrays the other, each receives a three-month sentence as they will be guaranteed early release by the prosecution. Each prisoner must choose either to betray or remain silent; the decision of each is kept quiet.</blockquote>
            <p>Or, more simply:</p>
            <table>
               <tr>
                 <th></th>
                 <th>Prisoner B cooperates</th>
                 <th>Prisoner B defects</th>
               </tr>
               <tr>
                 <th>Prisoner A cooperates</th>
                 <td class="mathcell">Each serves 1 month</td>
                 <td class="mathcell">A serves 1 year; B goes free</td>
               </tr>
               <tr>
                 <th>Prisoner A defects</th>
                 <td class="mathcell">A goes free; B serves 1 year</td>
                 <td class="mathcell">Each serves 3 months</td>
               </tr>
            </table>
            <p>Now, if we were to give some relative numerical scores instead to each we could simplify it further. Note, we assume that staying in prison longer is worse, so a smaller sentence gives us a higher score. Take the meaning of (5, 0) to mean player A wins 5 points and player B wins 0:</p>
            <table>
               <tr>
                 <th></th>
                 <th>Player B cooperates</th>
                 <th>Player B defects</th>
               </tr>
               <tr>
                 <th>Player A cooperates</th>
                 <td class="mathcell">(3, 3)</td>
                 <td class="mathcell">(0, 5)</td>
               </tr>
               <tr>
                 <th>Player A defects</th>
                 <td class="mathcell">(5, 0)</td>
                 <td class="mathcell">(1, 1)</td>
               </tr>
            </table>
            <p>Finally, we'll generalise this table and turn the numbers into variables so that we can change them later &mdash; the rules for the tournament can then be determined in terms of the generalised values:</p>
            <table>
               <tr>
                 <th></th>
                 <th>Player B cooperates</th>
                 <th>Player B defects</th>
               </tr>
               <tr>
                 <th>Player A cooperates</th>
                 <td class="mathcell">(R, R)</td>
                 <td class="mathcell">(S, T)</td>
               </tr>
               <tr>
                 <th>Player A defects</th>
                 <td class="mathcell">(T, S)</td>
                 <td class="mathcell">(P, P)</td>
               </tr>
            </table>
            <h4>Social Prisoner's Dilemma</h4>
            <p>In the social version of the above, we use a simpler scoring table to place a strong bias towards the cooperation-versus-defection aspects only and not the play of the opponent. For this we have two components, M and M'. Where M is the Moral (or social) payoff and rewards cooperation and M' is its counterpart that punishes defection.</p>
            <table>
               <tr>
                 <th></th>
                 <th>Player B cooperates</th>
                 <th>Player B defects</th>
               </tr>
               <tr>
                 <th>Player A cooperates</th>
                 <td class="mathcell">(M, M)</td>
                 <td class="mathcell">(M, M')</td>
               </tr>
               <tr>
                 <th>Player A defects</th>
                 <td class="mathcell">(M', M)</td>
                 <td class="mathcell">(M', M')</td>
               </tr>
            </table>
            <h4>Dual Game Social Prisoner's Dilemma</h4>
            <p>We want to build the two components, of materialistic and social play, into a dual game where each player will play two games at once. The strategy should aim to win both a material prize and also a social (charitable) prize, depending on the player's social inclination. This inclination to one side or the other is determined by a social coefficient in the range [0, 1] which is referred to as <code>lambda</code> or $\lambda$. Player A's coefficient is $\lambda_A$ and player B's coefficient is $\lambda_B$.</p>
            <table>
               <tr>
                 <th></th>
                 <th>Player B cooperates</th>
                 <th>Player B defects</th>
               </tr>
               <tr>
                 <th>Player A cooperates</th>
                 <td class="mathcell">((1-$\lambda_A$)R, $\lambda_A$M), ((1-$\lambda_B$)R, $\lambda_B$M)</td>
                 <td class="mathcell">((1-$\lambda_A$)S, $\lambda_A$M), ((1-$\lambda_B$)T, $\lambda_B$M')</td>
               </tr>
               <tr>
                 <th>Player A defects</th>
                 <td class="mathcell">((1-$\lambda_A$)T, $\lambda_A$M'), ((1-$\lambda_B$)S, $\lambda_B$M)</td>
                 <td class="mathcell">((1-$\lambda_A$)P, $\lambda_A$M'), ((1-$\lambda_B$)P, $\lambda_B$M')</td>
               </tr>
            </table>

            <h3>The Tournament</h3>
            <!-- Section: Description -->
               <p>The tournament will follow the <a class="plainlink" href="http://en.wikipedia.org/wiki/Round-robin#Computing">round-robin</a> style of the 1980 experiments by <a class="plainlink" href="http://en.wikipedia.org/wiki/Robert_Axelrod">Robert Axelrod</a> (each strategy will compete with all other pairings and themselves once). Importantly, he determined a number of qualities that should be followed. Strategies should try to be:</p>
               <ul>
                  <li><strong>Nice</strong> &mdash; Strategies must not be the first to punish. It was noticed that an overwhelming majority of the winning strategies were optimistic in this way.
                  <li><strong>Retaliating</strong> &mdash; Strategies must not be simply blindly optimistic, however, and must respond to punishment appropriately.
                  <li><strong>Forgiving</strong> &mdash; Strategies must forgive previous punishment and resume being nice after having retaliated. This prevents revenge scenarios.
                  <li><strong>Non-envious</strong> &mdash; Strategies should not aim to score more than their opponent. This non-competitive nature seems counter-intuitive but is one of the qualities of the high-scoring nice strategies.
               </ul>
               <p>Strategies that are submitted will compete over a large number of rounds. Apart from this, they must follow a number of stated restrictions as set out in the Strategy Terms later on this page. A number of simplifications and moral restrictions, such as using $\lambda$ with discrete values and limiting its maximum change, and the specific values for the scores in the tables above, for example, are defined there. Time permitting, we may conduct more than one main tournament, with different rules for each. Otherwise, the only variations should be in the strategies themselves: their strategy (and its complexity), initial social coefficient and starting move.</p>
               <p>For a more in-depth description of the study that we will be prforming, download the project interim report:</p>
               <p><a class="gold" href="uploads/download.php?path=PIR.pdf">Project interim report</a> (Detailed PDF report, .pdf)</p>
            <br />
            <h3>What You Need To Do</h3>
               <p>Write a strategy that plays the game according to the description for the Dual Game Social Prisoner's Dilemma above (and conforms to the terms and conditions at the end).</p>
               <p>In addition, some examples are included below to get you started. Don't forget to look at the provided modules too.</p>
            <h3>Examples</h3>
               <p>To cater for as many people as possible, we will accept both strategies written out in English, formatted as <a class="plainlink" href="http://en.wikipedia.org/wiki/Pseudocode">pseudocode</a>, and also those written in code (Java, C++ and C). If the strategy is being written in a programming language, it <strong><em>must</em></strong> extend the <code>Strategy</code> class:</p>
               <p><a class="gold" href="uploads/download.php?path=Strategy.java">Strategy framework</a> (Java abstract class, .java)</p>
               <p>Otherwise, for pseudocode, just stick to the style in the examples provided:</p>
               <div id="ex-tab1" class="buttonbar">
                  <div class="tabbar">
                     <a class="button tab default">Pseudocode</a>
                     <a class="button tab" href="javascript:switchto('ex-tab1', 'ex-tab2')">Java</a>
                  </div>
                  <?php
                     $file_name = "uploads/Example-Pseudocode-01.txt";
                     $geshi->load_from_file($file_name);
                     $geshi->set_language("java5", true);
                     echo $geshi->parse_code();
                  ?>
               </div>
               <div id="ex-tab2" class="buttonbar" style="display: none;">
                  <div class="tabbar">
                     <a class="button tab" href="javascript:switchto('ex-tab2', 'ex-tab1')">Pseudocode</a>
                     <a class="button tab default">Java</a>
                  </div>
                  <?php
                     $file_name = "uploads/Example-Java-01.java";
                     $geshi->load_from_file($file_name);
                     echo $geshi->parse_code();
                  ?>
               </div>
               <p>Try downloading one of these examples to get familiar with what a submission should look like. If you haven't done something similar before, it is strongly recommended you download an example and use it as a starting point for your own. You don't even have to change it very much to submit as a successful strategy of your own.</p>
               <p><a class="gold" href="uploads/download.php?path=Example-Pseudocode-01.txt">Example pseudocode strategy</a> (plain text file, .txt)</p>
               <p><a class="gold" href="uploads/download.php?path=Example-Java-01.java">Example Java strategy</a> (Java class, .java)</p>
            <br />
            <h3>Advanced Examples</h3>
               <p>Here are some more involved examples to take a look at:</p>
               <div id="ae-tab1" class="buttonbar">
                  <div class="tabbar">
                     <a class="button tab default">Pseudocode</a>
                     <a class="button tab" href="javascript:switchto('ae-tab1', 'ae-tab2')">Java</a>
                     <!-- a class="button tab" href="javascript:switchto('ae-tab1', 'ae-tab3')">C++</a-->
                  </div>
                  <?php
                     $file_name = "uploads/Example-Pseudocode-02.txt";
                     $geshi->load_from_file($file_name);
                     $geshi->set_language("java5", true);
                     echo $geshi->parse_code();
                  ?>
               </div>
               <div id="ae-tab2" class="buttonbar" style="display: none;">
                  <div class="tabbar">
                     <a class="button tab" href="javascript:switchto('ae-tab2', 'ae-tab1')">Pseudocode</a>
                     <a class="button tab default">Java</a>
                     <!--a class="button tab" href="javascript:switchto('ae-tab2', 'ae-tab3')">C++</a-->
                  </div>
                  <?php
                     $file_name = "uploads/Example-Java-02.java";
                     $geshi->load_from_file($file_name);
                     echo $geshi->parse_code();
                  ?>
               </div>
               <!--div id="ae-tab3" class="buttonbar" style="display: none;">
                  <div class="tabbar">
                     <a class="button tab" href="javascript:switchto('ae-tab3', 'ae-tab1')">Pseudocode</a>
                     <a class="button tab" href="javascript:switchto('ae-tab3', 'ae-tab2')">Java</a>
                     <a class="button tab default">C++</a>
                  </div>
                  <?php
                     //$file_name = "uploads/Example-Cpp-02.java";
                     //$geshi->load_from_file($file_name);
                     //echo $geshi->parse_code();
                  ?>
               </div-->
               <p>Note how they make use of a <code>NashEquilibrium</code> module to obtain the Nash equilibrium for the particular lambda. This and other useful methods can be found in the source code for the MVSPT package which is available for study below. You may make use of any code that a <code>Strategy</code> class would have access to. If you are writing in pseudocode, you can assume common mathematical functions and the <code>NashEquilibrium</code> module to obtain the Nash equilibrium for a particular lambda as above.</p>
               <p><a class="gold" href="uploads/download.php?path=MVSPT-Src.zip">MVSPT Java framework source</a> (Zip archived Java code, .zip)</p>
               <p><a class="gold" href="uploads/download.php?path=Example-Pseudocode-02.txt">Advanced example pseudocode strategy</a> (plain text file, .txt)</p>
               <p><a class="gold" href="uploads/download.php?path=Example-Java-02.java">Advanced example Java strategy</a> (Java class, .java)</p>
            <br />
            <h3>Rules And Submission</h3>
            <!-- Section: Terms -->
               <p>Here is where you can submit your strategy! Before that, there are two sets of terms and conditions that you will need to read and agree to. The first is for the rules of the tournament and format of the submitted strategies, which is based on the description above. The second set of rules concerns the technicalities of the competition, the prizes and a few other restrictions, and are equally important.</p>
               <p><strong>While there are quite a few terms, remember that if you keep to the spirit of the competition above, you will essentially be adhering to them.</strong> Most terms have explanations and reasoning for each restriction. Additionally, if you're writing your code in Java, you will find it helpful to import the MVSPT source into your IDE of choice and then inherit the <code>Strategy</code> class &mdash; this will keep your code conformant with the Strategy Terms.</p>
               <p><span class="fakelink link" id="terms-toggle" onclick="$('#terms-box').toggle(400);">Read the terms and submit a strategy</span></p>
               <div id="terms-box" style="display: none;">
                  <br />
                  <h3>Terms And Conditions</h3>
                  <p>These are the restrictions that affect the tournament and strategies ("Strategy Terms"):</p>
                  <ol>
                     <li>$T > R > P > S$ &mdash; this makes it clear that while the temptation is to betray, it will be a better game for players to mostly cooperate.</li>
                     <li>$R > \frac{T + S}{2}$ &mdash; to prevent players from simply alternating between defecting and cooperating, we give them a better average score when mutually cooperating.</li>
                     <li>$M > \frac{R + P}{2}$ &mdash; for there to be a strong incentive to play the social route.</li>
                     <li>$R > M$ &mdash; to give a more realistic representation of today's society, where a material prize is often valued more than a charitable one.</li>
                     <li>$M' = S$ &mdash; to remove the incentive to set the social coefficient to its maximum value and then defect, we punish defection in the social game as strongly as we do the Sucker in the material game.</li>
                     <li>$T = 5$, $R = 3$, $P = 1$, $S = 0$, $M = 2.5$ and $M' = 0$.</li>
                     <li>The social coefficient is a discrete value to simplify the system. It is fixed to one of six values: $\lambda \in \{0.0, 0.2, 0.4, 0.6, 0.8, 1.0\}$.</li>
                     <li>We will limit by how much strategies may change their $\lambda$ per round using $\delta \in [-1.0, 1.0]$. The specific value will be included in the framework code and is small to prevent abrupt changes from total material to total social contribution and vice versa.</li>
                     <li>For the sake of privacy and the more accurate modelling of the ability of players to discern each others' strategies, we will use a variable to represent how deeply into an opponent's recent move history, $\chi_{move}$, and social coefficient history, $\chi_{coeff}$ the player can read. We will aim to keep $\chi_{move} = n$ (all visible) but have $\chi_{coeff} \geq 1$.</li>
                     <li>It is not permitted to attempt to cooperate just after having defected and reduced one's social coefficient. Similarly, it is not permitted to attempt to defect just after having cooperated and raised one's social coefficient. Both of these measures are in place to prevent undermining the concept of the game and if a strategy attempts to perform one of these combinations, it is invalid.</li>
                     <li>The winner of the material prize is the person that submitted the strategy which obtained the highest material score in the prize-eligible tournament.</li>
                     <li>There is no winner of the social prize; the donation to charity will be managed by the tournament organisers and attributed proportionally to people whose strategies contributed socially.</li>
                  </ol>
                  <p>These are the terms and conditions of the competition and prizes ("Competition Terms"):</p>
                  <ol>
                     <li>To submit a strategy there are no restrictions on age, residence, etc.</li>
                     <li>The above notwithstanding, to be eligible to receive a monetary prize you must be: (a) aged 18 or over at the time of submission; (b) a full-time student or member of staff of Imperial College London (The Imperial College of Science, Technology and Medicine, henceforth the "University"); (c) in the <?php echo $department_list ?> at the University.</li>
                     <li>Participants agree to having their full name (but not any contact details) listed along with their scores online for viewing by other participants and interested parties. This is integral to the study.</li>
                     <li>Submissions will only be accepted via this webpage.</li>
                     <li>Submissions written in a language other than Java will be converted to Java to run in the framework. While every effort will be made to avoid translation errors, if any occur that prevent the strategy from otherwise having won, the organiser waives any responsibility for prize loss.</li>
                     <li>Submissions will close on <?php echo $end_date ?> at 23:59 GMT.</li>
                     <li>Maximum <?php echo $max_entries_pp ?> entries per person.</li>
                     <li>If participants wish to be eligible for a prize, they <strong><em>must</em></strong> include their name and email address. The winner will be contacted by email. If the winner cannot be contacted and/or cannot receive the prize for any other reason, the next best scoring submission will be considered, and so on.</li>
                     <li>The organiser will endeavour to deliver the prize as quickly as possible, but a delivery time cannot be guaranteed.</li>
                     <li>Strategies that break any Strategy Terms will be discarded. Participants may, if there is time, be given the chance to, and assistance in, correcting, improving and/or resubmitting their work.</li>
                     <li>Fraudulent or plagiarised entries will disqualify <strong><em>all</em></strong> current and future entries belonging to the participant.</li>
                     <li>The winner selection will be interpreted using the Strategy Terms and other rules on this page but the decision of the organiser is final in the case of dispute or uncertainty.</li>
                     <li>Prizes are non-transferable and non-exchangeable. However, if the stated prize is not available, an alternative prize of value acceptable to both the recipient and organiser may need to be provided as a replacement.</li>
                     <li>Anybody can find out who won the competition by emailing the organiser.</li>
                     <li>The competition organiser is Theodore Boyd who is in the University's Department of Computing and can be contacted via the details on <a href="index.html" class="legallink">his homepage.</a></li>
                  </ol>
                  <p>These rules may be subject to change without notice. If a change is made that significantly impacts those submissions already made, we will contact participants that have provided details for that purpose.</p>
            <!-- Section: Upload -->
                  <p><span class="fakelink link" id="upload-toggle" onclick="$('#upload-box').toggle(400);"><img class="icon" src="images/certified.png" alt="" /> I agree to all terms</span>&nbsp;<a class="error" href="index.html"><img class="icon" src="images/rejected.png" alt="" /> Cancel</a></p>
                  <div id="upload-box" style="display: none;">
                     <br />
                     <h3>Upload A Strategy</h3>
                     <form action="upload_script.php" method="post" enctype="multipart/form-data">
                        <p>Please upload a plain text file, Java/C/C++ source file or a PDF that is less than 2MB in size.</p>
                        <p>You must give it a unique name. For example, if this is your first submission, a good name is<br /><big><code>FirstName-LastName-01.txt</code></big> (or <big><code>.java/.c/.cpp/.pdf</code></big>). Remember to include your email address in your strategy so that we can contact you if you win!</p>
                        <span>
                           <label for="file">Select a file: </label>
                           <input type="file" name="file" id="file" class="file" />
                        </span>
                        <input class="link" type="submit" name="submit" value="Submit" />
                     </form>
                  </div>
               </div>
            <br />
               <p><a class="link" href="index.html">Return</a> to the main site</p>
               <p><span class="smallprint">&copy; 2011-2012 Theodore Boyd. Advanced strategy examples provided by Ali Ghoroghi. For a full list of references and a bibliography, please refer to the project interim report linked above.</span></p>
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

