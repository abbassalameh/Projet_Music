<html>
<meta charset="utf-8">
<?php
session_start ();
$tab = array ();
$i = 0;
$thelist = "";
if ($handle = opendir ( 'music/' )) {
	while ( false !== ($file = readdir ( $handle )) ) {
		
		if ($file != "." && $file != "..") {
			
			$thelist .= '<a href="music/' . $file . '">' . $file . '</a><br>';
			$name = "music/" . $file;
			$tab [$i] = $name;
			$i ++;
		}
	}
	closedir ( $handle );
}
print_r ( $tab );
?>
<P>List of files:</p>
<P><?=$thelist?></p>
</html>

