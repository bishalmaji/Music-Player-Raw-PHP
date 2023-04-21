<form name="register_form" method="post" autocomplete="off">
  <p class="error" id="error-field">
  <div>
    <label for="name">Full Name</label>
    <input type="text" name="name" required>
    <p class="error" id="error-field-name">
  </div>
  <label for="email">Email</label>
  <input type="email" name="email" required>
  <p class="error" id="error-field-email">
  <div>
    <div>
      <label for="password">Password</label>
      <input type="password" name="password">
      <p class="error" id="error-field-password">
    </div>
    <div>
      <label for="confirm-password">Confirm Password</label>
      <input type="password" name="confirm-password">
      <p class="error" id="error-confirm-password">
    </div>
    <div>
      <label for="interest">Genre</label>
      <select name="interest" id="interest">
        <option value="rock">Rock</option>
        <option value="melody">Melody</option>
        <option value="clasic">Clasic</option>
        <option value="soft">Soft</option>
      </select>
      <p class="error" id="error-field-interest">
    </div>
    <div>
      <label for="contact">Contact</label>
      <input type="number" name="contact">
      <p class="error" id="error-field-contact">
    </div>
    <div>

      <div>
        <button type="submit" id="register_btn">Regiter</button>
      </div>

</form>