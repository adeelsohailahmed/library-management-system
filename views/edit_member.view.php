<?php
require('views/partials/header.partialview.php') ;
require('views/partials/navigation.partialview.php');

require('controllers/Edit_Member.php');

?>

    <div class='container bg-light mt-5 pt-4 pb-5 rounded'>
        <div>
            <h2>Edit member</h2>
            <hr/>
            <form id='addBook-form' class='mt-4 needs-validation' method='post' action='controllers/Submit_Member_Changes.php' novalidate>
                <div class='form-group row'>
                    <label for='name' class='col-md-2 offset-md-2'> Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='name' name='name' value='<?=$editMember["name"];?>' required>
                </div>
                <div class='form-group row'>
                    <label for='cnic' class='col-md-2 offset-md-2'>CNIC No:</label>
                    <input class='form-control col-md-4 ml-1' type='tel' id='cnic' name='cnic' minlength='13' maxlength='13' value='<?=$editMember["cnic"];?>' required>
                </div>
                <div class='form-group row'>
                    <input type='hidden' id='member_id' name='member_id' value='<?=$editMember["id"];?>'>
                    <label for='registration_date' class='col-md-2 offset-md-2'>Registration Date:</label>
                    <input class='form-control col-md-4 ml-1' type='date' id='registration_date' name='registration_date' value='<?=$editMember["registration_date"];?>' required>
                </div> 
                <div class='col-md-4 offset-md-4'>
                    <div class='d-flex justify-content-between'>
                        <button type='submit' class='btn btn-primary'>Submit Changes</button>
                        <button type='button' onclick='location.href="members-listing";' class='btn btn-danger'>Go Back</button>
                    </div>
                </div>
            
            </form>
        </div>
    
    
    </div>

<?php 
require('core/scripts/necessary-scripts.php');
require('views/partials/footer.partialview.php'); 
?>