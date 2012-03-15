#!/usr/bin/php
<?php
   include('header.php');
   echo '<script type="text/javascript" src="scripts/ASCIIMathML.js"></script>';
   include('header-mvspt.php');
   // Constants
   $material_prize = '200';
   $charity_total = ' of &pound;200';
   $charity_name = '<a href="https://www.barnardos.org.uk/donate/crisis.htm" class="info">Barnardo\'s</a>';
   $max_entries_pp = 5;
   $department_list = ''; //'; (c) in the Department of Computing at the University';
   $end_date = date('l jS \of F Y', mktime(0, 0, 0, 4, 10, 2012));
   $tsandcs_update = date('l jS \of F Y', mktime(0, 0, 0, 3, 13, 2012));
   $further_reading_tab = 'More...';
   $external_mode = isset($_GET['ext']);

   // Code syntax highlighting
   include('scripts/geshi.php');
   $geshi = new GeSHi();
   //$geshi->set_language_path('/geshi');
   $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS);
   $geshi->set_header_type(GESHI_HEADER_DIV);
   $pages = Array(
                  Array('path' => 'mvspt-intro.php', 'title' => 'Introduction', 'class' => 'largeprint'),
                  Array('path' => 'mvspt-simplegame.php', 'title' => 'Game', 'class' => 'largeprint'),
                  Array('path' => 'mvspt-whattodo.php', 'title' => 'What To Do', 'class' => 'largeprint'),
                  Array('path' => 'mvspt-examples.php', 'title' => 'Examples', 'class' => 'largeprint'),
                  Array('path' => 'mvspt-rules.php', 'title' => 'Submission', 'class' => 'largeprint'),
                  Array('path' => 'mvspt-advanced.php', 'title' => $further_reading_tab, 'class' => '')
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
                           echo '<a class="button tab default">' . $pages[$j]['title'] . '</a>';
                        } else {
                           echo '<a class="button tab" href="javascript:switchto(\'main-tab' . $i . '\', \'main-tab' . $j . '\')">' . $pages[$j]['title'] . '</a>';
                        }
                     }
                     echo '   </div>
                              <div class="' . $pages[$i]['class'] . '">';
                     $file = $pages[$i]['path'];
                     include($file);
                     echo '   </div>
                              <br /><br />';
                     if ($i < $size - 2) {
                        echo '<a class="button default" href="javascript:switchto(\'main-tab' . $i . '\', \'main-tab' . ($i + 1) . '\')">Continue</a>';
                     }
                     if ($i > 0) {
                        echo '<a class="button" href="javascript:switchto(\'main-tab' . $i . '\', \'main-tab' . ($i - 1) . '\')">Back</a>';
                     } else {
                        echo '<a class="button" href="index.php">Back</a>';
                     }
                     echo '</div>';
                  }
               ?>
               <br /><br /><br />
               <p><span class="smallprint">&copy; 2011-2012 Theodore Boyd. Advanced strategy examples provided by Ali Ghoroghi. For a full bibliography, please refer to the project interim report available in the Tournament Theory section under the <?php echo $further_reading_tab ?> tab.</span></p>
            </section>
<?php
   include('footer-preblank.php');
   include('footer.php');
?>
