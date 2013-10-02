<?php
include ("connection.php");
session_start ();
$qq = intval ( $_GET ['qq'] );
$playlist_query = "SELECT * FROM playlist WHERE username='" . $_SESSION ['username'] . "'";
$result_playlist = mysql_query ( $playlist_query );
$nb_thing=mysql_num_rows($result_playlist);
if($nb_thing>0){
while ( $row_playlists = mysql_fetch_assoc ( $result_playlist ) ) {
	echo "<div class=\"playlist_name\"><a href=\"add_to_playlist.php?playlist_name=" . $row_playlists ['playlist_name'] . "&id_music=" . $qq . "\" name=\"playlist_name\" value=\"" . $row_playlists ['playlist_name'] . "\" >" . $row_playlists ['playlist_name'] . "</a></div>";
}
}
else echo "<div class=\"playlist_name\"><a>No playlists available</a></div>";
?>
