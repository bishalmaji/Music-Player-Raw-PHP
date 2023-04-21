<?php
include("/var/www/html/raw_php_music_player/src/utilClasses/DbConnector.php");

/**
 * Manage all the user related database operation.
 */
class UserDb extends DBConnector
{

  /**
   * Instance of pod object from DBConnector class.
   * @var $connection
   */
  protected $connection;

  /**
   * Initilize the pod connection 
   */
  public function __construct()
  {
    $this->connection = $this->connectDatabase();
  }

  /**
   * This function insert user data in sql user_table and set the session
   * 
   * @param array $data.
   * Contains user form data.
   * 
   * @return boolean
   * Returns ture on successful insertion.
   */
  protected function insertUser(array $data)
  {
    /* Step 1: prepare */
    $sql = "INSERT INTO user_table(name, email,contact,interest,password) VALUES (?, ?, ?, ?, ?)";
    $query = $this->connection->prepare($sql);

    $param_name = $data['name'];
    $param_email = $data['email'];
    $param_password = $data['password'];
    $param_contact = $data['contact'];
    $param_intrest = $data['interest'];

    /* Step 2: bind the data */
    $query->bindParam(1, $param_name, PDO::PARAM_STR);
    $query->bindParam(2, $param_email, PDO::PARAM_STR);
    $query->bindParam(3, $param_contact, PDO::PARAM_STR);
    $query->bindParam(4, $param_intrest, PDO::PARAM_STR);
    $query->bindParam(5, $param_password, PDO::PARAM_STR);

    /* Step 3: execute */
    if ($query->execute()) {
      session_start();
      $_SESSION["uid"] = $data['email'];
      return true;
    } else {
      return false;
    }
  }

  /**
   * Fetches all the user data have same email in db.
   * 
   * @return array
   * Return full row of user data in sql table.
   */
  public function getUserByEmail($email)
  {
    $sql_query = "SELECT * FROM user_table WHERE email =:mail";
    $stmt = $this->connection->prepare($sql_query);
    $stmt->execute(['mail' => $email]);
    return $stmt->fetchAll();
  }

  /**
   * Checks if user exist in db or not.
   * 
   * @param mixed $email
   * Mail id to check for.
   * 
   * @return bool
   * Returns true if user exist or false to the calling function.
   */
  public function isUserExist($email)
  {
    $sql_query = "SELECT email FROM user_table WHERE email =:mail";
    $stmt = $this->connection->prepare($sql_query);
    $stmt->execute(['mail' => $email]);
    $data = $stmt->fetchAll();
    foreach ($data as $row) {
      if ($row["email"] == $email) {
        return true;
      }
    }

    return false;
  }

  /**
   * Check if user password is matched or not.
   * 
   * @return boolean
   * Return true if user password is matched or false.
   */
  protected function isPasswordValid($email, $password)
  {
    $sql_query = "SELECT password FROM user_table WHERE email =:mail";
    $stmt = $this->connection->prepare($sql_query);
    $stmt->execute(['mail' => $email]);
    $user_password = $stmt->fetch();
    if ($user_password["password"] == $password) {
      return true;
    }
    return false;
  }
}
