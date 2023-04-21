<?php
require '/var/www/html/raw_php_music_player/vendor/autoload.php';
class EnvLoader
{

  protected $server_name;
  protected $username;
  protected $database_name;
  protected $password;
  protected $env;

  protected function loadEnv()
  {
    $this->env = parse_ini_file("/var/www/html/raw_php_music_player/.env");
    $this->server_name = $this->env["SERVERNAME"];
    $this->database_name = $this->env["DB_NAME"];
    $this->username = $this->env["USERNAME"];
    $this->password = $this->env["PASSWORD"];
  }
}
