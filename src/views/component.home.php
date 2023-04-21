<div>
  <form name="music_list_form" method="post">
    <table class="table">
      <tbody>
        <?php
        foreach ($music_list as $data) {
        ?>
          <tr class="flex">
            <td><img class="icon" src="http://localhost/src/uploads/image/<?php echo $data['thumb'] ?>" alt="Play"></td>
            <td>
              <h2><?php echo $data['name'] ?? ''; ?></h2>
            </td>
            <td>

            </td>

            <td>
              <button name="fav_Button" id="add_to_favourite" onclick="AddToFavourite('<?php echo $data['id'] ?>')">Favourite</button>
            </td>
            <td><img class="icon" onclick="OpenPlayer('<?php echo $data['name']; ?>','<?php echo $data['audio']; ?>','<?php echo $data['singer']; ?>','<?php echo $data['genre']; ?>','<?php echo $data['thumb']; ?>')" src="../../src/uploads/icons/play_icon.png" alt="Play">
            </td>

          </tr>

        <?php
        }
        ?>


      </tbody>
    </table>
  </form>

</div>