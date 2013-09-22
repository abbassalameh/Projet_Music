<?php
require_once ('php_image_magician.php');
include ("connection.php");
$title = $_POST ['title'];
$artist = $_POST ['artist'];
$album = $_POST ['album'];
$music = $_FILES ['file'] ['name'];
$genre = $_POST ['genre'];
$cover = $_FILES ['cover'] ['name'];
if (! empty ( $title ) && ! empty ( $artist ) && ! empty ( $album ) && ! empty ( $music ) && ! empty ( $cover ) && ! empty ( $genre )) {
	$title = str_replace ( ' ', '_', strtolower ( $title ) );
	$artist = str_replace ( ' ', '_', strtolower ( $artist ) );
	$album = str_replace ( ' ', '_', strtolower ( $album ) );
	$genre = str_replace ( ' ', '_', strtolower ( $genre ) );
	$temp_music = explode ( ".", $_FILES ["file"] ["name"] );
	$temp_images = explode ( ".", $_FILES ['cover'] ['name'] );
	$extension_music = end ( $temp_music );
	$extension_images = end ( $temp_images );
	$allowedExts_images = array (
			"jpeg",
			"jpg",
			"png" 
	);
	if (($extension_music == "mp3") && (in_array ( $extension_images, $allowedExts_images ))) {
		if ($_FILES ["file"] ["error"] > 0) {
			echo "Return Code: " . $_FILES ["file"] ["error"] . "<br>";
		} else {
			$music_nom = ucfirst ( $title ) . '-' . ucfirst ( $artist ) . ".mp3";
			if ($extension_images == "png")
				$cover_nom = ucfirst ( $title ) . '-' . ucfirst ( $artist ) . ".png";
			if ($extension_images == "jpg")
				$cover_nom = ucfirst ( $title ) . '-' . ucfirst ( $artist ) . ".jpg";
			if ($extension_images == "jpeg")
				$cover_nom = ucfirst ( $title ) . '-' . ucfirst ( $artist ) . ".jpeg";
			if ((file_exists ( "music/" . $music_nom )) || (file_exists ( "tmp_cover/" . $cover_nom ))) {
				echo "<script>alert('File already exists');
				window.location = 'music_upload.php';</script>";
			} else {
				move_uploaded_file ( $_FILES ["file"] ["tmp_name"], "music/" . $music_nom );
				move_uploaded_file ( $_FILES ["cover"] ["tmp_name"], "tmp_cover/" . $cover_nom );
				echo "Music file Stored in: " . "music/" . $music_nom . "<br>";
				echo "Cover file Stored in: " . "tmp_cover/" . $cover_nom . "<br>";
			}
			// je dois trouver une facon pour convertir l'image en format png pour pouvoir la cropper
			// *** Open JPG image
			$magicianObj = new imageLib ( "tmp_cover/" . $cover_nom );
			echo " was read <br/>";
			// *** Resize to best fit then crop
			$magicianObj->resizeImage ( 80, 80, 'crop' );
			
			echo "resized <br/>";
			// *** Save resized image as a PNG
			$magicianObj->saveImage ( "cover/" . $cover_nom );
			$cover_dir = "cover/" . $cover_nom;
			$file = "music/" . $music_nom;
			echo "Crop done successfully<br>";
			$querry = "INSERT INTO music(id,title,artist,album,cover,file) VALUES ('' ,'" . $title . "','" . $artist . "','" . $album . "','" . $cover_dir . "','" . $file . "')";
			mysql_query ( $querry );
			echo "L'insertion a ete fait<br>";
		}
	} else {
		echo "<script>alert('Invalid File');
		window.location = 'music_upload.php';</script>";
	}
} else
	echo "<script>alert('You have forgotten one or more field ! Please recheck');
				window.location = 'music_upload.php';</script>";

?>
