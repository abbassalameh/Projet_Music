<?php session_start();
if(empty($_SESSION['username']) && empty($_SESSION['password'])){
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header('Location: index.php');
exit;}?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta charset=UTF-8>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<link rel=stylesheet type=text/css href=css/style.css>
<link rel="stylesheet"
	href="http://jquery.bassistance.de/validate/demo/css/screen.css">
<!-- la icon doit etre de type png -->
<link rel="shortcut icon" href="img/favicon.png" type="image/png">
<link rel="shortcut icon" type="image/png" href="img/favicon.png" />
<!-- la feuille de style de cette page -->
<title>Welcome | Mellow-Dee</title>
<!-- jquerry pour la boite de recherche -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--  -->
<script src="js/prefixfree.min.js"></script>
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
					<td class="links" style='width:120px;'><div class="user_logged">Hello ,<?php echo $_SESSION['username'];?></div></td>
					<td class="links"><a class="signup" href='logout.php'>Logout</a></td>
					<td style='width: 300px'><span id="search"> <input name="q"
							type="text" size="40" placeholder="search..." />
					</span></td>
				</tr>
			</table>
		</nav>
		<div id="core" class="clearfix">
			<div class="left">
				<section id="left">
					<p>some content here.</p>
				</section>
			</div>
			<div class="right">
				<section id="right">
					<p>but some here as well!</p>
				</section>
			</div>
		</div>
		<footer>
			<p>Some copyright and legal notices here. Maybe use the © symbol a
				bit.</p>
		</footer>
	</div>
	<script src="js/modernizr.js"></script>
</body>
</html>