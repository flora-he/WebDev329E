<?php
$server = "spring-2023.cs.utexas.edu";
$user = "cs329e_bulko_flora";
$pwd = "orgasm6Came6devise";
$dbName = "cs329e_bulko_flora";

$mysqli = new mysqli ($server, $user, $pwd,$dbName);

if ($mysqli->connect_errno) {
    die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
} else {
  echo "Connection successful <br><br>";
}

$script = $_SERVER['PHP_SELF'];

print <<<FORM
<form method="POST" action="$script">
    <h3> Form to view student records </h3>
    <label for="id">ID: </label><input name = "id" type = "text"/><br><br>
    <label for="lastName">Last Name: </label><input name = "lastName" type = "text"/><br><br>
    <label for="firstName">First Name: </label><input name = "firstName" type = "text"/><br><br>
    <input name="submit_update" type="submit" value="Submit Student"/>
    <input name="all" type="submit" value="View All Student Records" onclick="allStudents()"/>
</form>
FORM;

if (isset($_POST['submit_update'])){
    if((empty($_POST['lastName'])) && (empty($_POST['firstName'])) && (empty($_POST['id']))) { 
        echo "Please input one of the following fields: ID, Last Name, First Name. <br>";  
    } 
    $sql = "SELECT * FROM students WHERE ";
    if (!empty($_POST['id'])){
        $id = $_POST["id"];
        $sql .= "id = $id";
        //echo $sql;
    } 
    if ((!empty($_POST['id'])) && ((!empty($_POST['firstName'])) || (!empty($_POST['lastName'])))){
        $sql .= " AND1 ";
    }
    if (!empty($_POST['lastName'])){
        $lastName = $_POST["lastName"];
        $sql .= "lastName = '".$lastName."'";
    } 
    if ((!empty($_POST['firstName'])) && ((!empty($_POST['id'])) || (!empty($_POST['lastName'])))){
        $sql .= " AND2 ";
    }
    if (!empty($_POST['firstName'])){
        $firstName = $_POST["firstName"];
        $sql .= "firstName = '".$firstName."'";
    }
    $sql .= ";";
    //echo $sql;
    //issue the query 
    $result = $mysqli -> query($sql);

    //echo "result: ";

    // Verify the result
	if (!$result) {
        die("Query failed: ($mysqli->error <br>");
    } else {
        echo "Query succeeded <br> <br>";
    }

    // if no students found 
    while ($row = $result->fetch_row()) {
        echo "Student Name: $row[2] $row[1]; ID: $row[0] <br> ";
    } 

}

if(isset($_POST['all'])) {
    $all = "SELECT * FROM students ORDER BY lastName, firstName";
    $result = $mysqli -> query($all);
    while ($row = $result->fetch_row()) {
        echo "Student Name: $row[2] $row[1]; ID: $row[0], Major: $row[3], GPA: $row[4] <br> ";
    } 
}

// use exec() because no results are returned
if (mysqli_query($mysqli, $sql)) {
    echo "Students found";
} 

mysqli_close($mysqli);


?>
