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

  if ($(window).width() <= 800)
  {
    $(".display-3").addClass("display-4").removeClass("display-3");
  }

  if ($(window).width() <= 500)
  {
    $(".card").addClass("w-75").removeClass("w-50");
  }

})();


function checkAccount()
{
  $.post("ajax-scripts/Login.php", $("#login-form").serialize())
      .done (function ( data ){
        if (data === "1")
        {
          setTimeout(() => {
            window.location.replace("/library-management/book-listing");
          }, 300);
        } 
        
        else 
        {
          if(!($("#inputPass").hasClass("is-invalid"))) $("#inputPass").addClass("is-invalid");
        }
      
      
      });
      
}


$("#login").on("click", checkAccount);
$("#inputPass").keyup(function(e) {
  if (e.keyCode == 13) checkAccount();
  });

