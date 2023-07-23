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
    <h3> Form to update student record </h3>
    <label for="id">ID: </label><input name = "id" type = "text" required/><br><br>
    <label for="lastName">Last Name: </label><input name = "lastName" type = "text"/><br><br>
    <label for="firstName">First Name: </label><input name = "firstName" type = "text"/><br><br>
    <label for="major">Major: </label><input name = "major" type = "text"/><br><br>
    <label for="GPA">GPA: </label><input name = "GPA" type = "text"/><br><br>
    <input name="submit_update" type="submit" value="Submit Student"/>
</form>
FORM;

if (isset($_POST['submit_update'])){
    if((empty($_POST['lastName'])) && (empty($_POST['firstName'])) && (empty($_POST['major'])) && (empty($_POST['GPA']))) {
        echo "Please input one of the following fields: Last Name, First Name, major, or GPA.";
    } else {
        $id = $_POST["id"];

        //create the query as a string
        $command = "SELECT * FROM students WHERE
            id = \"$id\"";

        //issue the query
        $result = $mysqli->query($command);

        //Verify the result
        if (!$result) {
            die("Could not find this student: ($mysqli->error <br> SQL command
            = $command");
        } 

        $row = $result->fetch_row();
        
    }
    
    if (!empty($_POST['lastName'])){
        $row[1] = $_POST["lastName"];
    } 
    if (!empty($_POST['firstName'])){
        $row[2] = $_POST["firstName"];
    }
    if (!empty($_POST['major'])){
        $row[3] = $_POST["major"];
    }
    if (!empty($_POST['GPA'])){
        $row[4] = $_POST["GPA"];
    }
    
    $lastName = $row[1];
    $firstName = $row[2];
    $major = $row[3];
    $GPA = $row[4];
        
}

$sql = "UPDATE students 
SET 
lastName='".$lastName."', 
firstName='".$firstName."',
major='".$major."',
GPA= '".$GPA."'
WHERE id = '".$id."'";

// use exec() because no results are returned
if (mysqli_query($mysqli, $sql)) {
    echo "Record updated";
} 

mysqli_close($mysqli);
?>
