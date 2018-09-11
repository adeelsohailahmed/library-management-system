<?php
require('views/partials/header.partialview.php') ;
require('views/partials/navigation.partialview.php');
?>

    <div class='container bg-light mt-5 pt-4 pb-5 rounded'>
        <div>
            <h2>Add a new book</h2>
            <hr/>
            <form id='addBook-form' class='mt-4 needs-validation' method='post' action='controllers/Add_Book.php' novalidate>
                <div class='form-group row'>
                    <label for='bookName' class='col-md-2 offset-md-2'>Book Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='bookName' name='bookName' required>
                </div>
                <div class='form-group row'>
                    <label for='authorName' class='col-md-2 offset-md-2'>Author Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='authorName' name='authorName' required>
                </div>
                <div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>Genre:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='genreName' name='genreName' required>
                </div>
                <div class='form-group row'>
                    <label for='book_language' class='col-md-2 offset-md-2'>Book Language:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='book_language' name='book_language' required>
                </div>
                <div class='form-group row'>
                    <label for='shelf' class='col-md-2 offset-md-2'>Shelf Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='shelf' name='shelf' required>
                </div>
                <div class='form-group row'>
                    <label for='total_copies' class='col-md-2 offset-md-2'>Total No. of Copies:</label>
                    <input class='form-control col-md-2 ml-1' type='number' id='total_copies' name='total_copies' min='1' value='1' required>
                </div>                           
                <div class='col-md-4 offset-md-4'>
                    <div class='d-flex justify-content-between'>
                        <button type='submit' class='btn btn-primary'>Add New Book</button>
                        <button type='button' onclick='location.href="book-listing.php";' class='btn btn-danger'>Go Back</button>
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