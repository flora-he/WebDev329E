<!DOCTYPE html>

<html lang="en">

<head>
   <title>Buttons Demo</title>
   <meta charset="UTF-8">
   <meta name="description" content="Demo of clicking buttons in PHP">
   <meta name="author" content="Flora He">
</head> 

<body style="text-align:center">
	<h1 style = "color:green">
		Pick it and click it
	</h1>
	<h4> and a PHP funcion will be called </h4>
		<!--when the button is clicked if there is a value for 
		button1, then echo "Button 1 was selected" to the screen.
		Need method="post" in the form -->
<?php
$arr = array();
array_push($arr, "snickers", "hummus", "serena", "vi");
echo $arr[0];
			if(isset($_POST['button1'])) {
				echo "Button 1 was selected";
			}
			if(isset($_POST['button2'])) {
				echo "Button 2 was selected";
			}
		?>
	<form method="post">
		<input type="submit" name="button1" value="Button 1">
		<input type="submit" name="button2" value="Button 2">
	</form>
	

<!-- BODY GOES HERE -->

</body>
</html>
