<!DOCTYPE html>

<html lang="en">

<head>
   <title>Online Signup Sheet</title>
   <meta charset="UTF-8">
   <meta name="description" content="PHP script that creates an online signup sheet">
   <meta name="author" content="Flora He">
</head> 

<body>


<?php
	
	$file = fopen ("signup.txt", "r");
	$script = $_SERVER['PHP_SELF'];
	
	if (isset($_POST["submit"])){
		
		if ($file) {
			$array = explode("\n", file_get_contents("signup.txt"));
			
		}
		for ($i=0; $i<10; $i++) {
			//if (!empty($_POST["signup".$i]){
		
				$signup = $_POST["signup".$i]; 
			if ($signup != "") {
				$replacement = array($i => $signup);
				$array = array_replace($array, $replacement);
				
				file_put_contents("signup.txt",join("\n", $array));
					} 
		}
	}
       	createTable($file);	
	function createTable($file) {
	
		echo <<<EOF
		<form method="post" action="$script">
		<table align = "center" width = "30%" border = "2">
		<caption style="margin-bottom:0.25cm;"><b>Sign-Up Sheet</b></caption>
		<tr><th style="width:130px"> Time </th><th> Name </th></tr>

EOF;
		$line = array();	
		$oclock = 8;
		$morning = "am";
		$count = 0;
		while (!feof ($file))
		{
			
			array_push($line, fgets($file));
			if ($line[$count]!="\n"){
				echo "	<tr><td> ".$oclock.":00 ".$morning." </td><td>".$line[$count]."</td></tr>\n";
			} 
			else {
				echo "	<tr><td> ".$oclock.":00 ".$morning." </td><td> <input name='signup".$count."' type='text' /> </td></tr><br>\n";
			}
			if ($oclock < 12){
				$oclock += 1;
				if (($oclock == 6) && ($morning == 'pm')) {
					echo "</table>";
					break;
				}
			}
			else if ($oclock > 12) {
				$oclock += 1;
				$morning = 'pm';
			} else {
				$oclock = 1;
				$morning = 'pm';

			}
			$count +=1;
		}
		echo <<<FORM
		<br>
		<center><input type = "submit" name = "submit" value = "Submit" /></center>
		</form>
FORM;

		exit;

	}

	fclose($file);

?>



</body>
</html>
