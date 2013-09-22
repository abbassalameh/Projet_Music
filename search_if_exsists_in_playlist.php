<?php
include ("connection.php");
session_start ();
$uname = $_SESSION ['username'];
$id_music = $_GET ['id_music'];
$playlist_name = $_GET ['playlist_name'];
$insert_it_already = "SELECT * FROM music_selection WHERE username='" . $_SESSION ['username'] . "' AND id_music='" . $id_music . "'";
$result_find_playlist = mysql_query ( $insert_it_already );
if (mysql_num_rows ( $result_find_playlist ) == 0) {

}
?>
