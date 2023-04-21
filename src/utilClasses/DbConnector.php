<?php
include('/var/www/html/raw_php_music_player/src/utilClasses/EnvLoader.php');
class DBConnector extends EnvLoader
{

  protected function connectDatabase()
  {
    $this->loadEnv();
    try {
      $conn = new PDO("mysql:host=$this->server_name;dbname=$this->database_name", $this->username, $this->password);
      // setting the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      if ($conn) {
        return $conn;
      }
    } catch (PDOException $e) {
      echo "Connection failed: " . $e->getMessage();
    }
  }
}
