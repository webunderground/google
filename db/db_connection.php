<?php
require_once('mysql.php');

$serverhost = "localhost";
$serveruser = "root";
$serverpwd  = "pasword";
$dbname     = "search";

$MyDb       = new cMysqlDB($serverhost,$serveruser,$serverpwd,$dbname);
?>
