<?php
if (mysql_connect ( 'localhost', 'root', '' )) {
	if (mysql_select_db ( 'projet_music' )) {
		
	} else
		echo "Erreur Connection serveur";
}
?>
