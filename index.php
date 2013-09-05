<?php
include ("suggested.php");
?>

<?php
if (isset ( $_GET ['user_login'] ) && isset ( $_GET ['pass_login'] )) {
	$user = $_GET ['user_login'];
	$pass = md5 ( $_GET ['pass_login'] );
	$sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
	$login_result = mysql_query ( $sql );
	$count = mysql_num_rows ( $login_result );
	if ($count == 1) {
		if (! isset ( $_SESSION ['username'] )) {
			$_SESSION ['username'] = $user;
		}
		if (! isset ( $_SESSION ['password'] )) {
			$_SESSION ['password'] = $pass;
		} else
			header ( "Location: logged_in.php" );
	} else {
		header ( "Location: index.php" );
	}
}
?>
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
<link rel="stylesheet" type="text/css" href="./plugin/css/style.css">
<!-- la feuille de style de cette page -->
<title>Welcome | Mellow-Dee</title>
<!-- jquerry pour la boite de recherche -->
<script type="text/javascript" src="js/jquery.min.js"></script>
<!--  -->
<script src="js/prefixfree.min.js"></script>
<script src="js/master.js"></script>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.js"></script>
<script type="text/javascript" src="js/jquery-1.6.1.min.js"></script>
<script type="text/javascript"
	src="./plugin/jquery-jplayer/jquery.jplayer.js"></script>
<script type="text/javascript" src="./plugin/ttw-music-player-min.js"></script>
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
<script>
$().ready(function() {

	$(".sign_upp").validate({
		rules: {
			phone: "required",
			username: {
				required: true,
				minlength: 2
			},
			password: {
				required: true,
				minlength: 5
			},
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
			email: {
				required: true,
				email: true
			}
			
		},
		messages: {
			username: {
				required: "Please enter a username",
				minlength: "Your username must consist of at least 2 characters"
			},
			password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long"
			},
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			},
			email: "Please enter a valid email address",
			phone : "Please enter a valid phone number"
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
					<td class="links"><a class="click" href=''>Login</a></td>
					<td class="links"><a class="signup" href=''>Sign Up</a></td>
					<td style='width: 300px'>
						<form action="index.php" method="GET">
							<span id="search"> <input name="q" type="text" size="40"
								placeholder="search..." />
							</span>
						</form>
					</td>
				</tr>
			</table>
		</nav>
		<form action="index.php" action='GET'>
			<div class='popup'>
				<div class="login">
					<span class="title_login">Login</span> <img src='img/x.png'
						alt='quit' class='x' id='x' /> <input type="text"
						placeholder="Username" id="username" value="" name="user_login"> <input
						type="password" placeholder="password" id="password_login"
						name="pass_login" value=""><input name="login" type="submit"
						value="Sign In">
				</div>
			</div>
		</form>

		<div class='popup_signup'>
			<div class="sign_up">
				<form class="sign_upp" method="GET" action="index.php"
					novalidate="novalidate">
					<span class="title_signup">Signup</span> <img src='img/x.png'
						alt='quit' class='x' id='close' /> <input type="text"
						placeholder="Username" id="username" name="username"> <input
						type="password" placeholder="Password" id="password"
						name="password"> <input type="password"
						placeholder="Confirm Password" id="confirm_password"
						name="confirm_password">
					<ul class="date">
						<li>
							<div class="title_date">Date(dd/mm/yyy)</div>
						</li>

						<li><select name="day"><?php
						for($i = 1; $i <= 31; $i ++) {
							if ($i < 10) {
								echo "<option value='0" . $i . "'>0" . $i . "</option>";
							} else
								echo "<option value='" . $i . "'>" . $i . "</option>";
						}
						?>
					 </select></li>
						<li><select name="month"><?php
						for($i = 1; $i <= 12; $i ++) {
							if ($i < 10) {
								echo "<option value='0" . $i . "'>0" . $i . "</option>";
							} else
								echo "<option value='" . $i . "'>" . $i . "</option>";
						}
						?>
					</select></li>
						<li><select name="year"><?php
						for($i = 2013; $i >= 1900; $i --) {
							echo "<option value=\"" . $i . "\">" . $i . "</option>";
						}
						?>
					</select></li>

					</ul>
					<ul class="country_selector">
						<li><div class="title_country">Country</div></li>
						<li><select name='country_code' class='country_code'>
								<option value='93'>Afghanistan</option>
								<option value='355'>Albania</option>
								<option value='213'>Algeria</option>
								<option value='684'>American Samoa</option>
								<option value='1684'>American Samoa-1</option>
								<option value='376'>Andorra</option>
								<option value='244'>Angola</option>
								<option value='1264'>Anguilla</option>
								<option value='1268'>Antigua and Barbuda</option>
								<option value='54'>Argentina</option>
								<option value='374'>Armenia</option>
								<option value='297'>Aruba</option>
								<option value='247'>Ascension Island</option>
								<option value='61'>Australia</option>
								<option value='672'>Australian Ext. Ter.</option>
								<option value='43'>Austria</option>
								<option value='994'>Azerbaijan</option>
								<option value='1242'>Bahamas</option>
								<option value='973'>Bahrain</option>
								<option value='880'>Bangladesh</option>
								<option value='1246'>Barbados</option>
								<option value='375'>Belarus</option>
								<option value='32'>Belgium</option>
								<option value='501'>Belize</option>
								<option value='229'>Benin</option>
								<option value='1441'>Bermuda</option>
								<option value='975'>Bhutan</option>
								<option value='591'>Bolivia</option>
								<option value='387'>Bosnia and Herzegovina</option>
								<option value='267'>Botswana</option>
								<option value='55'>Brazil</option>
								<option value='1284'>British Virgin Islands</option>
								<option value='673'>Brunei Darussalam</option>
								<option value='359'>Bulgaria</option>
								<option value='226'>Burkina Faso</option>
								<option value='257'>Burundi</option>
								<option value='855'>Cambodia</option>
								<option value='237'>Cameroon</option>
								<option value='238'>Cape Verde</option>
								<option value='1345'>Cayman Islands</option>
								<option value='236'>Central African Republic</option>
								<option value='235'>Chad</option>
								<option value='56'>Chile</option>
								<option value='86'>China</option>
								<option value='57'>Colombia</option>
								<option value='269'>Comoros</option>
								<option value='242'>Congo</option>
								<option value='243'>Congo</option>
								<option value='682'>Cook Islands</option>
								<option value='506'>Costa Rica</option>
								<option value='225'>Cote d'Ivoire</option>
								<option value='385'>Croatia</option>
								<option value='53'>Cuba</option>
								<option value='357'>Cyprus</option>
								<option value='420'>Czech Republic</option>
								<option value='45'>Denmark</option>
								<option value='246'>Diego Garcia</option>
								<option value='253'>Djibouti</option>
								<option value='1767'>Dominica</option>
								<option value='1809'>Dominican Republic</option>
								<option value='1829'>Dominican Republic</option>
								<option value='670'>East Timor</option>
								<option value='593'>Ecuador</option>
								<option value='20'>Egypt</option>
								<option value='503'>El Salvador</option>
								<option value='240'>Equatorial Guinea</option>
								<option value='291'>Eritrea</option>
								<option value='372'>Estonia</option>
								<option value='251'>Ethiopia</option>
								<option value='500'>Falkland Islands</option>
								<option value='298'>Faroe Islands</option>
								<option value='679'>Fiji</option>
								<option value='358'>Finland</option>
								<option value='33'>France</option>
								<option value='594'>French Guiana</option>
								<option value='689'>French Polynesia</option>
								<option value='241'>Gabon</option>
								<option value='220'>Gambia</option>
								<option value='995'>Georgia</option>
								<option value='49'>Germany</option>
								<option value='233'>Ghana</option>
								<option value='350'>Gibraltar</option>
								<option value='30'>Greece</option>
								<option value='299'>Greenland</option>
								<option value='1473'>Grenada</option>
								<option value='1784'>Grenadines</option>
								<option value='590'>Guadeloupe</option>
								<option value='1671'>Guam</option>
								<option value='502'>Guatemala</option>
								<option value='224'>Guinea</option>
								<option value='245'>Guinea-Bissau</option>
								<option value='592'>Guyana</option>
								<option value='509'>Haiti</option>
								<option value='504'>Honduras</option>
								<option value='852'>Hong Kong</option>
								<option value='36'>Hungary</option>
								<option value='354'>Iceland</option>
								<option value='91'>India</option>
								<option value='62'>Indonesia</option>
								<option value='98'>Iran</option>
								<option value='964'>Iraq</option>
								<option value='353'>Ireland</option>
								<option value='39'>Italy</option>
								<option value='1876'>Jamaica</option>
								<option value='81'>Japan</option>
								<option value='962'>Jordan</option>
								<option value='7'>Kazakhstan</option>
								<option value='254'>Kenya</option>
								<option value='686'>Kiribati</option>
								<option value='965'>Kuwait</option>
								<option value='996'>Kyrgyzstan</option>
								<option value='856'>Laos</option>
								<option value='371'>Latvia</option>
								<option value='961' selected>Lebanon</option>
								<option value='266'>Lesotho</option>
								<option value='231'>Liberia</option>
								<option value='218'>Libya</option>
								<option value='423'>Liechtenstein</option>
								<option value='370'>Lithuania</option>
								<option value='352'>Luxembourg</option>
								<option value='853'>Macau</option>
								<option value='389'>Macedonia</option>
								<option value='261'>Madagascar</option>
								<option value='265'>Malawi</option>
								<option value='60'>Malaysia</option>
								<option value='960'>Maldives</option>
								<option value='223'>Mali</option>
								<option value='356'>Malta</option>
								<option value='692'>Marshall Islands</option>
								<option value='596'>Martinique</option>
								<option value='222'>Mauritania</option>
								<option value='230'>Mauritius</option>
								<option value='269'>Mayotte</option>
								<option value='52'>Mexico</option>
								<option value='691'>Micronesia</option>
								<option value='373'>Moldova</option>
								<option value='377'>Monaco</option>
								<option value='976'>Mongolia</option>
								<option value='1664'>Montserrat</option>
								<option value='212'>Morocco</option>
								<option value='258'>Mozambique</option>
								<option value='95'>Myanmar</option>
								<option value='264'>Namibia</option>
								<option value='674'>Nauru</option>
								<option value='977'>Nepal</option>
								<option value='31'>Netherlands</option>
								<option value='599'>Netherlands Antilles</option>
								<option value='687'>New Caledonia</option>
								<option value='64'>New Zealand</option>
								<option value='505'>Nicaragua</option>
								<option value='227'>Niger</option>
								<option value='234'>Nigeria</option>
								<option value='683'>Niue</option>
								<option value='1670'>Northern Mariana Islands</option>
								<option value='850'>North Korea</option>
								<option value='47'>Norway</option>
								<option value='968'>Oman</option>
								<option value='92'>Pakistan</option>
								<option value='680'>Palau</option>
								<option value='507'>Panama</option>
								<option value='675'>Papua New Guinea</option>
								<option value='595'>Paraguay</option>
								<option value='51'>Peru</option>
								<option value='63'>Philippines</option>
								<option value='48'>Poland</option>
								<option value='351'>Portugal</option>
								<option value='1787'>Puerto Rico</option>
								<option value='1939'>Puerto Rico-1</option>
								<option value='974'>Qatar</option>
								<option value='82'>Republic of Korea</option>
								<option value='262'>Reunion</option>
								<option value='40'>Romania</option>
								<option value='7'>Russia</option>
								<option value='250'>Rwanda</option>
								<option value='685'>Samoa</option>
								<option value='378'>San Marino</option>
								<option value='239'>Sao Tome and Principe</option>
								<option value='966'>Saudi Arabia</option>
								<option value='221'>Senegal</option>
								<option value='248'>Seychelles</option>
								<option value='232'>Sierra Leone</option>
								<option value='65'>Singapore</option>
								<option value='421'>Slovakia</option>
								<option value='386'>Slovenia</option>
								<option value='677'>Solomon Islands</option>
								<option value='252'>Somalia</option>
								<option value='27'>South Africa</option>
								<option value='34'>Spain</option>
								<option value='94'>Sri Lanka</option>
								<option value='290'>St. Helena</option>
								<option value='1869'>St. Kitts and Nevis</option>
								<option value='1758'>St. Lucia</option>
								<option value='508'>St. Pierre and Miquelon</option>
								<option value='249'>Sudan</option>
								<option value='597'>Suriname</option>
								<option value='268'>Swaziland</option>
								<option value='46'>Sweden</option>
								<option value='41'>Switzerland</option>
								<option value='963'>Syria</option>
								<option value='886'>Taiwan</option>
								<option value='992'>Tajikistan</option>
								<option value='255'>Tanzania</option>
								<option value='66'>Thailand</option>
								<option value='228'>Togo</option>
								<option value='690'>Tokelau</option>
								<option value='676'>Tonga</option>
								<option value='1868'>Trinidad and Tobago</option>
								<option value='216'>Tunisia</option>
								<option value='90'>Turkey</option>
								<option value='993'>Turkmenistan</option>
								<option value='1649'>Turks &amp; Caicos Islands</option>
								<option value='688'>Tuvalu</option>
								<option value='256'>Uganda</option>
								<option value='380'>Ukraine</option>
								<option value='971'>United Arab Emirates</option>
								<option value='44'>United Kingdom</option>
								<option value='598'>Uruguay</option>
								<option value='1340'>US Virgin Islands</option>
								<option value='998'>Uzbekistan</option>
								<option value='678'>Vanuatu</option>
								<option value='379'>Vatican</option>
								<option value='58'>Venezuela</option>
								<option value='84'>Vietnam</option>
								<option value='681'>Wallis &amp; Futuna Islands</option>
								<option value='967'>Yemen</option>
								<option value='381'>Yugoslavia</option>
								<option value='260'>Zambia</option>
								<option value='263'>Zimbabwe</option>
						</select></li>
					</ul>
					<input type="text" placeholder="Phone Number" id="phone"
						name="phone"> <input name="email" type="text" placeholder="Email"
						id="email"> <input name="sign_up" type="submit" value="Sign Up">
				</form>
								<?php include("signup.php");?>
			</div>
		</div>
		<div id="core" class="clearfix">
			<div class="left">
				<section id="left">

					<div class="content_left">
						<!--  this is where the search results goes -->
						<?php include("search.php"); ?>
						<?php if($_SESSION['search_result']==0){?>
<div class="title_content_left">Suggested Music</div>
						<div class="music_sample"></div> <?php  }?>
					</div>
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