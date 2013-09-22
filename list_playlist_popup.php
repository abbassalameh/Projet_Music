<?php
include ("connection.php");
session_start ();
$qq = intval ( $_GET ['qq'] );
$playlist_query = "SELECT * FROM playlist WHERE username='" . $_SESSION ['username'] . "'";
$result_playlist = mysql_query ( $playlist_query );
?>
<div id="scrollbar12">
	<div class="scrollbar2">
		<div class="track2">
			<div class="thumb2">
				<div class="end2"></div>
			</div>
		</div>
	</div>
	<div class="viewport2">
		<div class="overview2">
<?php
while ( $row_playlists = mysql_fetch_assoc ( $result_playlist ) ) {
	echo "<div class=\"playlist_name\"><a href=\"add_to_playlist.php?playlist_name=" . $row_playlists ['playlist_name'] . "&id_music=" . $qq . "\" name=\"playlist_name\" value=\"" . $row_playlists ['playlist_name'] . "\" >" . $row_playlists ['playlist_name'] . "</a></div>";
}

?>
	</div>
	</div>
</div>