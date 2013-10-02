<?php
include ("connection.php");
session_start ();
$uname = $_SESSION ['username'];
$id_music = $_GET ['id_music'];
$playlist_name = $_GET ['playlist_name'];
$insert_it_already = "SELECT * FROM music_selection WHERE username='" . $_SESSION ['username'] . "' AND id_music='" . $id_music . "'";
$result_find_playlist = mysql_query ( $insert_it_already );
if (mysql_num_rows ( $result_find_playlist ) == 0) {
	$query_insertion = "INSERT INTO music_selection(id,username,id_music,playlist_name) VALUES ('' ,'" . $uname . "','" . $id_music . "','" . $playlist_name . "')";
	mysql_query ( $query_insertion );
	header ( 'Location: logged_in.php' );
} else {
	header ( 'Location: logged_in.php?playlist_notice=true' );
}
?>