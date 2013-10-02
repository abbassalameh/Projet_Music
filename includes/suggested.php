<?php
include ("connection.php");
session_start ();
$_SESSION['search_result']=0;
$querry_music = "SELECT * FROM music ORDER BY RAND() LIMIT 10";
$result_music = mysql_query ( $querry_music );
?>