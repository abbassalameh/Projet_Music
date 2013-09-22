<?php
include ("connection.php");
session_start ();
$qq = intval ( $_GET ['qq'] );
$playlist_query = "SELECT * FROM playlist WHERE username='" . $_SESSION ['username'] . "'";
$result_playlist = mysql_query ( $playlist_query );
while ( $row_playlists = mysql_fetch_assoc ( $result_playlist ) ) {
	echo "<div class=\"playlist_name\"><a href=\"add_to_playlist.php?playlist_name=" . $row_playlists ['playlist_name'] . "&id_music=" . $qq . "\" name=\"playlist_name\" value=\"" . $row_playlists ['playlist_name'] . "\" >" . $row_playlists ['playlist_name'] . "</a></div>";
}
?>
