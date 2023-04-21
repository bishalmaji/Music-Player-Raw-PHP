$(document).ready(function () {
  /**
   * This function is triggred when register button is clicked
   * and on successful registration, it set the session and
   * navigate the user to the home page.
   */
  $("#register_btn").click(function (event) {
    event.preventDefault();
    var form = $("form").serializeArray();
    var isAnyEmptyField = false;
    var formDataArr = {};
    form.forEach((element) => {
      if (!element.value) {
        isAnyEmptyField = true;
        return;
      }
      formDataArr[element.name] = element.value;
    });
    console.log(formDataArr);

    if (isAnyEmptyField) {
      generateErrorMessage("Fields can not be empty");
    }

    //js validation
    if (isRegisterFormValid()) {
      $.ajax({
        url: "../../register.php",
        type: "post",
        data: {
          name: formDataArr["name"],
          email: formDataArr["email"],
          password: formDataArr["password"],
          interest: formDataArr["interest"],
          contact: formDataArr["contact"],
        },
        dataType: "text",
        success: function (response) {
          var response_arr = jQuery.parseJSON(response);

          if (response_arr["status"] == "success") {
            window.location = "/";
          } else {
            // window.location = "/error";
          }
        },

        error: function (xhr, status, error) {},
      });
    }
  });

  /**
   * This function is triggred when Login button is clicked
   * and on successful login, it set the session and
   * navigate the user to the home page.
   * */
  $("#login_btn").click(function (event) {
    event.preventDefault();
    var form = $("form").serializeArray();
    var isAnyEmptyField = false;
    var formDataArr = {};
    form.forEach((element) => {
      if (!element.value) {
        isAnyEmptyField = true;
        return;
      }
      formDataArr[element.name] = element.value;
    });

    if (isAnyEmptyField) {
      generateErrorMessage("Fields can not be empty");
    }
    //js validation
    if (isLoginFormValid()) {
      $.ajax({
        url: "../../login.php",
        type: "post",
        data: {
          email: formDataArr["email"],
          password: formDataArr["password"],
        },
        dataType: "text",
        success: function (response) {
          var response_arr = jQuery.parseJSON(response);
          console.log(response_arr);
          if (response_arr["status"] == "success") {
            window.location = "/";
          } else {
            // window.location = "/error.php";
          }
        },
        error: function (xhr, status, error) {
          // window.location = "/error.php" ;
        },
      });
    }
  });

  /**
   * Returns true if the register form is valid.
   *
   * @returns boolean
   */
  function isRegisterFormValid() {
    var isValid = true;
    if (!validNameRegx($("[name='name']").val())) {
      $("#error-field-name").html("Name can only contain alphabets");
      isValid &= false;
    }
    if (!validEmailRegx($("[name='email']").val())) {
      $("#error-field-email").html("Email fromat is not valid");
      isValid &= false;
    }
    if ($("[name='password']").val().length < 6) {
      $("#error-field-password").html("Password can not be less than 6 digit");
      isValid &= false;
    }
    if ($("[name='password']").val() !== $("[name='confirm-password']").val()) {
      $("#error-confirm-password").html("Password do not match");
      isValid &= false;
    }
    if ($("[name='contact']").val().length !== 10) {
      $("#error-field-contact").html("Phone number must be of 10 digit");
      isValid &= false;
    }
    return isValid;
  }

  /**
   * Returns true if the login form is valid.
   *
   * @returns boolean
   */
  function isLoginFormValid() {
    var isValid = true;
    if (!validEmailRegx($("[name='email']").val())) {
      $("#error-field-email").html("Email fromat is not valid");
      isValid &= false;
    }
    if ($("[name='password']").val().length < 6) {
      $("#error-field-password").html("Password can not be less than 6 digit");
      isValid &= false;
    }
    return isValid;
  }

  //Show error for 5 second, if any field is empty
  function generateErrorMessage($err_msg) {
    $("#error-field").html($err_msg);
    setTimeout(function () {
      $("#error-field").html("");
    }, 5000);
  }

  // Returns true if name contains no digit or false.
  function validNameRegx(value) {
    var regex = /^[a-zA-Z]+[ ][a-zA-Z]+$/;
    var regex2 = /^[a-zA-Z]+$/;
    return regex.test(value) || regex2.test(value);
  }

  // Returns true on valid mail syntax or false.
  function validEmailRegx(value) {
    return value.match(
      /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
  }
});
