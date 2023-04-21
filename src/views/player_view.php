<?php
  $name = $_GET['name'];
  $file_name = $_GET['audio'];
  $singer = $_GET['singer'];
  $genre = $_GET['genre'];
  $cover = $_GET['thumb'];
  $audio = "http://localhost/src/uploads/audio/$file_name";
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Player</title>
</head>
<body class="bg_green">
  <div class="container">
    <div class="box">
      <h3>PlayinG x oF Y</h3>
      <br>
      <br>
      <img class="player_cover" src="http://localhost/src/uploads/image/<?php echo $cover ?>" alt="Play">
      <h1><?php echo $name; ?></h4>
        <h4><?php echo $singer; ?></h4>
        <h4><?php echo $genre ?></h4>
        <br>
        <br>
        <audio controls>
          <source src="<?php echo $audio; ?>" type="audio/mpeg">
        </audio>
    </div>
  </div>

</body>

</html>