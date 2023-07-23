<?php

	if(!isset($_COOKIE['username'])){

		header("location:login.php");
		// should be set in login page		
		setcookie("username", $username, time()+120, "/");
		setcookie("password", $password, time()+120, "/");
		exit();
	}
	else {
		$monday= <<<MONDAY
<h1 align="center"> Monday </h1>
<p> On Monday, I had a lot of meetings. I met with Dorothy and Melissa</p>
MONDAY;
		echo $monday;
		}
	 
 

 
?>
	<html lang="en">
		<head>
		</head>
		<body>
		<h1 align="center"> Monday </h1>
		<p> On Monday, I had a lot of meetings. I met with Dorothy and Melissa</p>
		</body>
		</html>
