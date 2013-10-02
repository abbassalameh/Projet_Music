<?php
if (isset ( $_GET ['username'] ) && isset ( $_GET ['password'] ) && isset ( $_GET ['phone'] ) && isset ( $_GET ['email'] )) {
	$username = $_GET ['username'];
	$password = md5 ( $_GET ['password'] );
	$date = $_GET ['year'] . "-" . $_GET ['month'] . "-" . $_GET ['day'];
	$country = $_GET ['country_code'];
	$phone = $_GET ['phone'];
	$email = $_GET ['email'];
	$exists = 0;
	if (! empty ( $username ) && ! empty ( $password ) && ! empty ( $date ) && ! empty ( $phone ) && ! empty ( $email )) {
	$check_user="SELECT * FROM users WHERE username = '$username' OR email = '$email'";
	$user_checking = mysql_query ( $check_user );
	$nb_results=mysql_num_rows($user_checking);
	if($nb_results>0)echo "<script> alert('User/email already in use , change your username/email please');</script>";
	else {$insert_query = "INSERT INTO users(id,username,password,date,country,phone,email) VALUES ('' ,'" . $username . "','" . $password . "','" . $date . "','" . $country . "','" . $phone . "','" . $email . "')";
			mysql_query ( $insert_query );
			$_SESSION['signup_done']=1;}}}
?>