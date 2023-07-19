<!DOCTYPE html>
<html>
	<head>
		<title> Login Page </title>
	</head>

<?php

// If the request is POST, verify the submitted username / password

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	session_start();

	// Get values submitted from the login form
	$username = $_POST["username"];
	$password = $_POST["password"];

	if ($username == "potluck" && $password == "feedMeN0w") {

		// create a session variable "username" that contains
		// the value of $username.
		$_SESSION["username"] = $username;

		// use the function header() to redirect us to the
		// desired page.  header() adds a header to the HTTP
		// response with a "Location: url" argument to
		// initiate the redirect.
		header("Location: potluck1.php");
		die;
	}
	else {
		echo "<p>Incorrect username or password.</p>";
	}
}

?>


<!-- If the request was a GET, present the login screen instead -->

<form method="post" action="login.php">

	<div>Username: <input type="text" name="username" autofocus> </div>
	<div>Password: <input type="password" name="password"> </div>
	<input type="submit" value="Login">
</form>
</html>
	
