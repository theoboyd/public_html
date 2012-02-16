#!/usr/bin/perl

use CGI::Carp qw(fatalsToBrowser);
use strict;
use vars qw($namelimit $postlimit $allowhtml $rootpath $rooturl $datapath $flock %in %cookie $basepath $cgipath $cgiurl $htmlpath $htmlurl $imageurl $imagepath $username $password $houroffset);


### SETUP VARIABLES ###

$cgiurl='https://wwwhomes.doc.ic.ac.uk/~tb208/files/Comments/posts';
### Full URL to the csPost directory

$cgipath='/homes/tb208/public_html/files/Comments/posts';
### Full PATH to the csPost directory

$imageurl='https://wwwhomes.doc.ic.ac.uk/~tb208/images';
### Full URL to the images directory

$datapath = $cgipath.'/data';
### Full PATH to the data subdirectory. Usually there is no need to change this.

$username='username328974434675';
$password='password562343271145';
### username and password to get into the management

### CONFIGURATION SETTINGS ###

$allowhtml=0;
### use '1' to allow for html code in the postings. Use '0' to disallow html code.

$namelimit=50;
### character limit for the name field.

$postlimit=5000;
### character limit for the posting.

### END SETUP VARIABLES ###

#####################################################################
#    Code for csPost follows. (C) CGISCRIPT.NET                     #
#    Some minor edits/customisations by Theodore Boyd               #
#    Begin copyright notice from original script author:            #
#####################################################################

#####################################################################
# csPost - 1.0 - 10/02/2005                                         #
#                                                                   #
#####################################################################
#                                                                   #
#    Copyright (C) 1999-2005 CGISCRIPT.NET - All Rights Reserved    #
#                                                                   #
#####################################################################
#                                                                   #
#          THIS COPYRIGHT INFORMATION MUST REMAIN INTACT            #
#                AND MAY NOT BE MODIFIED IN ANY WAY                 #
#                                                                   #
#####################################################################
#
# When you downloaded this script you agreed to accept the terms 
# of this Agreement. This Agreement is a legal contract, which 
# specifies the terms of the license and warranty limitation between 
# you and CGISCRIPT.NET. You should carefully read the following 
# terms and conditions before installing or using this software.  
# Unless you have a different license agreement obtained from 
# CGISCRIPT.NET, installation or use of this software indicates 
# your acceptance of the license and warranty limitation terms
# contained in this Agreement. If you do not agree to the terms of this
# Agreement, promptly delete and destroy all copies of the Software.
#
# Versions of the Software 
# Only one copy of the registered version of CGISCRIPT.NET 
# may used on one web site.
# 
# License to Redistribute
# Distributing the software and/or documentation with other products
# (commercial or otherwise) or by other than electronic means without
# CGISCRIPT.NET's prior written permission is forbidden.
# All rights to the CGISCRIPT.NET software and documentation not expressly
# granted under this Agreement are reserved to CGISCRIPT.NET.
#
# Disclaimer of Warranty
# THIS SOFTWARE AND ACCOMPANYING DOCUMENTATION ARE PROVIDED "AS IS" AND
# WITHOUT WARRANTIES AS TO PERFORMANCE OF MERCHANTABILITY OR ANY OTHER
# WARRANTIES WHETHER EXPRESSED OR IMPLIED.   BECAUSE OF THE VARIOUS HARDWARE
# AND SOFTWARE ENVIRONMENTS INTO WHICH CGISCRIPT.NET MAY BE USED, NO WARRANTY 
# OF FITNESS FOR A PARTICULAR PURPOSE IS OFFERED.  THE USER MUST ASSUME THE
# ENTIRE RISK OF USING THIS PROGRAM.  ANY LIABILITY OF CGISCRIPT.NET WILL BE
# LIMITED EXCLUSIVELY TO PRODUCT REPLACEMENT OR REFUND OF PURCHASE PRICE.
# IN NO CASE SHALL CGISCRIPT.NET BE LIABLE FOR ANY INCIDENTAL, SPECIAL OR
# CONSEQUENTIAL DAMAGES OR LOSS, INCLUDING, WITHOUT LIMITATION, LOST PROFITS
# OR THE INABILITY TO USE EQUIPMENT OR ACCESS DATA, WHETHER SUCH DAMAGES ARE
# BASED UPON A BREACH OF EXPRESS OR IMPLIED WARRANTIES, BREACH OF CONTRACT,
# NEGLIGENCE, STRICT TORT, OR ANY OTHER LEGAL THEORY. THIS IS TRUE EVEN IF
# CGISCRIPT.NET IS ADVISED OF THE POSSIBILITY OF SUCH DAMAGES. IN NO CASE WILL
# CGISCRIPT.NET' LIABILITY EXCEED THE AMOUNT OF THE LICENSE FEE ACTUALLY PAID
# BY LICENSEE TO CGISCRIPT.NET.
#
# Credits:
# Andy Angrick - Programmer
# Mike Barone - Design
# Email: contact@cgiscript.net
# For information about this script or other scripts see 
# http://www.cgiscript.net
#
# Thank you for trying out our script.
# If you have any suggestions or ideas for a new innovative script
# please direct them to contact@cgiscript.net.  Thanks.
#
########################################################################

$houroffset=0;
$flock=1;
$in{'scriptname'} = 'csPost.cgi';
$in{'imageurl'} = $imageurl;
$in{'cgiurl'} = $cgiurl.'/'.$in{'scriptname'};

&main;

sub main{
print "Content-type: text/html\n\n";
&GetCookies;
($ENV{'CONTENT_TYPE'} =~ /multipart\/form-data/i)?(&getdata(1)):(&getdata());
my $command = $in{'command'};
($command eq "login")&&(&DoLogin);
($command eq "")&&(&View);
($command eq "view")&&(&View);
($command eq "submitpost")&&(&SubmitPost);
&GetLogin;
($command eq "manage")&&(&Manage);
($command eq "delete")&&(&Delete);
($command eq "slw")&&(&ShowLinksWizard);
}

sub ShowLinksWizard{
my $rurl = $in{'cgiurl'};
$rurl =~ s/http:\/\/.*?\//\//i;

$in{'ssicode'} = "<!--#include virtual=\"$rurl?command=view\" -->";
$in{'phpcode'} = "<?
include(\"$in{'cgiurl'}?command=view\");
?>";

$in{'directcode'} = qq|$in{'cgiurl'}?command=view|;
$in{'jcode'} = qq|<script language=javascript src="$in{'cgiurl'}?command=view&j=1"></script>|;
&PageOut("$cgipath/t_linkswizard.htm");
exit;	
}

sub View{
my($post_name, $post_date, $posting,$id);

#get template
my $tmpl='';
open(DB,"<$cgipath/t_post_listing.htm");
while(<DB>){
	$tmpl .= $_;
	}
close DB;
my($it) = $tmpl =~ /<!\-\- +POST +ROW +\- +START +\-\->(.*)<!\-\- +POST +ROW +\- +END +\-\->/si;
$tmpl =~ s/<!\-\- +POST +ROW +\- +START +\-\->.*<!\-\- +POST +ROW +\- +END +\-\->/[row]/si;

my $row='';
open(DB,"<$cgipath/data/postings.cgi");
while(<DB>){
	chomp;
	($id,$post_date,$post_name,$posting) = split("\t",$_);
	my $tmp = $it;
	$tmp =~ s/in\(post_date\)/$post_date/g;
	$tmp =~ s/in\(post_name\)/$post_name/g;
	if($allowhtml){
		$posting = &reverseHTML($posting);
		}
	$tmp =~ s/in\(posting\)/$posting/g;	
	$row .= $tmp;
	}
close DB;
(!$row)&&($row = qq|No posts entered<hr align="left" noshade size="1" color="#000000">|);

$tmpl =~ s/\[row\]/$row/;
$tmpl =~ s/in\(cgiurl\)/$in{'cgiurl'}/;

if($in{'j'} != 1){
	print $tmpl;
	}
else{
	$tmpl =~ s/\r//g;
	my(@lines) = split("\n",$tmpl);
	foreach my $i (@lines){
		$i =~ s/\r//g;
		$i =~ s/\"/\\"/g;
		$i =~ s/\\n/\\\\n/g;
		$i =~ s/(scr)(ipt)/$1\"\+\"$2/gsi;
		print "document.write(\"$i\\n\");\n";
		}
}


exit;
}

sub SubmitPost{
my $id = &GetID;
my($post_name,$posting,$post_date,$fromurl);

$post_name = &htmlspecialchars($in{'post_name'});
$posting = &htmlspecialchars($in{'posting'});
$post_date = &ctime(time);
$fromurl = $in{'fromurl'};

if(!$post_name){
	&PError("Please enter your name.");
	}

if(!$posting){
	&PError("Please enter a message.");
	}

if(length($post_name) > $namelimit){
	&PError("Length of name must not exceed $namelimit characters.");
	}

if(length($posting) > $postlimit){
	&PError("Length of name must not exceed $postlimit characters.");
	}
	
open(DB,">>$cgipath/data/postings.cgi");
print DB "$id\t$post_date\t$post_name\t$posting\n";
close DB;

my $whereurl='';
	$fromurl =~ s/\&rnd=[\d\.]+//g;
	$fromurl =~ s/\?rnd=[\d\.]+//g;
if($fromurl =~ /\?/){
	$whereurl = "$fromurl&rnd=";
}
else{
	$whereurl = "$fromurl?rnd=";
	}

print qq|
<script language=javascript>

var rndURL = (1000*Math.random());
window.location="$whereurl"+rndURL;
</script>
|;
exit;
}
#alert("Posting Added"); REMOVED FROM ABOVE

sub Delete{
my $id = $in{'id'};
($id =~ /[^\d]/)&&(&PError("Error. Invalid ID"));

my @g = split(/\\0/,$in{'gid'});
my (%todel,@l);
foreach my $i (@g){
	$todel{$i} = 1;
	}

open(DB,"+<$datapath/postings.cgi");
($flock)&&(flock(DB,2));
while(<DB>){
	my(@r) = split("\t",$_);
	if(!$todel{$r[0]}){
		push(@l,$_);
		}
	}
seek(DB,0,0);

foreach my $i (@l){
	print DB $i;
	}
truncate(DB, tell(DB));

($flock)&&(flock(DB,8));
close DB;

print qq|
<script language=javascript>
alert("Entries deleted");
var rndURL = (1000*Math.random());
window.location="$in{'cgiurl'}?command=manage&rnd="+rndURL;
</script>
|;
exit;
}


sub Manage{
my($post_name, $post_date, $posting,$id);

open(DB,"<$cgipath/data/postings.cgi");
while(<DB>){
	chomp;
	($id,$post_date,$post_name,$posting) = split("\t",$_);
	$in{'line'} .= qq|
	<tr>
	    <td width="10" valign="top" align="center"><input type="checkbox" name=gid value="$id"></td>
	    <td>
	<!-- POST ROW - START -->
	<b>$post_name</b>&nbsp;<font size="1" color="#808080">$post_date</font>
	<br>$posting
	<!-- POST ROW - END -->
	    </td>
  	</tr>
	|;
	}
close DB;

(!$in{'line'})&&($in{'line'} = qq|<tr><td colspan=2>No posts entered</td></tr>|);
&PageOut("$cgipath/t_manage.htm");
exit;
}


sub DoLogin{
	&PageOut("$cgipath/t_login.htm");
	exit;
	}

sub GetLogin{
    $in{'UserName'} = $cookie{'UserName'};
    $in{'PassWord'} = $cookie{'PassWord'};
    
    # if no password, then output the login screen    
    if(!$in{'UserName'}){
        &PageOut("$cgipath/t_login.htm");
        exit;
    }
    
	if(($in{'UserName'} eq $username)&&($in{'PassWord'} eq $password)){
		#good to go.
		return 1;
		}

&PError("Error. Invalid username or password.");
exit;
}


sub getdata{
    my($usecgi)=@_;
    my($query,@names,$in,@in,$i,$loc,$key,$val);
    if($usecgi){
    use CGI;
    $query = new CGI;
    @names = $query->param;
    foreach $i (@names){
      $in{$i} = $query->param("$i");
      }
}
else{
# Read in text
  if ($ENV{'REQUEST_METHOD'} eq "GET") {
    $in = $ENV{'QUERY_STRING'};
  } elsif ($ENV{'REQUEST_METHOD'} eq "POST") {
    for ($i = 0; $i < $ENV{'CONTENT_LENGTH'}; $i++) {
      $in .= getc;
    }
  } 

  @in = split(/&/,$in);

  foreach my $i (0 .. $#in) {
    # Convert plus's to spaces
    $in[$i] =~ s/\+/ /g;

    # Convert %XX from hex numbers to alphanumeric
    $in[$i] =~ s/%(..)/pack("c",hex($1))/ge;

    # Split into key and value.
    $loc = index($in[$i],"=");
    $key = substr($in[$i],0,$loc);
    $val = substr($in[$i],$loc+1);
    $in{$key} .= '\0' if (defined($in{$key})); # \0 is the multiple separator
    $in{$key} .= $val;
    }
}
}

sub PError{
my($message,$c) = @_;
if($c){
print<<"EOF";
<body>
<script language=javascript>
alert("$message");
window.close();
</script>
EOF

}
else{
print<<"EOF";
<body>
<script language=javascript>
alert("$message");
history.back();
</script>
EOF

}
exit;
}

sub ctime {
    my @DoW = ('Sun','Mon','Tue','Wed','Thu','Fri','Sat');
    my @MoY = ('Jan','Feb','Mar','Apr','May','Jun',
	    'Jul','Aug','Sep','Oct','Nov','Dec');

    my($time) = @_;
    $time += ($houroffset * 3600);
    my($sec, $min, $hour, $mday, $mon, $year, $wday, $yday, $isdst)=localtime($time);
    my($date);
    $year += 1900;
    $mon++;
    $year = substr($year, 2, 2);
    $date = sprintf("%.2d.%.2d.%.2d %.2d:%.2d:%.2d", $mday, $mon, $year, $hour,$min,$sec);
    return $date;
    }

sub GetCookies{
my $cookies = $ENV{'HTTP_COOKIE'};
my @allcookies = split(/;\s*/,$cookies);
foreach my $i (@allcookies){
  my($name,$value) = split(/\s*=\s*/,$i);
  $cookie{$name}=$value;
  }
}

sub PageOut{
my ($file) = @_;
if($in{'js'} == 1){
	&PageOutJS($file);
	}
open(OUT,"<$file")||print "$!: $file<br>";
while(<OUT>){
$_ =~ s/in\((\w+)\)/$in{$1}/g;
print;
}
close OUT;
}

sub htmlspecialchars{
	my($buffer) =@_;
	$buffer =~ s/\&/\&amp;/g;
	$buffer =~ s/\</\&lt;/g;
	$buffer =~ s/\>/\&gt;/g;
	$buffer =~ s/\"/\&quot;/g;	
	$buffer =~ s/script//gi;
	$buffer =~ s/meta//gi;
	$buffer =~ s/\t//gi;
	$buffer =~ s/\r*\n/<br>/gi;
	return $buffer;
	}

sub reverseHTML{
	my($text) = @_;
	$text =~ s/\&gt;/>/g;
	$text =~ s/\&lt;/</g;
	$text =~ s/\&quot;/\"/g;
	$text =~ s/\&amp;/\&/g;
	return $text;
	}
	
sub GetID{
	my($id);
	open(DB,"<$datapath/_gcount.cgi");
	($flock)&&(flock(DB,2));
	$id = <DB>;
	($flock)&&(flock(DB,8));
	close DB;
	$id++;
	open(DB,">$datapath/_gcount.cgi");
	($flock)&&(flock(DB,2));
	print DB $id;
	($flock)&&(flock(DB,8));
	close DB;
	return $id;
	}
