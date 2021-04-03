<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'backtosmile';

$link = mysqli_connect($dbhost, $dbuser, $dbpass) or die(mysqli_connect_error());
$result = mysqli_query($link, "set names utf8");
mysqli_select_db($link, $dbname);

?>