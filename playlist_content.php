<?php
include ("connection.php");
	$query_playlist = "SELECT * FROM music_selection JOIN music ON music_selection.id_music = 
		music.id WHERE playlist_name='" . $_SESSION ['playlist_name'] . "' AND username='" . $_SESSION ['username'] . "'";
	$resultat_playlist = mysql_query ( $query_playlist );
	while ( $row_tab = mysql_fetch_assoc ( $resultat_playlist ) ) {
		echo "<div class=\"search_result\">";
		$title_searched = ucfirst ( str_replace ( '_', ' ', strtolower ( $row_tab ['title'] ) ) );
		$artist_searched = ucfirst ( str_replace ( '_', ' ', strtolower ( $row_tab ['artist'] ) ) );
		echo "<table><tr><td rowspan=3><img  src=\"" . $row_tab ['cover'] . "\"/></td>";
		echo "<td style=\"font: normal 30px Georgia, Arial , sans-serif;color:#0047B2;\">" . $title_searched . "</td>
				<td></td></tr>";
		echo "<tr><td style=\"font: normal 15px Helvetica, arial, sans-serif;\">" . $artist_searched . "</td>
				<td></td></tr>";
		echo "<tr><td><audio controls>
								<source src=\"" . $row_tab ['file'] . "\" type=\"audio/mpeg\">
								Your browser does not support the audio element.
								</audio></tr></td>
								</table>";
		echo "</div>";
		$_SESSION ['display_playlist'] = 0;
		$_SESSION ['search_result'] = 1;
	}
?>