<?php

    $server = "spring-2023.cs.utexas.edu";
    $user = "cs329e_bulko_flora";
    $pwd = "orgasm6Came6devise";
    $dbName = "cs329e_bulko_flora";

    $mysqli = new mysqli ($server, $user, $pwd,$dbName);

   error_reporting(E_ALL);
   ini_set("display_errors", "on");
   
   

   // print just to confirm they got passed correctly

   
   // Connect to MySQL Server


   if ($mysqli->connect_errno) {
      die('Connect Error: ' . $mysqli->connect_errno . ": " .  $mysqli->connect_error);
   } else {
      echo "";
   }
  
   //Select Database
   $mysqli->select_db($dbName) or die($mysqli->error);
   
   // Retrieve data from Query String
   $username = $_GET["username"];
   $password   = $_GET["password"];
   //echo "Username: <code>".$username."</code><br>";
   //echo "Password: <code>".$password."</code><br>";

   // decode the urlencoded password
   $password    = urldecode($password);
   
   // Escape User Input to help prevent SQL Injection
   $username = $mysqli->real_escape_string($username);
   $username = $mysqli->real_escape_string($username);

   //build query
   //echo "<code>...Building query</code><br>";
   //query to see if username exists in the database 
	$command = "SELECT * FROM passwords WHERE username = '".$username."'";
	
	// Issue the query
	$result = $mysqli->query($command);

	if (!$result) {
		die("Query failed: ($mysqli->error <br>");
	} else {
		echo "";
	}
    $row = $result->fetch_row();
    if (mysqli_num_rows($result)!=0) {
        if ($password == $row[1]){
            echo "Username and password confirmed";
        } else if ($password != $row[1]){
            echo "Password is different and will be changed to new one.<br>";
            $command_update = "UPDATE passwords 
                    SET 
                    pwd= '".$password."'
                    WHERE username = '".$username."'";
            if (mysqli_query($mysqli, $command_update)) {
                echo "Password changed";
            } 
        }
    } else {
        echo "User doesn't exist and will be added<br>";
        $command_insert = "INSERT INTO passwords (username, pwd)
        VALUES ('".$username."', '".$password."')";
        if (mysqli_query($mysqli, $command_insert)) {
            echo "New user registered";
        } 
    }

    /*
	if (($row[0]==$username) && ($row[1]==$password)){
		echo "username: $row[0] and password $row[1] <br> <br>";
        echo "User and password confirmed";
    } else if (($row[0]==$username) && ($row[1]!=$password)) {
        echo "password will be changed. $password";
        $command_update = "UPDATE students 
                SET 
                pwd='".$password."'
                WHERE username = '".$username."'";
        if (mysqli_query($mysqli, $command_update)) {
            echo "Password was changed.";
        } 
	} else {
		//code to insert username and password into database
		$command_insert = "INSERT INTO passwords (username, pwd)
        VALUES ('".$username."', '".$password."')";

        if (mysqli_query($mysqli, $command_insert)) {
            echo "Username and password added.";
        } 
        
	}
    */
    mysqli_close($mysqli);

?>
