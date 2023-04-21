<?php
include 'src/classes/Login.php';

if(isset( $_POST)) {
    $login_obj = new Login($_POST);
    $result = $login_obj->loginUser();
    echo $result;
}else{
    echo json_encode(["status" => "fail", "message" => "Login not success"]);
 
}

?>