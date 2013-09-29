<?php
include ("suggested.php");
if (empty ( $_SESSION ['username'] ) && empty ( $_SESSION ['password'] )) {
	unset ( $_SESSION );
	session_destroy ();
	session_write_close ();
	header ( 'Location: index.php' );
	exit ();
}
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset=UTF-8>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<link rel=stylesheet type=text/css href=css/style.css>
<link rel='stylesheet perytech' type=text/css
	href='css/font-awesome.css'>
<link rel=stylesheet type=text/css href=css/social-buttons.css>
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
<!-- la icon doit etre de type png -->
<link rel="shortcut icon" href="img/favicon.png" type="image/png">
<link rel="shortcut icon" type="image/png" href="img/favicon.png" />
<link rel="stylesheet" type="text/css" href="./plugin/css/style.css">
<!-- la feuille de style de cette page -->
<title>Welcome | Mellow-Dee</title>
<!-- jquerry pour la boite de recherche -->
<script src="js/jquery.min.js"></script>
<script src="js/prefixfree.min.js"></script>
<script src="js/master.js"></script>
<script src="js/jquery.validate.js"></script>
<script type="text/javascript" src="./plugin/jquery-jplayer/jquery.jplayer.js"></script>
<script type="text/javascript" src="./plugin/ttw-music-player-min.js"></script>
<script type="text/javascript" src="js/master_input.js"></script>
<script type="text/javascript" src="js/master_ajax.js"></script>
<script type="text/javascript" src="js/jquery.tinyscrollbar.min.js"></script>
<script type="text/javascript">
var myPlaylist = [
		<?php
		
		while ( $row = mysql_fetch_assoc ( $result_music ) ) {
			echo "{" . "mp3:'" . $row ['file'] . "'," . "title:'" . ucfirst ( str_replace ( '_', ' ', $row ['title'] ) ) . "'," . "artist:'" . ucfirst ( str_replace ( '_', ' ', $row ['artist'] ) ) . "'," . "cover:'" . $row ['cover'] . "'},";
		}
		?>
	]; 
</script>
<script type="text/javascript">
        $(document).ready(function(){
        	$('#scrollbar1').tinyscrollbar();
        	$('#scrollbar3').tinyscrollbar();
        	var description = '';
				$('.music_sample').ttwMusicPlayer(myPlaylist, {
                autoPlay:false, 
                description:description,
                jPlayer:{
                    swfPath:'../plugin/jquery-jplayer' //You need to override the default swf path any time the directory structure changes
                }
            });
        });
    </script>
</head>
<body>
	<div id="wrapper">

		<nav>
			<table class="tleft">
				<tr>
					<td><img class="logo" src="img/logo.png"></td>
					<td class="initial_title" style='width: 500px;'>Welcome to
						Mellow-Dee ♪</td>
				</tr>
			</table>
			<table class="tright">
				<tr>
					<td class="links" style='width: 120px;'><div class="user_logged">Hello ,<?php echo $_SESSION['username'];?></div></td>
					<td class="links"><a class="logout" href='logout.php'>Logout</a></td>
					<td style='width: 300px'>
						<form action="logged_in.php" method="GET">
							<span id="search"> <input name="q" type="text" size="40"
								placeholder="search..." />
							</span>
						</form>
					</td>
				</tr>
			</table>
		</nav>
		<div class='popup'>

			<div class="login">
				<span class="title_login">Playlist</span> <img src='img/x.png'
					alt='quit' class='x' id='x' />
				<div id="scrollbar2">
					<div class="scrollbar">
						<div class="track">
							<div class="thumb">
								<div class="end"></div>
							</div>
						</div>
					</div>
					<div class="viewport">
						<div class="overview">


							<div id="drop_the_nukes"></div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<div id="core" class="clearfix">
			<div class="left">
				<section id="left">

					<div class="content_left">
						<!--  this is where the search results goes -->
						<?php include("search_logged.php"); ?>
						<?php if($_SESSION['search_result']==0){?>
<div class="title_content_left">Suggested Music</div>
						<div class="music_sample"></div> <?php  }?>
					</div>
				</section>
			</div>
			<div class="right">
				<section id="right">
					<div class="content_right">
						<form action="logged_in.php" method=GET>
							<div class="playlists">
								<div class="title_container">
									<div class="playlists_title">Playlists</div>
								</div>
								<div class="playlist_list">
									<div class="new_playlist">
										<input type='button' name="add_playlist" class='add_playlist'
											value='Add playlist'></input>
									</div>
					<?php
					$playlist_query = "SELECT * FROM playlist WHERE username='" . $_SESSION ['username'] . "'";
					$result_playlist = mysql_query ( $playlist_query );
					if (isset ( $_GET ['submit_playlist_name'] )) {
						if (! empty ( $_GET ['playlist_name_input'] )) {
							$playlist_entry = $_GET ['playlist_name_input'];
							$playlist_insert_query = "INSERT INTO playlist(id,username,playlist_name) VALUES ('' ,'" . $_SESSION ['username'] . "','" . $playlist_entry . "')";
							$check_playlist = "SELECT * FROM playlist WHERE playlist_name = '$playlist_entry'";
							$playlist_checking = mysql_query ( $check_playlist );
							$nb_results = mysql_num_rows ( $playlist_checking );
							if ($nb_results > 0)
								"<div class=playlist_exists>You already have a playlist named " . $playlist_entry . "</div>";
							
							else
								mysql_query ( $playlist_insert_query );
						}
					}
					
					$result_playlist = mysql_query ( $playlist_query );
					if (mysql_num_rows ( $result_playlist ) > 0) {
						?><div class="ajax_here">
						<?php while ( $row_playlists = mysql_fetch_assoc ( $result_playlist ) ) {
							 include ("list_playlist.php");
						} ?></div>
					<?php } else
						"<div class='playlist_emtpy'>Your playlist is empty</div>";
					
					?>
					<div class="social_bar">
						<p><button class="btn btn-facebook"><i class="icon-facebook"></i> | Add us on Facebook</button></p>
						<p><button class="btn btn-twitter"><i class="icon-twitter"></i> | Follow us on Twitter</button></p>
						<p><button class="btn google-plus"><i class="icon-google-plus"></i> | Circle us on Google Plus</button></p>
						</div>
					</div>
					
							</div>
						</form>
					</div>
				</section>
			</div>
		</div>
		<footer>

			<div class="image_container">
				<div class="profo dev">
					<a><span></span><img src="./img/9.jpg" alt="image"></a>
				</div>
			</div>
			<div class="text_dev">
				Hello I'm Yuri and I'm the developer of this website . I thirst for
				code . I have an unconditional love to javascript,CSS3 and HTML5 . I
				experiment a lot . Wicked as a witch yet awesome as Barney Stinson .
				<div class="quote">Your future is what you build in your past</div>
			</div>
			<div class='social-wrap'>
				<ul>
					<li><a class='facebook' href='http://www.facebook.com/'
						target='_blaank'>Facebook</a></li>
					<li><a class='twitter' href='http://twitter.com/' target='_blaank'>Twitter</a></li>
					<li><a class='google-p' href='https://plus.google.com/'
						target='_blaank'>Google Plus</a></li>
					<li><a class='rss' href='#' target='_blaank'>Rss</a></li>
				</ul>
			</div>
		</footer>
		
	</div>
	<script src="js/modernizr.js"></script>
	<script src="http:"></script>
	<?php if(isset($_GET['playlist_notice']) && $_GET['playlist_notice']=="true"){?>
	<script>alert("You already have this track in your playlists");</script><?php }?>
	</body>
</html>