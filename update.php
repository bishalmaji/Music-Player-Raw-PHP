<?php
/**
 * This class Initiated by ajax function.
 * Make function call to update user profile.
 */
include 'src/classes/HomePage.php';

if(isset( $_POST)) {
    $home_obj = new HomePage();
    $result = $home_obj->updateProfile($_POST);
    echo $result;
}else{
    echo json_encode(["status" => "fail", "message" => "Profile Not updated"]);
}

?>