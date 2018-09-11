<?php require('partials/header.partialview.php') ?>

<body>
        <h1 class="display-3 d-flex h-50 w-50 text-center text-white mx-auto align-items-center">
        Library Management System
        </h1>
    <div id="card" class="d-flex h-40 mb-5 align-items-center">
            <div class="card w-50 mx-auto my-auto  align-items-center border-0 rounded">
                <div class="card-header w-100 bg-dark text-white text-center h4 border-0">
                    Register Account
                </div>
                <div class="card-body w-75 pl-3 pr-3">
                    <h4 class="card-title text-center pb-3">
                        To register a new account, enter details
                    </h4>
                    <form id="registration-form" class="needs-validation" novalidate>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-center" for="inputName">User Name</label>
                            <div class="col-sm-8 pl-1">
                                <input type="text" class="form-control" name="inputName" id="inputName" required autofocus>
                                <div class="invalid-feedback">
                                    Please enter a user name
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-center" for="inputEmail">Email</label>
                            <div class="col-sm-8 pl-1">
                                <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="" required>
                                <div id="email-feedback" class="invalid-feedback">
                                    Please enter a valid email address
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-center" for="inputPass">Password</label>
                            <div class="col-sm-8 pl-1">
                                <input type="password" class="form-control" name="inputPass" id="inputPass" placeholder="" required>
                                <div class="invalid-feedback">
                                    Please enter a password
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-center" for="inputConfirmPass">Confirm Password</label>
                            <div class="col-sm-8 pl-1">
                                <input type="password" class="form-control" name="inputConfirmPass" id="inputConfirmPass" placeholder="" required>
                                <div class="invalid-feedback">
                                    Passwords do not match!
                                </div>
                            </div>
                        </div>                        
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4 pl-1">
                                <button id="signUp" type="button" class="btn btn-dark">Sign Up</button>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-8 offset-sm-4 pl-1">
                                <a href="index.php">Already have an account? Click here.</a>
                            </div>
                        </div>
                    </form>
                </div>
                    
                   
            
            </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="registrationSuccess" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationSuccessful">Registration Successful!</h5>
                </div>
                <div class="modal-body">
                    <p>Your account details has been successfully registered. Please click on the button below to create your account.</p>
                    <br>
                    <p>An account activation link will be sent to your email address, if you proceed to create your account.</p>
                    <br>
                    <p>Please check your inbox and activate your account by clicking on the link provided to start using the service.</p>
                </div>
                <div class="modal-footer">
                    <button id="login" type="button" class="btn btn-dark">Create Account</button>
                </div>
            </div>
        </div>
    </div>

<?php
require('core/scripts/necessary-scripts.php');
?>
<script src="core/scripts/js/registration-form-validation.js"></script>
  </body>
</html>