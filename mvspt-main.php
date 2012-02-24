#!/usr/bin/php
<?php
   include('header.php');
   echo '<script type="text/javascript" src="scripts/ASCIIMathML.js"></script>';
   include('header-mvspt.php');
   // Constants
   $material_prize = '150';
   $charity_total = 'TBD';
   $charity_name = 'charity';
   $max_entries_pp = 5;
   $department_list = 'Department of Computing';
   $end_date = date('l jS \of F Y', mktime(0, 0, 0, 4, 1, 2012));
   $default_strategies_will = 'not be eligible';

   // Code syntax highlighting
   include('scripts/geshi.php');
   $geshi = new GeSHi();
   //$geshi->set_language_path('/geshi');
   $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS);
   $geshi->set_header_type(GESHI_HEADER_DIV);
   $pages = Array(
                  Array('path' => 'mvspt-intro.php', 'title' => 'Introduction', 'shorttitle' => 'Step 1'),
                  Array('path' => 'mvspt-game.php', 'title' => 'The Game', 'shorttitle' => 'Step 2'),
                  Array('path' => 'mvspt-tournament.php', 'title' => 'The Tournament', 'shorttitle' => 'Step 3'),
                  Array('path' => 'mvspt-needtodo.php', 'title' => 'What You Need To Do', 'shorttitle' => 'Step 4'),
                  Array('path' => 'mvspt-examples.php', 'title' => 'Examples', 'shorttitle' => 'Step 5'),
                  Array('path' => 'mvspt-advancedexamples.php', 'title' => 'Advanced Examples', 'shorttitle' => 'Step 6'),
                  Array('path' => 'mvspt-rules.php', 'title' => 'Rules And Submission', 'shorttitle' => 'Step 7')
                 )
?>
            <section id="content" class="body">
               <?php
                  $size = sizeof($pages, 0);
                  $dispnone = ' style="display: none;"';
                  for ($i = 0; $i < $size; $i++) {
                     if ($i == 0) {
                        $display = '';
                     } else {
                        $display = $dispnone;
                     }
                     echo '<div id="main-tab' . $i . '" class="buttonbar" ' . $display . '>
                              <div class="tabbar">';
                     for ($j = 0; $j < $size; $j++) {
                        if ($i == $j) {
                           echo '<a class="button tab default">' . $pages[$j]['shorttitle'] . '</a>';
                        } else {
                           echo '<a class="button tab" href="javascript:switchto(\'main-tab' . $i . '\', \'main-tab' . $j . '\')">' . $pages[$j]['shorttitle'] . '</a>';
                        }
                     }
                     echo '   </div>';
                     $file = $pages[$i]['path'];
                     include($file);
                     echo '<br /><br />';
                     if ($i < $size - 1) {
                        echo '<a class="button default" href="javascript:switchto(\'main-tab' . $i . '\', \'main-tab' . ($i + 1) . '\')">Continue</a>';
                     }
                     if ($i > 0) {
                        echo '<a class="button" href="javascript:switchto(\'main-tab' . $i . '\', \'main-tab' . ($i - 1) . '\')">Back</a>';
                     }
                     echo '</div>';
                  }
               ?>
               <br /><br /><br />
               <p><a class="link" href="index.php">Return</a> to the main site</p>
               <p><span class="smallprint">&copy; 2011-2012 Theodore Boyd. Advanced strategy examples provided by Ali Ghoroghi. For a full list of references and a bibliography, please refer to the project interim report linked above.</span></p>
            </section>
<?php
   include('footer-preblank.php');
   include('footer.php');
?>
