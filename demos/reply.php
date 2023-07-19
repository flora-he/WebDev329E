<?php
  # get the incoming information
  $name = $_POST["username"];
  $email = $_POST["email"];

  # open file 'info.txt' and append the name and e-mail address
  if ($fh = fopen ("info.txt", "a"))
  {
    fwrite ($fh, "$name  $email \n");
    fclose ($fh);
  }

  # Write thank you page
  print <<<REGISTRATION_RESULT
  <html>
  <head>
  <title> Registration Result </title>
  </head>
  <body>
  <h1> Thank You for Registering </h1>
  <h2> An e-mail confirmation will be sent to you. </h2>
  </body>
  </html>
REGISTRATION_RESULT;

?>
