<?php
require('views/partials/header.partialview.php') ;
require('views/partials/navigation.partialview.php');
if (!(empty($_SESSION["duplicateCNIC"])))
{
    echo <<< EOD
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Member "{$_SESSION['duplicateMember']}" can't be added, because a member holding CNIC No. {$_SESSION['duplicateCNIC']} exists already.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
EOD;

    $_SESSION["duplicateMember"] = null;
    $_SESSION["duplicateCNIC"] = null;
}
?>

    <div class='container bg-light mt-5 pt-4 pb-5 rounded'>
        <div>
            <h2>Add a new member</h2>
            <hr/>
            <form id='addBook-form' class='mt-4 needs-validation' method='post' action='controllers/Add_Member.php' novalidate>
                <div class='form-group row'>
                    <label for='name' class='col-md-2 offset-md-2'> Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='name' name='name' placeholder='e.g. Adeel Ahmed' required>
                </div>
                <div class='form-group row'>
                    <label for='cnic' class='col-md-2 offset-md-2'>CNIC No:</label>
                    <input class='form-control col-md-4 ml-1' type='tel' id='cnic' name='cnic' minlength='13' maxlength='13' placeholder='e.g. 4220123457893' required>
                </div>
                <div class='form-group row'>
                    <label for='registration_date' class='col-md-2 offset-md-2'>Registration Date:</label>
                    <input class='form-control col-md-4 ml-1' type='date' id='registration_date' name='registration_date' required>
                </div> 
                <div class='col-md-4 offset-md-4'>
                    <div class='d-flex justify-content-between'>
                        <button type='submit' class='btn btn-primary'>Add New Member</button>
                        <button type='button' onclick='location.href="book-listing";' class='btn btn-danger'>Go Back</button>
                    </div>
                </div>
            
            </form>
        </div>
    
    
    </div>



    <script src='core/scripts/js/edit-book.js'></script>

<?php 
require('core/scripts/necessary-scripts.php');
require('views/partials/footer.partialview.php'); 
?>