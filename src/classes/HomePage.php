<?php

include("/var/www/html/raw_php_music_player/src/dbClasses/HomeDb.php");

class HomePage extends HomeDb
{

  /**
   * Called constructor of parent class.
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * This function returns a list of music availbale in db.
   * @return array
   */
  public function getMusicList()
  {
    return  $this->fetchMusic();
  }


  /**
   * 
   * This function is used to update user profile
   * 
   * @param array $data
   * Contains user form data to be updated.
   * 
   */
  public function updateProfile(array $data)
  {
    if ($this->isUpdateDone($data)) {
      return json_encode(["status" => "success", "message" => "Music Uploaded "]);
    } else {
      return json_encode(["status" => "fail", "message" => "Music not Uploaded "]);
    }
  }

  /**
   * This function is used to upload music to server.
   * 
   * @param array $data
   * Contains music form data to upload.
   */
  public function uploadMusic()
  {
    if ($this->isUploadDone()) {
      return json_encode(["status" => "success", "message" => "Music Uploaded"]);
    } else {
      return json_encode(["status" => "fail", "message" => "Music Not uploaded"]);
    }
  }

  /**
   * This function is used to upload music to server.
   * 
   * @param array $data
   * Contains music form data to upload.
   */
  public function addToFavourite()
  {
    if ($this->isAddedToFav()) {
      return json_encode(["status" => "success", "message" => "Favourite added"]);
    } else {
      return json_encode(["status" => "fail", "message" => "Favourite not added"]);
    }
  }

  /**
   * This function returns a list of favourite music availbale in db.
   * @return array
   */
  public function getFavourites()
  {
    return  $this->fetchFavourites();
  }
}
