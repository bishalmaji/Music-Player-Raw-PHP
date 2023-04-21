<?php

include("/var/www/html/raw_php_music_player/src/dbClasses/UserDb.php");

class Login extends UserDb
{
  /**
   * @var array $data;
   * Stores user's from data.
   */
  private $data = [];

  /**
   * Initilize the user form data.
   */
  public function __construct(array $data)
  {
    $this->data = $data;
    parent::__construct();
  }

  /**
   * Login the user and send success and fail response to ajax accordingly.
   */
  public function loginUser()
  {
    if ($this->isUserExist($this->data['email']) && $this->isPasswordValid($this->data['email'], $this->data['password'])) {
      session_start();
      $_SESSION["uid"] = $this->data['email'];
      return json_encode(["status" => "success", "message" => "user exist"]);
    } else {
      return json_encode(["status" => "fail", "message" => "username or password not matched"]);
    }
  }
}
