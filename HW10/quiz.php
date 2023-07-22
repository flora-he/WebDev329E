
<!DOCTYPE html>
<html lang="en">

<head>
   <title>Quiz</title>
   <meta charset="UTF-8">
   <meta name="description" content="Website that enables professor to have self-grading quiz">
   <meta name="author" content="Flora He">
<!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script>
		$(document).ready(function () {
			$('button').click(function() {
				checked = 
					$("input[type=checkbox]:checked").length;
				if(!checked) {
					alert("Please select one checkbox to submit.");
					return false;
				}

			});
		});
	</script> -->
</head> 

<body>
<?php
    $answer1 = $_POST['question-1-answer'];
    $answer2 = $_POST['question-2-answer'];
    $answer3 = $_POST['question-3-answer'];
    $answer4 = $_POST['question-4-answer'];
    $answer5 = trim($_POST['question-5-answer']);
    $answer6 = trim($_POST['question-6-answer']);
    $correct = 0;

 
    if (!empty($_POST)) {
      if ($answer1 == 'false') {
	      $correct++;    
      }
      if ($answer2 == 'true') {
	      $correct++;
      } 
      if ((count($answer3)==1) && ($answer3[0]=='CPU')) {
		$correct = $correct+1;
      }
      if ((count($answer4)==1) && ($answer4[0]=='network')) {
		$correct = $correct+1;
      }
	      /*
	      print <<<ALERT
		<script type="text/javascript">
		window.alert("Please check a box for questions 3 and 4")
		</script>
ALERT;
	       */
      
      if (strcasecmp($answer5,'HTTP')==0){
	      $correct++;
      } 
      if (strcasecmp($answer6, 'favicon') == 0){
	      $correct++;
	      }

      $grade = ($correct/6) * 100;

    if(isset($_POST["submit"])){

	    
	    if (empty($_POST['question-3-answer'])){
		 #   $q5Err = "Please select one";
		    echo "Please select one in question 3 to receive score<br>";
		}
	    if (empty($_POST['question-4-answer'])){
		  #  $q6Err = "Please select one";
			echo "Please select one in question 4 to receive score";
	    } else {
	    print <<<SCRIPT
<script type="text/javascript">
window.alert("Your grade is $correct/6!");
</script>
SCRIPT;
	    }
	}
    if ($correct == 0) {
        echo "You did not do well.";
      }
    }   
   

     
?>

    </script>
<h1> Quiz Time! </h1>
<form name="myForm" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>"> 
		<h3>True / False</h3>

		<b>1. </b><p style="display:inline">"URL" stands for "Universal Reference Link".</p>
		<label> True<input name = "question-1-answer" type = "radio" value = "true" required></label>
		<label> False<input name = "question-1-answer" type = "radio" value = "false"></label>
		<br>
		<br>

		<b>2. </b><p style="display:inline">An Apple Macbook is an example of a Linux system.</p>
		<label> True<input name = "question-2-answer" type = "radio" value = "true" required></label>
		<label> False<input name = "question-2-answer" type = "radio" value = "false"></label>
		<br>
		<br>

		<h3>Multiple Choice </h3>

		<div class="checkbox-group required">

		<b>3. </b><p style="display:inline">Which of these do NOT contribute to packet delay in a packet switching network?</p><br>
		<label>a) Processing delay at a router <input name="question-3-answer[]" type = "checkbox" value = "router"></label><br>
		<label>b) CPU workload on a client <input name="question-3-answer[]" type = "checkbox" value = "CPU"></label><br>
		<label>c) Transmission delay along a communications link <input name="question-3-answer[]" type = "checkbox" value = "link"></label><br>
		<label>d) Processing delay at a router <input name="question-3-answer[]" type = "checkbox" value = "propogation"></label><br>
		<span class="error">* <?php echo $q3Err;?></span>   
		</div>
		<br>
		
		<div class="checkbox-group required">
		<b>4. </b><p style="display:inline">This Internet layer is responsible for creating the packets that move across the network.</p><br>
		<label>a) Physical <input name="question-4-answer[]" type = "checkbox" value = "physical"></label><br>
		<label>b) Data Link <input name="question-4-answer[]" type = "checkbox" value = "link"></label><br>
		<label>c) Network <input name="question-4-answer[]" type = "checkbox" value = "network"></label><br>
		<label>d) Transport <input name="question-4-answer[]" type = "checkbox" value = "transport"></label><br>
		<span class="error">* <?php echo $q4Err;?></span>   
		</div>
		<h3>Fill in the Blank</h3>

		<b>5. </b><input name="question-5-answer" type="text" size="22" required><p style="display:inline" > is a networking protocol that
		runs over TCP/IP, and governs communication between web browsers and web servers.</p><br>
		
		<b>6. </b><p style="display:inline">A small icon displayed in a browser table that identifies a website is called a </p>
		<input style="display:inline" name="question-6-answer" type="text" size="22" required>
		<br><br>
		<input type="submit" name="submit" value="Grade">
		<input type="reset" name="clear" value="Clear"> 
<!--		<button type="button">Submit Quiz</button> -->
	</form>
<!--
<script language="JavaScript">
$(document).ready(function() {
	$('submit').click(function() {
		checked = $("input[type=checkbox]:checked").length;

		if(!checked){
			alert("Please select one checkbox to submit.");
			return false;
	}
	
}

</script>
-->	

</body>
</html>
