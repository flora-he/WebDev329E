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
					
			var name = document.getElementById('name').value;
			var item = document.getElementById('item').value;
			var queryString = "?name=" + name + "&item=" + item;
			
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



?>

        <form method="POST" action="potluck1.php">
		<div>Name: <input type="text" id="name" name="name" required> </div>
		<div>Item: <input type="text" id="item" name="item" required><br> </div><br>
		<input type="button" onclick = "ajaxFunction()" value = "Add"/> 
	</form>
<div id = 'ajaxDiv'>Enter your name and item!</div>


</body>
</html>
