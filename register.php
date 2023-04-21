<!-- This class is called by ajax function.
Used to validtate the user first on server side
then register the user. -->
<?php

use App\Validator\UserValidator;

include 'src/classes/Register.php';
include 'src/utilClasses/UserValidator.php';
if (isset($_POST)) {

  //Contains element to be validated.
  $data = [
    'name' => $_POST['name'],
    'email' => $_POST['email'],
    'password', $_POST['password']
  ];

  #contains rules for each element.
  $rules = [
    'name' => ['required', 'minLen' => 4, 'maxLen' => 150, 'alpha'],
    'email' => ['required', 'maxLen' => 150, 'reg_email'],
    'password' => ['required', 'minLen' => 6, 'reg_password']
  ];

  // Validate the form data.
  $validatior = new UserValidator();
  $validatior->validate($data, $rules);
  $error_mgs = $validatior->error();

  // Exicute this block if contains any php validation error.
  if ($error_mgs != " ") {
    $result['status'] = 'error';
    $result['message'] = $error_mgs;
  } else {
    $register_obj = new Register($_POST);
    $result = $register_obj->registerUser();
  }
  echo $result;
} else {
  echo json_encode(["status" => "fail", "message" => "Register Failed"]);
}

?>