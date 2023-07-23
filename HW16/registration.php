<html>
	<head>
		<title>Registration</title>
	</head>
	<body>
		<script language = "javascript" type = "text/javascript">

		//Browser Support Code
		function ajaxFunction(){
			var ajaxRequest;  // The variable that makes Ajax possible!
			
			ajaxRequest = new XMLHttpRequest();
			
			// Create a function that will receive data sent from the server and will update
			// the div section in the same page.
					
			ajaxRequest.onreadystatechange = function(){
				if(ajaxRequest.readyState == 4){
					var ajaxDisplay = document.getElementById('ajaxDiv');
					ajaxDisplay.innerHTML = ajaxRequest.responseText;
				}
			}
			
			// Now get the value from user and pass it to server script.
					
			var username = document.getElementById('username').value;
			var password = document.getElementById('password').value;
			var queryString = "?username=" + username + "&password=" + password;
			
			ajaxRequest.open("GET", "ajax.php" + queryString, true);
			ajaxRequest.send(null);
		}

		</script>

<?php

$server = "spring-2023.cs.utexas.edu";
$user = "cs329e_bulko_flora";
$pwd = "orgasm6Came6devise";
$dbName = "cs329e_bulko_flora";

$mysqli = new mysqli ($server, $user, $pwd,$dbName);

/*
if(isset($_POST["login"])){
	$username = $_POST["username"];
	$password = $_POST["password"];
    
	//query to see if username exists in the database 
	$command = "SELECT * FROM passwords WHERE username = '".$username."'";
	
	// Issue the query
	$result = $mysqli->query($command);

	if (!$result) {
		die("Query failed: ($mysqli->error <br>");
	} else {
		echo "Query succeeded <br> <br>";
	}

	if ($row = $result->fetch_row()) {
		echo "username: $row[0] and password $row[1] <br> <br>";
	} else {
		//there should be AJAX in here
		echo "username not found. user will be added.";
	}

}
*/
?>
	<form method="POST" action="registration.php">
		<div>Username: <input type="text" id="username" name="username" autofocus> </div>
		<div>Password: <input type="password" id="password" name="password"><br> </div><br>
		<input type="button" onclick = "ajaxFunction()" value = "Login"/> 
		<input type="reset" name="reset" value="Reset">
	</form>
<div id = 'ajaxDiv'>Enter your username and password!</div>
</body>
</html>
