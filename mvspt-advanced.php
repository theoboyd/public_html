<?php
   $advpages = Array(
                  Array('path' => 'mvspt-furtherreading.php', 'title' => 'Intro', 'shorttitle' => '1'),
                  Array('path' => 'mvspt-game.php', 'title' => 'Prisoner\'s Dilemma Theory', 'shorttitle' => '2'),
                  Array('path' => 'mvspt-tournament.php', 'title' => 'Tournament Theory', 'shorttitle' => '3'),
                  Array('path' => 'mvspt-advancedexamples.php', 'title' => 'Advanced Examples', 'shorttitle' => '4'),
                 )
?>
            <section id="content" class="body internal-nopad">
               <?php
                  $size = sizeof($advpages, 0);
                  $dispnone = ' style="display: none;"';
                  for ($i = 0; $i < $size; $i++) {
                     if ($i == 0) {
                        $display = '';
                     } else {
                        $display = $dispnone;
                     }
                     echo '<div id="adv-tab' . $i . '" class="buttonbar" ' . $display . '>
                              <div class="tabbar">';
                     for ($j = 0; $j < $size; $j++) {
                        if ($i == $j) {
                           echo '<a class="button tab default">' . $advpages[$j]['title'] . '</a>';
                        } else {
                           echo '<a class="button tab" href="javascript:switchto(\'adv-tab' . $i . '\', \'adv-tab' . $j . '\')">' . $advpages[$j]['title'] . '</a>';
                        }
                     }
                     echo '   </div>';
                     $file = $advpages[$i]['path'];
                     include($file);
                     echo '</div>';
                  }
               ?>
            </section>
