<?php

date_default_timezone_set('Asia/Karachi');

$currentDate = date('Y-m-d');
$weekAfterDate = date('Y-m-d', strtotime('+1 week'));

require('views/partials/header.partialview.php') ;
require('views/partials/navigation.partialview.php');

if (!(empty($_SESSION["issue_book_name"])))
{
    echo <<< EOD
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Book "{$_SESSION['issue_book_name']}" can't be issued, because all of its copies have been issued already.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
EOD;

    $_SESSION["issue_book_name"] = null;
}

if (!(empty($_SESSION["already_issued_book"])))
{
    echo <<< EOD
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Book "{$_SESSION['already_issued_book']}" can't be issued, because it has been issued to "{$_SESSION['already_issued_member']}" already.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
EOD;

    $_SESSION["already_issued_book"] = null;
    $_SESSION['already_issued_member'] = null;
}

if (!(empty($_SESSION["date_error"])))
{
    echo <<< EOD
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Book "{$_SESSION['date_error']}" can't be issued, because book return date can't be less or prior to the book issue date.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
EOD;

    $_SESSION["date_error"] = null;
}

require('controllers/Issue_Receive_Book.php');
?>

    <div class='container bg-light mt-5 pt-4 pb-5 rounded'>
        <div>
            <h2>Issue / Receive Book</h2>
            <hr/>
            <form id='addBook-form' class='mt-4 needs-validation' method='post' action='controllers/Process_Book.php' novalidate>
            <div class='form-group row'>
                    <label for='IssueReceive' class='col-md-2 offset-md-2'>Issue / Receive:</label>
                    <select class='form-control col-md-4 ml-1' id='IssueReceive' name='IssueReceive' required>
                        <option value="0">Issue Book</option>
                        <option value="1">Receive Book</option>
                    </select>
                </div>
                <div class='form-group row'>
                    <label id="issueto" for='member' class='col-md-2 offset-md-2'>Issue To:</label>
                    <select class='form-control col-md-4 ml-1' type='text' id='member' name='member' required>
                        <?php

                               foreach($members as $member)
                               {
                                echo '<option value="'.$member[0].'" cnic-no="'.$member[1].'">'. $member[0]. '</option>' . "\n";
                               }     
                        ?>
                    </select>
                </div>
                <div class='form-group row'>
                    <label for='bookName' class='col-md-2 offset-md-2'>Book Name:</label>
                    <select class='form-control col-md-4 ml-1' id='bookName' name='bookName' required>
                        <?php
                                
                                foreach ($books as $bookName)
                                {
                                    if (!empty($_GET["name"]) && ($book_name == $bookName[0]))
                                    {
                                        echo '<option value="'.$bookName[0].'" selected>'. $bookName[0]. '</option>' . "\n";
                                    }
                                    echo '<option value="'.$bookName[0].'">'. $bookName[0]. '</option>' . "\n";
                                }

                        ?>
                    
                    </select>
                </div>
                <div class='form-group row'>
                    <label for='authorName' class='col-md-2 offset-md-2'>Author Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='authorName' name='authorName' required readonly>
                </div>
                <div class='form-group row'>
                    <label for='book_language' class='col-md-2 offset-md-2'>Language:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='book_language' name='book_language' required readonly>
                </div>
                <div class='form-group row'>
                    <label for='shelf' class='col-md-2 offset-md-2'>Shelf Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='shelf' name='shelf' required readonly>
                </div>
                <div id="issue1" class='form-group row'>
                    <label for='total_copies' class='col-md-2 offset-md-2'>Total No. of Copies:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='total_copies' name='total_copies' value='' required readonly>
                </div>
                <div id="issue2" class='form-group row' >
                    <label for='issued_copies' class='col-md-2 offset-md-2'>Issued No. of Copies:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='issued_copies' name='issued_copies'  value='' required readonly>
                </div>                                           
                <div class='form-group row'>
                    <label for='issue_date' class='col-md-2 offset-md-2'>Issue Date:</label>
                    <input class='form-control col-md-4 ml-1' type='date' id='issue_date' name='issue_date' value='<?=$currentDate;?>' required>
                </div> 
                <div class='form-group row'>
                    <label for='shelf' class='col-md-2 offset-md-2'>Return Date:</label>
                    <input class='form-control col-md-4 ml-1' type='date' id='return_date' name='return_date' value='<?=$weekAfterDate?>' required >
                </div>
                <input id='cnic' name ='cnic' type='hidden' value=''>
                <div class='col-md-4 offset-md-4'>
                    <div class='d-flex justify-content-between'>
                        <button id='issue-receive-button' type='submit' class='btn btn-primary'>Issue Above Book</button>
                        <button type='button' onclick='location.href="book-listing.php";' class='btn btn-danger'>Go Back</button>
                    </div>
                </div>                                                           
            </form>
        </div>
    
    
    </div>

<?php require('core/scripts/necessary-scripts.php'); ?>

    <script src='core/scripts/js/issue-receive-book.js'></script>

<?php require('views/partials/footer.partialview.php'); ?>