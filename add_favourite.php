<?php
/**
 * This class Initiated by ajax function.
 * Make function call to add to favourite list.
 */
include 'src/classes/HomePage.php';

if(isset( $_POST)) {
    $home_obj = new HomePage();
    $result = $home_obj->addToFavourite();
    echo $result;
}else{
    echo json_encode(["status" => "fail", "message" => "Favourite add fail"]);
}

?>