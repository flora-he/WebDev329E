<!DOCTYPE html>
<html lang="en">

<head>
   <title>Quiz</title>
   <meta charset="UTF-8">
   <meta name="description" content="Website that enables professor to have self-grading quiz">
   <meta name="author" content="Flora He">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	</head>

<body>
<h1> Quiz Time! </h1>

<?php
	
#get incoming information
$answer1 = $_POST['question-1-answer'];
$answer2 = $_POST['question-2-answer'];
$answer3 = $_POST['question-3-answer'];
$answer4 = $_POST['question-4-answer'];
$answer5 = $_POST['question-5-answer'];
$answer6 = $_POST['question-6-answer'];

$totalCorrect=0;

echo $answer1;

if ($answer1 == 'true') {$totalCorrect++;}

?>
