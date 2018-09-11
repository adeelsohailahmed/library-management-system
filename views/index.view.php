<?php require('partials/header.partialview.php') ?>
  <body>
        <h1 class="display-3 d-flex h-50 w-50 text-center text-white mx-auto align-items-center">
        Library Management System
        </h1>


    <div id="card" class="d-flex h-40 align-items-center">
            <div class="card w-50 mx-auto my-auto  align-items-center border-0 rounded">
                <div class="card-header w-100 bg-dark text-white text-center h4 border-0">
                Log In
                </div>
                <div class="card-body w-75 pl-3 pr-3">
                    <h4 class="card-title text-center pb-3">To get started, please log in</h4>
                    <form id="login-form" class="needs-validation" novalidate>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-center" for="inputEmail">Email</label>
                            <div class="col-sm-8 pl-1">
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="" required autofocus>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-center" for="inputPass">Password</label>
                            <div class="col-sm-8 pl-1">
                                <input type="password" class="form-control" name="inputPass" id="inputPass" placeholder="" required>
                                <div class="invalid-feedback">
                                    Incorrect Email or Password. If you're logging into newly created account, make sure your account is activated first!
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4 pl-1">
                                <button id="login" type="button" class="btn btn-dark">Log In</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4 pl-1">
                                <a href="register.php">Don't have an account? Click here.</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
    </div>

<?php require('core/scripts/necessary-scripts.php'); ?>
<?php
    if (!(empty($_SESSION["accountActivated"])))
    {
        echo <<< EOD
            <script>alert("Your account has been successfully activated. You can log in now");</script>
EOD;

        $_SESSION["accountActivated"] = null;
    }


    if (!(empty($_SESSION["accountAlreadyActivated"])))
    {
        echo <<< EOD
            <script>alert("Your account has already been activated. Feel free to log in.");</script>
EOD;

        $_SESSION["accountAlreadyActivated"] = null;
    }
?>

<script src="core/scripts/js/login-form-validation.js"></script>

  </body>
</html>