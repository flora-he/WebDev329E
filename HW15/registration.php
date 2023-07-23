<html>
	<head>
		<title>Registration</title>
	</head>

<?php
if(isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$file = fopen("passwd.txt", "r");
	$array = array();
	while (!feof($file)) {
		$line_of_text=fgets($file);
		list($k, $v) = explode(':', $line_of_text);
		$array[$k] = trim($v);	
	}
    fclose($file);
    if(array_key_exists($username, $array)){
        // if it matches the password 
		if ($password == $array[$username]) {
			header("Location: database.php");
		} else if ($password != $array[$username]) {
			echo "Incorrect password";
		}
    } else {
        echo "You are not authorized.";
    }
}
?>


<body>
<form method="POST" action="registration.php">
			<div>Username: <input type="text" name="username" autofocus> </div>
			<div>Password: <input type="password" name="password"> </div>
			<input type="submit" name="login" value="Login">
</form>
</body>
</html>
