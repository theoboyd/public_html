#!/usr/bin/php
<?php
   include('header.php');
   echo '<script type="text/javascript" src="scripts/sortable.js"></script>';
   include('header-mvspt.php');

   // Code syntax highlighting
   include('scripts/geshi.php');
   $geshi = new GeSHi();
   //$geshi->set_language_path('/geshi');
   $geshi->enable_line_numbers(GESHI_FANCY_LINE_NUMBERS);
   $geshi->set_header_type(GESHI_HEADER_DIV);
?>
            <section id="content" class="body">
              <a class="link" href="mvspt.php">Back to MVSPT</a>
              <br />
              <h3>Top 10 Strategies</h3>
              <table class="sortable" id="top-10-results">
              <tr>
                <th class="unsortable">Strategy</th>
                <th class="unsortable">Author</th>
                <th>Win percentage</th>
              </tr>
<tr>
<td>
RL QTable I
</td>
<td>
Alex Gao
</td>
<td>
79.91%
</td>
</tr>
<tr>
<td>
AE-GS-S
</td>
<td>
In-house (Georgios Sakellariou)
</td>
<td>
8.92%
</td>
</tr>
<tr>
<td>
Rafal Strategy
</td>
<td>
Rafal Szymanski
</td>
<td>
4.78%
</td>
</tr>
<tr>
<td>
AE-GS
</td>
<td>
In-house (Georgios Sakellariou)
</td>
<td>
3.97%
</td>
</tr>
<tr>
<td>
Double Increment
</td>
<td>
Xiuyi Fan
</td>
<td>
2.41%
</td>
</tr>
<tr>
<td>
A Bit Random
</td>
<td>
Xiuyi Fan
</td>
<td>
0.01%
</td>
</tr>
<tr>
<td>
Always Cooperates
</td>
<td>
In-house (Theodore Boyd)
</td>
<td>
0.00%
</td>
</tr>
<tr>
<td>
Always Defects
</td>
<td>
In-house (Theodore Boyd)
</td>
<td>
0.00%
</td>
</tr>
<tr>
<td>
Nash Defect
</td>
<td>
Xin Yan
</td>
<td>
0.00%
</td>
</tr>
<tr>
<td>
Tit For Tat
</td>
<td>
In-house (Theodore Boyd)
</td>
<td>
0.00%
</td>
</tr>
              </table>
              <br />
              <span class="smallprint">Results from 10,000 round-robin tournament simulations. Winner confirmed using a further 500,000 simulations.</span><br />
              <span class="smallprint">Where is "RL QTable II"? Considered identical to "RL QTable I", it was disqualified.</span>
              <br /><br />

              <h3>Top 10 Strategies - Typical Single Run Scores</h3>
              <table class="sortable" id="single-run-results">
              <tr>
                <th class="unsortable">Strategy</th>
                <th class="unsortable">Author</th>
                <th>Morality&ddagger;</th>
                <th>Material</th>
                <th>Social</th>
                <th>Overall</th>
              </tr>
<tr>
<td>
Rafal Strategy
</td>
<td>
Rafal Szymanski
</td>
<td>
0.773
</td>
<td>
0.438
</td>
<td>
0.754
</td>
<td>
0.903
</td>
</tr>
<tr>
<td>
AE-GS-S
</td>
<td>
In-house (Georgios Sakellariou)
</td>
<td>
0.791
</td>
<td>
0.392
</td>
<td>
0.771
</td>
<td>
0.882
</td>
</tr>
<tr>
<td>
AE-GS
</td>
<td>
In-house (Georgios Sakellariou)
</td>
<td>
0.818
</td>
<td>
0.401
</td>
<td>
0.795
</td>
<td>
0.907
</td>
</tr>
<tr>
<td>
Nonsense People
</td>
<td>
In-house (Ali Ghoroghi)
</td>
<td>
0.445
</td>
<td>
0.462
</td>
<td>
0.346
</td>
<td>
0.606
</td>
</tr>
<tr>
<td>
Tit For Tat
</td>
<td>
In-house (Theodore Boyd)
</td>
<td>
0.000
</td>
<td>
0.948
</td>
<td>
0.000
</td>
<td>
0.697
</td>
</tr>
<tr>
<td>
Always Cooperates
</td>
<td>
In-house (Theodore Boyd)
</td>
<td>
1.000
</td>
<td>
0.000
</td>
<td>
1.000
</td>
<td>
0.770
</td>
</tr>
<tr>
<td>
A Bit Random
</td>
<td>
Xiuyi Fan
</td>
<td>
0.700
</td>
<td>
0.541
</td>
<td>
0.533
</td>
<td>
0.808
</td>
</tr>
<tr>
<td>
Always Defects
</td>
<td>
In-house (Theodore Boyd)
</td>
<td>
0.000
</td>
<td>
1.000
</td>
<td>
0.000
</td>
<td>
0.735
</td>
</tr>
<tr>
<td>
Double Increment
</td>
<td>
Xiuyi Fan
</td>
<td>
0.836
</td>
<td>
0.340
</td>
<td>
0.819
</td>
<td>
0.881
</td>
</tr>
<tr>
<td>
Eighty Percent Nice
</td>
<td>
Xiuyi Fan
</td>
<td>
0.800
</td>
<td>
0.136
</td>
<td>
0.800
</td>
<td>
0.716
</td>
</tr>
<tr>
<td>
RL QTable I
</td>
<td>
Alex Gao
</td>
<td>
0.409
</td>
<td>
0.923
</td>
<td>
0.417
</td>
<td>
1.000
</td>
</tr>
              </table>
              <br />
              <span class="smallprint">&ddagger;Average social coefficient, higher is more "moral". Scores have been scaled.</span>
              <br /><br />
              <h3>Winning Strategy Code</h3>
              <?php
                $file_name = "uploads/Winning-Example.java";
                $geshi->load_from_file($file_name);
                echo $geshi->parse_code();
              ?>
              <br /><br />
              <a class="link" href="mvspt.php">Close results</a>
              <br />
              <br /><br />
            </section>
            <script>
              ts_resortTable(document.getElementById('single-run-results'), 5);
            </script>
<?php
   include('footer-preblank.php');
   include('footer.php');
?>
