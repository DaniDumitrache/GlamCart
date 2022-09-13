$(document).ready(function () {
  function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test($email);
  }

  $("#login-btn").click(function (e) {
    e.preventDefault();
    Email = $("#CustomerEmail");
    Pass = $("#CustomerPassword");

    if (Email.val() && Pass.val()) {
      $("#ErrEmail").text("");
      $("#ErrPass").text("");
      $.ajax({
        url: "assets/php/action.php",
        method: "POST",
        data:
          "CustomerEmail=" +
          $("#CustomerEmail").val() +
          "&CustomerPassword=" +
          $("#CustomerPassword").val() +
          "&action=login",
        success: function (response) {
          console.log(response);
          switch (response) {
            case "succ_log":
              window.location.replace("index.php");
              break;
            case "err_pass":
              $("#ErrPass").text("Password is incorect");
              break;
            case "email_not_exist":
              $("#ErrEmail").text("this email does not exist");
              break;
          }
        },
      });
    } else {
      $("#ErrEmail").text("* This field require");
      $("#ErrPass").text("* This field require");
    }
  });

  $("#CreateAccount").click(function (e) {
    e.preventDefault();
    if ($("#newsletter:checked").val() == "on") {
      newsletter = 1;
    } else {
      newsletter = 0;
    }

    FirstName = $("#FirstName");
    LastName = $("#LastName");
    Username = $("#Username");
    Email = $("#Email");
    Password = $("#Password");

    if (FirstName.val() && LastName.val() && Email.val() && Password.val()) {
      $("#errorFirst").text("");
      $("#errorLast").text("");
      $("#errorUser").text("");
      $("#errorEmail").text("");
      $("#errorPass").text("");
      if (validateEmail(Email.val())) {
        $("#errorEmail").text("");

        $.ajax({
          url: "assets/php/action.php",
          method: "POST",
          data:
            "FirstName=" +
            FirstName.val() +
            "&LastName=" +
            LastName.val() +
            "&Username=" +
            Username.val() +
            "&Email=" +
            Email.val() +
            "&Password=" +
            Password.val() +
            "&newsletter=" +
            newsletter +
            "&action=Register",
          success: function (response) {
            console.log(response);
            switch (response) {
              case "succ_register":
                window.location.replace("index.php");
                break;
            }      
          },
        });
      } else {
        $("#errorEmail").text("* Email Format Is incorect");
      }
    } else {
      $("#errorFirst").text("* This field require");
      $("#errorLast").text("* This field require");
      $("#errorUser").text("* This field require");
      $("#errorEmail").text("* This field require");
      $("#errorPass").text("* This field require");
    }
  });

  $("#subscribe").click(function (e) {
    e.preventDefault();
    NewsletterEmail = $("#NewsletterEmail");
    NewsletterMessage = $("#NewsletterMessage");

    if (NewsletterEmail.val()) {
      if (validateEmail(NewsletterEmail.val())) {
        $.ajax({
          url: "../assets/php/action.php",
          method: "POST",
          data:
            "name=null" +
            "&email=" +
            NewsletterEmail.val() +
            "&action=AddUserInNewsletter",
          success: function (response) {
            NewsletterMessage.text("success");
            NewsletterMessage.addClass("success");

            setTimeout(() => {
              NewsletterMessage.text("");
            }, 1000);
          },
        });
      }
    } else {
    }
  });

  $("#ForgotPassword").click(function (e) {
    e.preventDefault();

    Email = $("#Email");

    if (Email.val()) {
      $("#ErrEmail").text("");
      $.ajax({
        url: "assets/php/action.php",
        method: "POST",
        data: "Email=" + Email.val() + "&action=RecoverAccount",
        success: function (response) {
          console.log(response);
          switch (response) {
            case "UserNotExist":
              $("#ErrEmail").text("Email Not Found");
              break;
          }
        },
      });
    } else {
      // Field Empty
      $("#ErrEmail").text("* This field require");
    }
  });

  $("#ResetPassword").click(function (e) {
    e.preventDefault();

    Email = $("#Email");
    Token = $("#Token");
    Password = $("#Password");
    Cpassword = $("#Cpassword");

    if (Password.val() && Cpassword.val()) {
      $("#ErrPassword").text("");
      $("#ErrCpassword").text("");
      if (Password.val() == Cpassword.val()) {
        $.ajax({
          url: "assets/php/action.php",
          method: "POST",
          data:
            "Email=" +
            Email.val() +
            "&Token=" +
            Token.val() +
            "&Password=" +
            Password.val() +
            "&action=ResetPassword",
          success: function (response) {
            console.log(response);
            switch (response) {
              case "success":
                window.location.replace("login.php");
                break;
              case "IncorectSession":
                $("#ErrCpassword").text("Email or token is invalid");
                break;

              case "UserNotExist":
                $("#ErrCpassword").text("Email Not Found");
                break;
            }
          },
        });
      } else {
        // Passwords Not Match
        $("#ErrCpassword").text("Password Not Match");
      }
    } else {
      // Field Empty
      $("#ErrPassword").text("* This field require");
      $("#ErrCpassword").text("* This field require");
    }
  });
});
