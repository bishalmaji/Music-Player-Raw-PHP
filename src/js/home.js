
$(document).ready(function () {
  /**
   * This function is triggred when Profile Update button is clicked
   */
  $("#profile_update").click(function (event) {
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

    // js validation
    if (isUpdateFormValid()) {
      $.ajax({
        url: "../../update.php",
        type: "post",
        data: {
          email: formDataArr["email"],
          interest: formDataArr["interest"],
          contact: formDataArr["contact"],
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
   * This function is triggred when Add Music button is clicked
   */
  function log(msg) {
    setTimeout(function () {
      throw new Error(msg);
    }, 0);
  };

 //called when add music button is clicked
  $("#add_music").click(function (event) {

    event.preventDefault();
    var formData = new FormData();
    audio = $('input[type="file"]')[0].files[0];
    image = $('input[type="file"]')[1].files[0];

    formData.append("name", $("#name").val());
    formData.append("singer", $("#singer").val());
    formData.append("genre", $("#genre").val());
    formData.append("audio", audio);
    formData.append("thumb", image);
     console.log(formData);
    $.ajax({
          url: "../../upload.php",
          type: "POST",
          dataType: "json",
          data: formData,
          processData: false,
          contentType: false,
          success: function (response) {
            var response_arr = jQuery.parseJSON(response);
            if (response_arr["status"] == "success") {
              window.location = "/";
            }else{
              // window.location = "/error.php";
            }
  
          },
          error: function (xhr, status, error) {
            // window.location = "/error.php" ;
          },
        });
 
  });
  
  /**
   * This function is triggred when Logout button is clicked
   */
  $("#logout").click(function (event) {
 window.location = "../../logout.php";
  });

  //Show error for 5 second, if any field is empty
  function generateErrorMessage($err_msg) {
    $("#error-field").html($err_msg);
    setTimeout(function () {
      $("#error-field").html("");
    }, 5000);
  }
  /**
   * Returns true if the login form is valid.
   *
   * @returns boolean
   */
  function isUpdateFormValid() {
    var isValid = true;
    if (!validEmailRegx($("[name='email']").val())) {
      $("#error-field-email").html("Email fromat is not valid");
      isValid &= false;
    }
    if ($("[name='contact']").val().length !== 10) {
      $("#error-field-contact").html("Phone number must be of 10 digit");
      isValid &= false;
    }
    return isValid;
  }

  // Returns true on valid mail syntax or false.
  function validEmailRegx(value) {
    return value.match(
      /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    );
  }
});


/**
 * 
 * This functio Opens player_view.php with data given.
 * 
 * @param {*text} name contains name of audio
 * @param {*file} audio contains audio file 
 * @param {*text} singer contains singer name of audio
 * @param {*text} genre contains genre of audio
 * @param {*file} cover contains thumnail fie of audio
 * 
 */
function OpenPlayer(name, audio, singer, genre, cover) {
  window.location = "../../src/views/player_view.php?name=" + name + "&audio=" + audio + "&singer=" + singer + "&genre=" + genre + "&thumb=" + cover;
}

//Add music to user favourite list
function AddToFavourite(id){
  $.ajax({
    url: "../../add_favourite.php",
    type: "POST",
    data: {
      id:id
    },
    dataType: "text",
    success: function (response) {
      var response_arr = jQuery.parseJSON(response);
      if (response_arr["status"] == "success") {
        console.log("added to favourite");
        window.location = "/";
      }else{
        // window.location = "/error.php";
      }

    },
    error: function (xhr, status, error) {
      // window.location = "/error.php" ;
    },
  });
}