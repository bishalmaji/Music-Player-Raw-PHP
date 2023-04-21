<!-- This logout the user -->
<?php 
session_start();
unset($_SESSION['uid']);
header('Location: http://localhost/index.php');
exit;
