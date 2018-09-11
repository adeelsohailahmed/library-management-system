// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

function validatePass()
{
    if ($("#inputConfirmPass").val() != "" && $("#inputConfirmPass").val() != $("#inputPass").val())
    {
      $("#inputPass").removeClass("is-valid");
      $("#inputConfirmPass").removeClass("is-valid");
      $("#inputConfirmPass").addClass("is-invalid");
      return false;
    }
    else if ($("#inputConfirmPass").val() != "" && $("#inputConfirmPass").val() == $("#inputPass").val())
    {
      $("#inputConfirmPass").removeClass("is-invalid");
      $("#inputConfirmPass").addClass("is-valid");
      $("#inputPass").addClass("is-valid");
      return true;
    }
    else if ($("#inputConfirmPass").val() == "")
    {
      $("#inputConfirmPass").removeClass("is-valid");
      $("#inputPass").removeClass("is-valid");
      return false;
    }
}

function emailExists()
{
    $.post('ajax-scripts/does-email-exist.php', $("#inputEmail").serialize(), )
        .done(function( data ) {
          //console.log(data);
          if (data === '-1')
          {
            if($("#inputEmail").hasClass("is-valid")) $("#inputEmail").removeClass("is-valid");
            if (!($("#inputEmail").hasClass("is-invalid"))) $("#inputEmail").addClass("is-invalid");
          }
          else 
          {
            if (($("#inputEmail").hasClass("is-invalid"))) $("#inputEmail").removeClass("is-invalid");
            $result = data;
            $emailExists = !!+$result;
            //console.log($emailExists);
            if ($emailExists){
              if ($("#inputEmail").hasClass("is-valid")) $("#inputEmail").removeClass("is-valid");
              $("#inputEmail").addClass("is-invalid");
              $("#email-feedback").html("An account with this email address already exists");
              //alert("There's already an account associated with this email.");
            }
            else
            {
              if ($("#inputEmail").hasClass("#is-invalid")) $("#inputEmail").removeClass("is-invalid");
              $("#inputEmail").addClass("is-valid");
              $("#email-feedback").html("Please enter a valid email address");
              //alert("Boy, have you lost your mind? Cause I'll help you find it!");
            }
          }
          console.log($("#inputEmail").attr('class'));
        });
}

function userNameValidation()
{
  if ($("#inputName").val() == '')
  {
    if($("#inputName").hasClass("is-valid")) $("#inputName").removeClass("is-valid");
    if (!($("#inputName").hasClass("is-invalid"))) $("#inputName").addClass("is-invalid");

  }
  else
  {
    if($("#inputName").hasClass("is-invalid")) $("#inputName").removeClass("is-invalid");
    if (!($("#inputName").hasClass("is-valid"))) $("#inputName").addClass("is-valid");
  }
}

function successfulRegistration()
{

  emailExists();
  if ($("#inputName").hasClass("is-valid") && $("#inputEmail").hasClass("is-valid") && validatePass())
  {
    $("#registrationSuccess").modal({
        backdrop: 'static',
        keyboard: false
      });
  }
}

function createAccount()
{
  $.post("ajax-scripts/Registration.php", $("#registration-form").serialize())
      .done()
      {
        setTimeout(() => {
          window.location.replace("/library-management/");
        }, 300); 
      };
  
}

//$("#inputEmail").on("keyup", emailExists);

$("#inputName").on("paste", userNameValidation);
$("#inputName").on("focusout", userNameValidation);
$("#inputName").on("focusin", userNameValidation);

$("#inputEmail").on("paste", emailExists);
$("#inputEmail").on("focusout", emailExists);
$("#inputEmail").on("focusin", emailExists);

$("#inputConfirmPass").on("keyup", validatePass);
$("#inputConfirmPass").on("focusout", validatePass);
$("#inputConfirmPass").on("focusin", validatePass);

$("#signUp").on("click", successfulRegistration);
$("#inputConfirmPass").keyup(function(e) {
    if (e.keyCode == 13) successfulRegistration();
  });
$("#login").on("click", createAccount);
