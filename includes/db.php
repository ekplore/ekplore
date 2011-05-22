<?php
//Define constants
$dbdomain = 'sqlhost.looneydoodle.com';
$db       = 'moveitgame';
$dbuser   = 'socialgamelab';
$dbpass   = 'gamelab';
$dbtable  = 'userProfile';

//Connect
$con = mysql_connect($dbdomain,$dbuser,$dbpass);
if (!$con)
    {
    die('Could not connect: ' . mysql_error());
    }
@mysql_select_db($db, $con) or die( "Unable to select database");
?>