<?php
include("connection.php");
session_start ();
$pn =$_GET ['qq'];
$playlist_delete_query = "DELETE FROM playlist WHERE username='" . $_SESSION ['username'] . "' AND playlist_name='".$pn."'";
mysql_query ( $playlist_delete_query );

include("list_playlist.php");

?>

