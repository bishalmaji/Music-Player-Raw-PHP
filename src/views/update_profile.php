<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="../../src/js/home.js"></script>
  <title>Update Profile</title>
</head>

<body>
  <form name="update_profile_form" method="post">
    <p id="error-field"></p>
    <div class="flex">
      <label for="email">Email</label>
      <input type="email" name="email">
      <p class="error" id="error-field-email">
    </div>
    <div class="flex">
      <label for="contact">Contact</label>
      <input type="number" name="contact">
      <p class="error" id="error-field-contact">
    </div>
    </div>
    <div class="flex">
      <label for="interest">Intrest</label>
      <select name="interest" id="interest">
        <option value="rock">Rock</option>
        <option value="melody">Melody</option>
        <option value="clasic">Clasic</option>
        <option value="soft">Soft</option>
      </select>
      <p class="error" id="error-field-interest">
    </div>
    <div class="text-align-start margin-top-low">
      <input type="submit" id="profile_update" name="submit" value="Update">
    </div>
  </form>
</body>

</html>