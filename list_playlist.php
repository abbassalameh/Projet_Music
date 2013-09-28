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
			<table>
<?php
while ( $row_playlists = mysql_fetch_assoc ( $result_playlist ) ) {
	
	echo "<tr><td><div class=\"playlist_name\">
		<a href=\"playlist.php?playlist_name=" . $row_playlists ['playlist_name'] . "\" 
			name=\"playlist_name\" value=\"" . $row_playlists ['playlist_name'] . "\" 
						>" . $row_playlists ['playlist_name'] . "</a></div></td><td>
			<a class=\"button_example\" href=\"#\">X</a></td></tr>";
}
?>
	</table>
		</div>
	</div>
</div>
