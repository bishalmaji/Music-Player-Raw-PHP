<?php
include("/var/www/html/raw_php_music_player/src/utilClasses/DbConnector.php");

/**
 * Manage all the user related database operation.
 */
class HomeDb extends DBConnector
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
   * Fetch list of music form db.
   * 
   * @return array $row;
   * List of music available in db.
   */
  protected function fetchMusic()
  {
    $sql_query = "SELECT * FROM music_table";
    $result = $this->connection->query($sql_query);
    $row = $result->fetchAll();
    return $row;
  }

  /**
   * Update user data in db.
   * 
   * @param array $data.
   * Contains user form data to update.
   * 
   * @return boolean 
   * Returns ture is update is done successfully or false.
   */
  protected function isUpdateDone(array $data)
  {
    $sql = "UPDATE user_table SET  email=?, interest=?, contact=? WHERE id=?";
    $param_uid = $this->getUserId();
    $param_email = $data['email'];
    $param_contact = $data['contact'];
    $param_intrest = $data['interest'];
    $statement = $this->connection->prepare($sql);

    // If UPDATE succeeded return ture or false.
    if ($statement->execute([$param_email, $param_intrest, $param_contact, $param_uid])) {
      return  true;
    } else {
      return false;
    }
  }


  /**
   * 
   * Upload music data in db.
   * 
   * @param array $data.
   * Contains music form data to upload.
   * 
   * @return boolean 
   * Returns ture is upload is done successfully or false.
   */

  protected function isUploadDone()
  {
    $img_name = $_FILES['thumb']['name'];
    $img_temp = $_FILES['thumb']['tmp_name'];
    $img_destination = "/var/www/html/raw_php_music_player/src/uploads/image/" . $img_name;
    $audio_name = $_FILES['audio']['name'];
    $audio_temp = $_FILES['audio']['tmp_name'];
    $audio_destination = "/var/www/html/raw_php_music_player/src/uploads/audio/" . $audio_name;

    move_uploaded_file($audio_temp, $audio_destination);
    move_uploaded_file($img_temp, $img_destination);

    /* Step 1: prepare */
    $sql = "INSERT INTO music_table(audio, name,singer,genre,thumb,upload_by) VALUES (?, ?, ?, ?, ?,?)";
    $query = $this->connection->prepare($sql);

    $param_audio = basename($_FILES['audio']['name']);
    $param_name = $_POST['name'];
    $param_singer = $_POST['singer'];
    $param_genre = $_POST['genre'];
    $param_thumb = basename($_FILES['thumb']['name']);
    $param_upload_by = $this->getUserId();;

    /* Step 2: bind the data */
    $query->bindParam(1, $param_audio, PDO::PARAM_STR);
    $query->bindParam(2, $param_name, PDO::PARAM_STR);
    $query->bindParam(3, $param_singer, PDO::PARAM_STR);
    $query->bindParam(4, $param_genre, PDO::PARAM_STR);
    $query->bindParam(5, $param_thumb, PDO::PARAM_STR);
    $query->bindParam(6, $param_upload_by, PDO::PARAM_INT);

    //Step 3: execute: If upload succeeded,return ture or false.
    if ($query->execute()) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Get the id of the current user.
   *
   * @return int
   * id of the current user with mail
   *
   */
  protected function getUserId()
  {
    $sql_query = "SELECT id FROM user_table WHERE email =:mail";
    $stmt = $this->connection->prepare($sql_query);
    session_start();
    $user_mail = $_SESSION['uid'];
    $stmt->execute(['mail' => $user_mail]);
    $data = $stmt->fetch();
    return $data['id'];
  }
  /**
   * Adds music to favourite list.
   * 
   * @return  boolean
   * Returs true if added to favourite list.
   */
  public function isAddedToFav()
  {
    $sql = "INSERT INTO favourite_table(user_id, music_id) VALUES (?, ?)";
    $query = $this->connection->prepare($sql);

    //Get or prepare the elements
    $param_fav_id = $_POST['id'];
    $param_user_id = $this->getUserId();

    //Bind the element
    $query->bindParam(1, $param_user_id, PDO::PARAM_INT);
    $query->bindParam(2, $param_fav_id, PDO::PARAM_INT);

    //execute
    if ($query->execute()) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Fetch list ofuser favourite music form db.
   * 
   * @return array $row;
   * List of user favourite music available in db.
   */
  protected function fetchFavourites()
  {
    $user_id = $this->getUserId();
    $sql_query = "SELECT * FROM music_table 
    INNER JOIN favourite_table ON music_table.id=favourite_table.music_id 
    WHERE favourite_table.user_id = $user_id";
    $result = $this->connection->query($sql_query);
    $row = $result->fetchAll();
    return $row;
  }
}
