<?php
include("../../src/classes/HomePage.php");
$home_obj = new HomePage();
$favourite_list = $home_obj->getFavourites();
echo $favourite_list;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>My Favourities</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="../../src/js/home.js"></script>
</head>

<body class="bg_primary">

  <div class="margin-top-low">
    <form name="music_list_form" method="post">
      <table class="table">
        <tbody>
          <?php
          foreach ($favourite_list as $data) {
          ?>
            <tr class="flex">
              <td>
                <h2><?php echo $sn; ?></h2>
              </td>
              <td><img class="icon" src="http://localhost/src/uploads/image/<?php echo $data['thumb'] ?>" alt="Play"></td>
              <td>
                <h2><?php echo $data['name'] ?? ''; ?></h2>
              </td>
              <td><img class="icon" onclick="OpenPlayer('<?php echo $data['name']; ?>','<?php echo $data['audio']; ?>','<?php echo $data['singer']; ?>','<?php echo $data['genre']; ?>','<?php echo $data['thumb']; ?>')"
             src="../../src/uploads/icons/play_icon.png" alt="Play">   
              </td>       
            
            </tr>

          <?php } ?>

        </tbody>
      </table>
    </form>

  </div>

</body>

</html>