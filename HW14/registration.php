<html>
<head>
<title>a</title>
</head>
<body>
<form method="POST" action="registration.php">
			<div>Username: <input type="text" name="username" autofocus> </div>
			<div>Password: <input type="password" name="password"> </div>
			<input type="submit" name="login" value="Create an account">
</form>
</body>
</html>
<?php
if(isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
	$file = fopen("passwd.txt", "r");
	$array = array();
	while (!feof($file)) {
		$line_of_text=fgets($file);
		list($k, $v) = explode(':', $line_of_text);
		$array[$k] = $v;	
	}
    fclose($file);
    if(array_key_exists($username, $array)){
        echo "This username's already taken."."<br>";
    }else{
        $fp = fopen("passwd.txt", "a");
        $line = $username . ":" . $password . "\n";
        fwrite($fp, $line);
        echo "You created a new account."."<br>";
    }
}
?>
