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
RL QTable II
</td>
<td>
Alex Gao
</td>
<td>
46.2%
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
45.1%
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
4.30%
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
2.00%
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
1.60%
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
0.70%
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
              </table>
              <br />
              <span class="smallprint">Results averaged over 500,000 round-robin tournament simulations.</span>
              <br /><br />


              <h3>Top 10 Strategies - Typical Single Run Scores</h3>
              <table class="sortable" id="single-run-results">
              <tr>
                <th class="unsortable">Strategy</th>
                <th class="unsortable">Author</th>
                <th>Morality*</th>
                <th>Material</th>
                <th>Social</th>
                <th>Overall</th>
              </tr>
<tr>
<td>
RL QTable II
</td>
<td>
Alex Gao
</td>
<td>
0.496
</td>
<td>
0.857
</td>
<td>
0.445
</td>
<td>
1.000
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
0.696
</td>
<td>
0.536
</td>
<td>
0.680
</td>
<td>
0.937
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
0.748
</td>
<td>
0.467
</td>
<td>
0.723
</td>
<td>
0.917
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
0.870
</td>
<td>
0.291
</td>
<td>
0.842
</td>
<td>
0.875
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
0.774
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
0.704
</td>
<td>
0.582
</td>
<td>
0.511
</td>
<td>
0.841
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
0.765
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
0.887
</td>
<td>
0.217
</td>
<td>
0.875
</td>
<td>
0.843
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
0.000
</td>
<td>
0.940
</td>
<td>
0.000
</td>
<td>
0.719
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
0.478
</td>
<td>
0.836
</td>
<td>
0.449
</td>
<td>
0.987
</td>
</tr>
              </table>
              <br />
              <span class="smallprint">*Average social coefficient, higher is more "moral". Scores have been scaled.</span>
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
