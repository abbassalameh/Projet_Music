<?php
if (isset ( $_GET ['q'] )) {
	?>
<div id="scrollbar3">
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
	
	$q = $_GET ['q'];
	$q = str_replace ( ' ', '_', strtolower ( $q ) );
	$search_querry = "SELECT * FROM music where title = '$q' OR artist = '$q' OR album = '$q'";
	$search_result = mysql_query ( $search_querry );
	$nb_result = mysql_num_rows ( $search_result );
	while ( $row_search = mysql_fetch_assoc ( $search_result ) ) {
		echo "<div class=\"search_result\">";
		$title_searched = ucfirst ( str_replace ( '_', ' ', strtolower ( $row_search ['title'] ) ) );
		$artist_searched = ucfirst ( str_replace ( '_', ' ', strtolower ( $row_search ['artist'] ) ) );
		$tweet = "%23np " . $title_searched . " - " . $artist_searched;
		$tweet_fix = str_replace ( ' ', '%20', $tweet );
		echo "<table><tr><td rowspan=3><img  src=\"" . $row_search ['cover'] . "\"/></td>";
		echo "<td style=\"font: normal 30px Georgia, Arial , sans-serif;color:#0047B2;\">" . $title_searched . "</td>
			<td><div class=\"work\"><a name=\"" . $row_search ['id'] . "\" class=\"button add do_it\" id=\"sometin\" onclick=\"showUser(this.name);\">Add</a></div></td>
				<td><div class=\"work\"><a value=\"Tweet\" target=\"_blank\" href=\"http://twitter.com/home/?status=" . $tweet_fix . "\" class=\"icon-button twitter\"><i class=\"icon-twitter\"></i><span></span></a></div></td></tr>";
		echo "<tr><td style=\"font: normal 15px Helvetica, arial, sans-serif;\">" . $artist_searched . "</td>
				<td></td></tr>";
		echo "<tr><td><audio controls>
								<source src=\"" . $row_search ['file'] . "\" type=\"audio/mpeg\">
								Your browser does not support the audio element.
								</audio></tr>
								</table>";
		echo "</div>";
	}
	if ($nb_result == 0)
		$_SESSION ['search_result'] = 0;
	else
		$_SESSION ['search_result'] = 1;
	?>	</div>
	</div>
</div>
<?php
}
?>	
