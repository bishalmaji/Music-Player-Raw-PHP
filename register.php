<?php
include 'src/classes/Register.php';

if(isset( $_POST)) {
    $register_obj = new Register($_POST);
    $result = $register_obj->registerUser();
    echo $result;
   
}else{
    echo json_encode(["status" => "fail", "message" => "Register Failed"]);
}

?>