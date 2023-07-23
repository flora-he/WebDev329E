

<?php
session_start();
 doDatabase();
 function doDatabase() {
    // store the parameters in variables
    $server = "spring-2023.cs.utexas.edu";
    $user = "cs329e_bulko_flora";
    $pwd = "orgasm6Came6devise";
    $dbName = "cs329e_bulko_flora";
    $mysqli = new mysqli ($server, $user, $pwd,$dbName);

    // If it returns a non-zero error number, print a message and stop execution immediately

	if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
  } else {
      echo "";
  }
    // page of actions
    print <<<ACTIONS
    <form>
    <a href="insert.php">
        <input name="insert" type="button" value="Insert Student Record"/>
    </a><br><br>
    <a href="update.php">
        <input name="update" type="button" value="Update Student Record"/>
    </a><br><br>
    <a href="delete.php">
        <input name="delete" type="button" value="Delete Student Record"/>
    </a><br><br>
    <a href="view.php">
        <input name="view" type="button" value="View Student Record"/>
    </a><br><br>
    <input name="logout" type="button" value="Logout" onclick="location.href='logout.php';" />
    </form>
ACTIONS;
 }


?>
