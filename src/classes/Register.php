<?php

include("/var/www/html/raw_php_music_player/src/dbClasses/UserDb.php");

class Register extends UserDb
{
  /**
   * @var array $data;
   * Stores user's from data.
   */
  protected $data = [];

  /**
   * Initilize the data and also call the consturctor of
   * parent class.
   */
  public function __construct(array $data)
  {
    $this->data = $data;
    parent::__construct();
  }

  /**
   * Register the user and send success and fail response to ajax accordingly.
   */
  public function registerUser()
  {
    if (!$this->getUserByEmail($this->data['email'])) {
      if ($this->insertUser($this->data)) {
        return json_encode(["status" => "success", "message" => "User Registred"]);
      } else {
        return json_encode(["status" => "fail", "message" => "User not Registred"]);
      }
    } else {
      return json_encode(["status" => "fail", "message" => "User Already exist"]);
    }
  }
}
