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
//Select Database
$mysqli->select_db($dbName) or die($mysqli->error);

$name = $_GET["name"];
$item = $_GET["item"];

// Escape User Input to help prevent SQL Injection
$name = $mysqli->real_escape_string($name);
$item = $mysqli->real_escape_string($item);

$sql = "INSERT INTO dinner (name, item) VALUES ('".$name."', '".$item."')";
if (mysqli_query($mysqli, $sql)) {
    echo "New record created successfully";
} 

echo <<<EOF
    <form method="post" action="$script">
    <table align = "center" width = "30%" border = "2">
    <caption style="margin-bottom:0.25cm;"><b>Dinner Sign-up</b></caption>
    <tr><th style="width:130px"> Name </th><th> Item </th></tr>

EOF;

// to view 
$all = "SELECT * FROM dinner";
if (mysqli_query($mysqli, $all)) {
    $result = mysqli_query($mysqli, $all);
    while ($row = $result->fetch_row()) {

        echo "<tr>
                <th>$row[0]</th>
                <th>$row[1]</th>
            </tr>";
    } 
} 

echo <<<EOT
        <br>
        <center><input type = "submit" name = "submit" value = "Submit" /></center>
        </form>
EOT;

// use exec() because no results are returned


mysqli_close($mysqli);


?>

