
<?php

// redirect newpaper to monday tuesday etc, but then on each of these pages before it loads direct it to login page
// If the request is POST, verify the submitted username / password
if ($_SERVER["REQUEST_METHOD"] == "POST") {
echo "hi";
	// Get values submitted from the login form
	$username = $_POST["username"];
	$password = $_POST["password"];
	$file = fopen("passwd.txt", "r");
	$array = array();
	while (!feof($file)) {
		$line_of_text=fgets($file);
		list($k, $v) = explode(':', $line_of_text);
		$array[$k] = $v;
	}

	var_dump($array);
	if (in_array($username, $array)) {

		// create a session variable "username" that contains
		// the value of $username.
		//$_SESSION["username"] = $username;
		
		// use the function header() to redirect us to the
		// desired page.  header() adds a header to the HTTP
		// response with a "Location: url" argument to
		// initiate the redirect.
		//setcookie("username", $username, time()+120, "/");
		echo "here";
		//setcookie("password", $password, time()+120, "/");
		//setcookie("remember", $remember, time()+120, "/");
		header("Location: monday.php");
		die;
	}
	else {
		$file_write = fopen("passwd.txt", "a");
		
		fwrite ($file_write, "$username".":"."$password\n");
		fclose ($file_write);

		setcookie("password", $password, time()+120, "/");
		setcookie("remember", $remember, time()+120, "/");
		header("Location: monday.php");
		die;
	}
}

?>

<!-- If the request was a GET, present the login screen instead -->

<form method="post" action="login.php">

	<div>Username: <input type="text" name="username" autofocus> </div>
	<div>Password: <input type="password" name="password"> </div>
	<input type="submit" name="submit" value="Login">
</form>
</html>
