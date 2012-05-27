#!/usr/bin/php
<?php
   include('header.php');
   echo '<script type="text/javascript" src="scripts/sortable.js"></script>';
   include('header-mvspt.php');
?>
            <section id="content" class="body">
              <h3>Top 10 Strategies</h3>
              <table class="sortable" id="results">
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
              <a class="link" href="mvspt.php">Close results</a>
              <br /><br />
              <span class="smallprint">*Average social coefficient, higher is more "moral". Scores have been scaled.</span>
            </section>
            <script>
              ts_resortTable(document.getElementById('results'), 5);
            </script>
<?php
   include('footer-preblank.php');
   include('footer.php');
?>
