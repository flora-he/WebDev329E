<?php
$server = "spring-2023.cs.utexas.edu";
$user = "cs329e_bulko_flora";
$pwd = "orgasm6Came6devise";
$dbName = "cs329e_bulko_flora";

$mysqli = new mysqli ($server, $user, $pwd,$dbName);

if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
} else {
  echo "";
}

$script = $_SERVER['PHP_SELF'];

print <<<FORM
<form method="POST" action="$script">
    <h3> Form to insert student record </h3>
    <label for="id">ID: </label><input name = "id" type = "text" required/><br><br>
    <label for="lastName">Last Name: </label><input name = "lastName" type = "text" required/><br><br>
    <label for="firstName">First Name: </label><input name = "firstName" type = "text" required/><br><br>
    <label for="major">Major: </label><input name = "major" type = "text" required/><br><br>
    <label for="GPA">GPA: </label><input name = "GPA" type = "text" required/><br><br>
    <input name="submit_insert" type=????????????
    
    
    "submit" value="Submit Student"/>
</form>
FORM;

$id = $_POST["id"];
$last = $_POST["lastName"];
$first = $_POST["firstName"];
$major = $_POST["major"];
$GPA = $_POST["GPA"];

$sql = "INSERT INTO students (id, lastName, firstName, major, GPA)
  VALUES ('".$id."', '".$last."', '".$first."', '".$major."',  '".$GPA."')";


// use exec() because no results are returned
if (mysqli_query($mysqli, $sql)) {
    echo "New record created successfully";
} 
mysqli_close($mysqli);
?>
