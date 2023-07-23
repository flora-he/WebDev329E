<?php
session_start();
// check if there is a cookie, if there is not, get thrown into the login.
// if there's no cookie, do login. Else quiz: login cookie
print <<<TOP
<html>
	<head> 
		<title> Quiz </title>
	</head>
	<h3> Quiz Time </h3>
TOP;

if (!isset($_COOKIE["loggedIn"])) {
	doLogin();
} else {
	doQuiz();
}
 
function doQuiz() {
	
	  $question1= <<<QUIZ1
		<b>1. </b><p style="display:inline">"URL" stands for "Universal Reference Link".</p>
		<label> True<input name = "question-1-answer" type = "radio" value = "true" required></label>
		<label> False<input name = "question-1-answer" type = "radio" value = "false"></label>
		<input type="submit" name="submit1" value="New Question"> 
QUIZ1;
	  $question2= <<<QUIZ2
<b>2. </b><p style="display:inline">An Apple Macbook is an example of a Linux system.</p>
		<label> True<input name = "question-2-answer" type = "radio" value = "true" required></label>
		<label> False<input name = "question-2-answer" type = "radio" value = "false"></label>
		<input type="submit" name="submit2" value="New Question"> 
QUIZ2;
	  
	  $question3 = <<<QUIZ3
		<b>3. </b><p style="display:inline">Which of these do NOT contribute to packet delay in a packet switching network?</p><br>
		<label>a) Processing delay at a router <input name="question-3-answer[]" type = "checkbox" value = "router"></label><br>
		<label>b) CPU workload on a client <input name="question-3-answer[]" type = "checkbox" value = "CPU"></label><br>
		<label>c) Transmission delay along a communications link <input name="question-3-answer[]" type = "checkbox" value = "link"></label><br>
		<label>d) Processing delay at a router <input name="question-3-answer[]" type = "checkbox" value = "propogation"></label><br>
		<input type="submit" name="submit3" value="New Question"> 
QUIZ3;
	  $question4 = <<<QUIZ4
<b>4. </b><p style="display:inline">This Internet layer is responsible for creating the packets that move across the network.</p><br>
		<label>a) Physical <input name="question-4-answer[]" type = "checkbox" value = "physical"></label><br>
		<label>b) Data Link <input name="question-4-answer[]" type = "checkbox" value = "link"></label><br>
		<label>c) Network <input name="question-4-answer[]" type = "checkbox" value = "network"></label><br>
		<label>d) Transport <input name="question-4-answer[]" type = "checkbox" value = "transport"></label><br>
		<span class="error">* </span>   
		<input type="submit" name="submit4" value="New Question"> 
		</div>
QUIZ4;
	  $question5 = <<<QUIZ5
<b>5. </b><input name="question-5-answer" type="text" size="22" required><p style="display:inline" > is a networking protocol that
		runs over TCP/IP, and governs communication between web browsers and web servers.</p><br>
		<input type="submit" name="submit5" value="New Question"> 
QUIZ5;
	  $question6 = <<<QUIZ6
<b>6. </b><p style="display:inline">A small icon displayed in a browser table that identifies a website is called a </p>
		<input style="display:inline" name="question-6-answer" type="text" size="22" required>
		<input type="submit" name="submit6" value="New Question"> 
QUIZ6;
	  $questions = array($question1, $question2, $question3, $question4, $question5, $question6);
	
# Go to the first quiz problem
	if (!isset($_SESSION["number"]))
	{
	  $_SESSION["username"] = $username;
	  $_SESSION["number"] = 1;
	  $_SESSION["correct"] = 0;
	}

	$total_number = 6;
	$username = $_POST["username"];

	$number = $_SESSION["number"];
	$correct = $_SESSION["correct"];
	if ($number == 1)
	{
	  print <<<FIRST
	  <p> You will be given $total_number questions in this quiz. <br /><br/>
	  </p>
FIRST;
	}
	if (($number >= 0) && ($number <= $total_number)) {
		  if ($number==2) {
			if(isset($_POST["submit1"])) {
				if(isset($_POST["question-1-answer"]) && ($_POST["question-1-answer"] == "false")) {
					$correct++;
					$_SESSION["correct"] = $correct;
					
				}
			}
		  }
		  if ($number==3) {
			if(isset($_POST["submit2"])) {
				if(isset($_POST["question-2-answer"]) && ($_POST["question-2-answer"] == "true")) {
					$correct++;
					$_SESSION["correct"] = $correct;
					
			  }
		  }
		}
		if ($number==4) {
			if(isset($_POST["submit3"])) {
				if(isset($_POST["question-3-answer"]) && ($_POST["question-3-answer"][0] == "CPU")) {
					$correct++;
					$_SESSION["correct"] = $correct;
			  }
		  }
		}
		if ($number==5) {
			if(isset($_POST["submit4"])) {
				if(isset($_POST["question-4-answer"]) && ($_POST["question-4-answer"][0] == "network")) {
					$correct++;
					$_SESSION["correct"] = $correct;
			  }
		  }
		}
		if ($number==6) {
			if(isset($_POST["submit5"])) {
				if(isset($_POST["question-5-answer"]) && ($_POST["question-5-answer"] == "HTTP")) {
					$correct++;
					$_SESSION["correct"] = $correct;
			  }
		  }
		}
	
			$_COOKIE["correct"] = $correct;
			setcookie("correct", $correct, time()+900, "/");
			$file = fopen ("results.txt", "r");
			$array = array();
			$i = 0;
			$username = $_COOKIE["loggedIn"];	
			while (!feof($file)) {
				$line_of_text=fgets($file);
				if (strlen($line_of_text) > 2) {
					list($k, $v) = explode(':', $line_of_text);
					$array[$i] = $k.":".$v;
					$username = $_COOKIE["loggedIn"];	
				
				if ($k == $username){
					$array[$i] = $k.":".$correct;
				
				}
				
				$i++;
				}
			}

			fclose("results.txt");
			if ($number == 1) {
				$array[$i] = $username.":".$_COOKIE["correct"];
				
			}
				
			
			file_put_contents("results.txt",join("\n", $array));
	}
	if ($number > $total_number)
	{
		if(isset($_POST["submit6"])) {
			if(isset($_POST["question-6-answer"]) && ($_POST["question-6-answer"] == "favicon")) {
				$correct++;
				$_SESSION["correct"] = $correct;
		  }
	  }

		  print <<<FINAL_SCORE
		  Your final score is: $correct correct out of $total_number. <br /><br />
		  Thank you for playing. <br /><br />
FINAL_SCORE;
		  session_destroy();
		  setcookie("loggedIn", $username, time()-900, "/");
	} else {
		$question1 = $questions[$number-1];
		$number++;
		$_SESSION["number"] = $number;
		$_COOKIE["number"] = $number;
		setcookie("number",$number, time()+900,"/");
	
		$script = $_SERVER['PHP_SELF'];
		print <<<FORM
		<form method = "POST" action = $script>
		$question1
		</form>
FORM;
	  
	}
}
function doLogin(){
// If the request was a GET, present the login screen instead -->
//	if (!isset($_POST["login"])){	
	
if ($_SERVER["REQUEST_METHOD"] != "POST") {
	print <<<BOTTOM
		<form method="POST" action="quiz.php">
			<div>Username: <input type="text" name="username" autofocus> </div>
			<div>Password: <input type="password" name="password"> </div>
			<input type="submit" name="login" value="Login">
		</form>
		</html>
BOTTOM;
}

	//set cookie after they login
// Get values submitted from the login form
else {
	$username = $_POST["username"];
	$password = $_POST["password"];
	$file = fopen("passwd.txt", "r");
	$array = array();
	while (!feof($file)) {
		$line_of_text=fgets($file);
		list($k, $v) = explode(':', $line_of_text);
		$array[$k] = $v;
		
	}
	// if the user exists, check if the password matches
	
	if (array_key_exists($username, $array)) {
		echo "<p>This username is taken.</p>";
		print <<<BOTTOM
		<form method="POST" action="quiz.php">
			<div>Username: <input type="text" name="username" autofocus> </div>
			<div>Password: <input type="password" name="password"> </div>
			<input type="submit" name="login" value="Create Account">
		</form>
		</html>
BOTTOM;
		die();
		}

	else {
		$file_write = fopen("passwd.txt", "a");
		fwrite ($file_write, "$username".":"."$password\n");
		fclose ($file_write);
		setcookie("loggedIn", $username, time()+900, "/");
		$_COOKIE["loggedIn"] = $username;
		
		setcookie("time", "", time()+900, "/");
		setcookie("correct", 0, time()+900, "/");
		setcookie("number", 1, time() + 900, "/");
		header("Location:quiz.php");
	}		

}
}
?>
<!--
you have 4 cookies, one for login to see if the user has logged in before. One persistent cookie to see if time has not passed 15 minutes. One cookie to keep track of the score and how many you have gotten correct. One cookie to keep track of what number you are on. You have to check all of these cookies everytime you go to a new question. 
-->
