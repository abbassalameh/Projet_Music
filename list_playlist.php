<?php
$playlist_query = "SELECT * FROM playlist WHERE username='" . $_SESSION ['username'] . "'";
$result_playlist = mysql_query ( $playlist_query );
?>
<div id="scrollbar1">
	<div class="scrollbar">
		<div class="track">
			<div class="thumb">
				<div class="end"></div>
			</div>
		</div>
	</div>
	<div class="viewport">
		<div class="overview">

<?php
while ( $row_playlists = mysql_fetch_assoc ( $result_playlist ) ) {
	
	echo "<div class=\"playlist_name\"><a href=\"playlist.php?playlist_name=" . $row_playlists ['playlist_name'] . "\" name=\"playlist_name\" value=\"" . $row_playlists ['playlist_name'] . "\" >" . $row_playlists ['playlist_name'] . "</a></div>";
}
?>
	</div>
	</div>
</div>
