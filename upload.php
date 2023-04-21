<?php 
/**
 * This class Initiated by ajax function.
 * Make function call to update user profile.
 */
include 'src/classes/HomePage.php';


if(isset( $_POST)&& isset($_FILES)) {
  $home_obj = new HomePage();
  $response = $home_obj->uploadMusic();
  echo $response;
}else{
  echo json_encode(["status" => "fail", "message" => "Music Not uploaded"]);
}
 