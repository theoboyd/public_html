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
   $end_date = 'TBD, likely ' . date('l jS \of F Y', mktime(0, 0, 0, 3, 1, 2012));
   $default_strategies_will = 'not be eligible';

   // Code syntax highlighting
   include('scripts/geshi.php');
   $geshi = new GeSHi();
   //$geshi->set_language_path('/geshi');
   $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS);
   $geshi->set_header_type(GESHI_HEADER_DIV);
   $pages = Array(
                  Array('path' => 'mvspt-xxx.php', 'title' => 'yyy')
                 )
?>
            <section id="content" class="body">
               <?php
                  for ($i = 0, $size < sizeof($pages); $i < $size; $i++) {
                     $dispnone = '';
                     if ($i == 0) {
                        $dispnone = ' style="display: none;"';
                     }
                     echo '<div id="main-tab' . $i . '" class="buttonbar" ' . $dispnone . '>
                              <div class="tabbar">';
                     for ($i = 0, $size < sizeof($pages); $i < $size; $i++) {
                        if ($i == $j) {
                           echo '<a class="button tab default">' . $pages[$j]['title'] . '</a>';
                        } else {
                           echo '<a class="button tab" href="javascript:switchto(\'main-tab' . $i . '\', \'main-tab' . $j . '\')">' . $pages[$j]['title'] . '</a>';
                        }
                     }
                     echo ' </div>
                           </div>';
                  }
               ?>
               <div id="main-tabINFIN" class="buttonbar" style="display: none;">
                  <div class="tabbar">
                     <a class="button tab" href="javascript:switchto('main-tabINFIN', 'main-tab1')">Welcome</a>
                     <a class="button tab" href="javascript:switchto('main-tabINFIN', 'main-tab2')">Java</a>
                     <a class="button tab default">C++</a>
                  </div>
               </div>

               <?php include('mvspt-intro.php'); ?>
               <?php include('mvspt-game.php'); ?>
               <?php include('mvspt-social.php'); ?>
               <?php include('mvspt-dualgamesocial.php'); ?>
               <?php include('mvspt-tournament.php'); ?>
               <?php include('mvspt-needtodo.php'); ?>
               <?php include('mvspt-examples.php'); ?>
               <?php include('mvspt-advancedexamples.php'); ?>
               <?php include('mvspt-rules.php'); ?>
               <br />
               <p><a class="link" href="index.php">Return</a> to the main site</p>
               <p><span class="smallprint">&copy; 2011-2012 Theodore Boyd. Advanced strategy examples provided by Ali Ghoroghi. For a full list of references and a bibliography, please refer to the project interim report linked above.</span></p>
            </section>
<?php
   include('footer-preblank.php');
   include('footer.php');
?>
