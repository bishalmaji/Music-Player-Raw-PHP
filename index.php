<?php
session_start();
//Navigate user to homepage if the user is already logged in.
if ($_SESSION['uid']) {
  header('Location: http://localhost/src/views/home_page.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Welcome Page</title>
</head>

<body>
  <a href="http://localhost/src/views/login_page.php">Login</a>
  <a href="http://localhost/src/views/register_page.php">Register</a>

</body>

</html>