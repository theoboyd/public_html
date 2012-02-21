#!/usr/bin/php
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                        
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
   <head>
      <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
      <title>Theodore Boyd's DoC Pages</title>
      <!-- (C) 2008-2010 Theodore Boyd -->
      <link rel="stylesheet" type="text/css" href="../scripts/main.css" />
   </head>
   <body>
<!-- PHP begins -->
<!-- End nicely-indented code -->

<?php
#  Directory Index Script: Copyright (C) 2004, Salmun Kazerounian, Jon Rifkin
#  Portions (C) 2009 Theodore Boyd.

#  Set to 1 to show files whose names start with '.'
#  Initially show = 0.
$SHOW_DOT = 0;
$dir = "";

$hidden = $_REQUEST['hidden'];
if ($hidden == 1) {
   $SHOW_DOT = 1;
}

#  Name of this script (to be left out of directory listing)
$THIS_SCRIPT = getenv("SCRIPT_NAME");

#  Read path argument, if blank set to "."
$dir = $_REQUEST['dir'];
if ($dir == "" || $dir == false) {
   $dir = ".";
}

#  Determine absolute path (include trailing / if not blank)
$absdir = realpath($dir);
if ($absdir != "") {
   $absdir .= "/";
}

#  Directory where script lives (include trailing / if not blank)
$scriptdir = getcwd();
if ($scriptdir != "") {
   $scriptdir .= "/";
}

#  Insure that absolute dir is under the current directory
#  This prevents users from submitting a dir argument
#  that reaches outside the directory where this script resides.
$pos = strpos($absdir,$scriptdir);

if ($pos !== 0) {
   echo "<b>ERROR</b>: An invalid directory (<b>$dir</b>) was entered.<br/>";
   ?>
<i>Home Directory</i>:&nbsp;<a class="tall" href="../"><img src="../images/folder.open.gif"></a>
   <?php
   exit();
}

#  Get clean reldir (need for file and directory URLs)
$reldir = substr($absdir,strlen($scriptdir));

#  Refresh PHP's (OS's ?) file and directory list cache
clearstatcache();

#  Read directories and files in current directory
$handle  = opendir($absdir);
while (false !== ($filename = readdir($handle))) 
{   
   #  Add directory to list
   if (is_dir($absdir."/".$filename)==true && $filename!=".") { $dirs[] = $filename; }
   #  Add file to list (omit this script)
   if (is_dir($absdir."/".$filename)==false && $filename!=$THIS_SCRIPT) {
      if ($SHOW_DOT || substr($filename,0,1)!=".") {
         $files[] = $filename;
      }
   }
}

#  Get parent directory unless current directory
#  is the same as the directory of this script.
$at_topdir = $absdir==$scriptdir;
if (! $at_topdir) {
   $absparentdir="";
   $subdirs=explode("/",$absdir);
   for($x=1;$x<=count($subdirs)-3;$x++) {
      $absparentdir.="/".$subdirs[$x];
   }
}

#  Get relative parent directory
$relparentdir = substr($absparentdir,strlen($scriptdir));

#  Sort file and directory list
if ($files) { sort($files); }
if ($dirs)  { sort($dirs); }

#  Show current directory
if ($reldir=="") {
   $showdir = ".";
} else {
   $showdir = $reldir;
}

#  Start display table
?>
<table width="100%" cellspacing="0">
<tr>
<th scope="col" colspan="2" abbr="Header">
    <i>Home Directory</i>:&nbsp;<a class="tall" href="../"><img src="../images/folder.open.gif"></a>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <?php
    echo "<i>Current Directory</i>:&nbsp;<b>$showdir</b>\n";
    ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<i><img src="../images/file.set.gif">&nbsp;Show hidden files:&nbsp;
<?php echo "<a href=\"$THIS_SCRIPT?dir=$reldir&hidden=1\">On</a>&nbsp;|&nbsp;<a href=\"$THIS_SCRIPT?dir=$reldir&hidden=0\">Off</a>" ?>
</i>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<!--<form enctype="multipart/form-data" action="upload.php" method="POST">
Upload your own: <input name="uploaded" type="file" />
<input type="submit" value="Upload" />
</form>-->
<br/>
</th>
  </tr>
  <tr>
    <th scope="col" width=25% abbr="Dirs">Directories</th>
	<th scope="col" width=75% abbr="Files">Files</th>
  </tr>
  <td valign='top' align='left' style="background-color:#5e8cab;">
<?php
#  List directories
#  List parent directory also, if present
if ($at_topdir) {
   echo " \n";
} else {
   echo "<a class=\"tall\" href=\"$THIS_SCRIPT?dir=$relparentdir&hidden=$SHOW_DOT\"><img src=\"../images/folder.open.gif\">..</a><br/>\n";
}
if ($dirs) {
   foreach($dirs as $name) {
      #  List child directory
      if ($name!=".." && $name!="posts") {
         echo "<a class=\"tall\" href=\"$THIS_SCRIPT?dir=$reldir$name&hidden=$SHOW_DOT\"><img src=\"../images/folder.gif\">&nbsp;$name</a><br/>\n";
      }
   }
} else {
   print " \n";
}
echo "</td>\n";
?>
<td valign='top' align='left' style="background-color:#5e8cab;">
<?php
#  List files if present
if ($files) {
    foreach($files as $name) {
        if ($name != "index.php" && $name != "upload.php") {
            #  Form relative path to file by removing leading /.
            echo "<a class=\"tall\" href=\"$reldir$name\"><img src=\"../images/file.gif\">&nbsp;$name</a><br/>\n";
        }
   }
} else {
   print " \n";
}
echo "</td>\n";

?> 
</tr></table>
<!-- PHP ends -->
<!-- Resume nicely-indented code -->

      <div class="wrapper"> 
         <div class="container tall" id="superoverlaybonanza">
            <span id="superoverlaybonanza-inner">
               <p class="error">Warning: This page does not follow the new stylesheet and will most likely NOT be updated any time soon. <a class="link" href="../index.php">Go back</a>.</p>
            </span>
         </div>
      </div>      
   </body>
</html>
