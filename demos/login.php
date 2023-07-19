<!DOCTYPE html>
<html>
	<head>
		<title> Login demo </title>
	</head>
<?php

// if the request is a POST, verify the submitted username and password
if ($_SERVER["REQUEST_METHOD"]=="POST") {
	session_start();

	// Get values submitted from the login form
	$username = $_POST["username"];
	$password = $_POST["password"];

	if ($username == "beyonce" && $password == "lemonade") {
		//create a session variable "username" that contains 
		//the value of $username
		$_SESSION["username"] = $username;

		//use the function header() to redirect us to the desired page. 
		//header() adds a header to the HTTP response with a "Location: url"
		//argument to initiage the redirect.
		header("Location: login_success.html");
		die;
	}
	else {
		echo "<p>Incorrect username or password.</p>";
	}
}


?>


<!-- if the request was a GET, just present the login screen instead -->
<!-- if you just type in the URL, this is what you're gonna get -->
<form method="post" action="login.php">

	<div> Username: <input type="text" name="username" autofocus></div>
	<div> Password: <input type="password" name="password"> </div>
	<input type="submit" value="Login">
</form>
