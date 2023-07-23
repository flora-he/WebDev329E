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
    <h3> Form to delete student record </h3>
    <label for="id">ID: </label><input name = "id" type = "text" required/><br><br>
    <input name="submit_insert" type="submit" value="Submit Student"/>
</form>
FORM;

$id = $_POST['id'];
$sql = "DELETE FROM students WHERE id='".$id."'";

// use exec() because no results are returned
if (mysqli_query($mysqli, $sql)) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
}
mysqli_close($mysqli);
?>
