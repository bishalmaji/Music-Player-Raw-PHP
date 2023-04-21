

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="../../src/js/home.js"></script>
  <title>Add Music</title>
</head>
<body>

<form id="upload_music_form" enctype="multipart/form-data" method="post">
  <p id="error-field"></p>
  <div class="flex">
    <label for="audio">Audio</label>
    <input type="file" id="audio" name="audio">
    <p class="error" id="error-field-audio">
  </div>
  <div class="flex">
    <label for="thumb">Thubmnail</label>
    <input type="file" id="thumb" name="thumb">
    <p class="error" id="error-field-thumb">

  </div>
  <div class="flex">
    <label for="name">Song Name</label>
    <input type="text" name="name" id="name">
    <p class="error" id="error-field-name">

  </div>
  <div class="flex">
    <label for="singer">Singer Name's</label>
    <input type="text" name="singer" id="singer">
    <p class="error" id="error-field-singer">

  </div>
  <div class="flex">
  <label for="genre">Genre</label>
      <select name="genre" id="genre">
        <option value="rock">Rock</option>
        <option value="melody">Melody</option>
        <option value="clasic">Clasic</option>
        <option value="soft">Soft</option>
      </select>
      <p class="error" id="error-field-interest">
  </div>
  <div class="text-align-start margin-top-low">
    <input type="submit" name="upload_audio" id="add_music" value="Upload Music">
    </div>
</form>
</body>

</html>