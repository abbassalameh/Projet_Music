<?php include("connection.php");
$search_querry = "SELECT * FROM music ";
$search_result = mysql_query ( $search_querry );
$nb_result = mysql_num_rows ( $search_result );
while ( $row_search = mysql_fetch_assoc ( $search_result ) ) {
	echo "<li><div class=\"search_result\">";
	$title_searched = ucfirst ( str_replace ( '_', ' ', strtolower ( $row_search ['title'] ) ) );
	$artist_searched = ucfirst ( str_replace ( '_', ' ', strtolower ( $row_search ['artist'] ) ) );
	echo "<table><tr><td rowspan=2><img src=\"".$row_search['cover']."\" /></td><td>".$title_searched."</td></tr><tr><td>".$artist_searched."</td></tr></table>";
	echo "</div></li>"; }
	?>
