#!/usr/bin/php

<?php
require_once ('dictionary.php'); // Search word list

echo "<span class=\"info\">Results:</span><br /><br />";

$completed = 0;
// Get the q parameter from URL
$q = $_GET["q"];

// Lookup all resultlists from array if length of q > 0
if (strlen($q) > 0) {
   //$resultlist = "";
   $j = 0;
   for ($i = 0; $i < count($a); $i++) {
      $pos = strpos(strtolower($a[$i]), strtolower($q));
      if ($pos === false && strtolower($q != "*")) { // Could not find imagekey
         $j--;
      }
      else {
         $result[$j] = $a[$i];
      }
      /*if ((strtolower($q) == strtolower(substr($a[$i], 0, strlen($q)))) || strtolower($q) == "*") {
         //if ($resultlist == "") {
         //   $resultlist = $a[$i];
         //   $j--;
         //}
         //else {
            //$resultlist = $resultlist.", ".$a[$i];
            $result[$j] = $a[$i];
         //}
      } else {
         $j--;
      } */
      $j++;
   }
}
$completed = 1;

?>

<script language="javascript">
rOut = 0;
<?php
print "rOut.push(\"$completed\" );";
?>
</script>

<?php
if (count($result) == 0) {
   $warning = "<span class=\"error\">No results found for <strong>".$q."</strong></span>";
   $startip = "<span class=\"button smallprint searchtip\">Tip: View all results by typing <strong>*</strong></span>";
   echo stripslashes($warning."<br />".$startip);
}
else {
   for ($i = 0; $i < count($result); $i++) {
      $toprint = $result[$i];
      $imagekey="images/";
      $image = "";
      // Then print!
      $spanlink = "<a class=\"link\" href=\"http://www.doc.ic.ac.uk/~tb208/".$toprint."\">".$toprint."</a>";
      $details  = "<span class=\"button smallprint searchtip\">http://www.doc.ic.ac.uk/~tb208/".$toprint;
      $pos = strpos($toprint, $imagekey);
      if ($pos === false) { // Could not find imagekey
      }
      else {
         $image = "<img class=\"icon\" src=\"http://www.doc.ic.ac.uk/~tb208/".$toprint."\">";
      }
      echo stripslashes($spanlink."<br />".$details." ".$image."</span><br /><br />");
   }
}
?>
