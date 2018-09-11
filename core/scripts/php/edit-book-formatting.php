<?php

echo <<< EOD

    <div class='container bg-light mt-5 pt-4 pb-5 rounded'>
        <div>
            <h2>Edit book information</h2>
            <hr/>
            <form id='editbook-form' class='mt-4 needs-validation' method='post' action='controllers/Submit_Book_Changes.php' novalidate>
                <div class='form-group row'>
                    <label for='bookName' class='col-md-2 offset-md-2'>Book Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='bookName' name='bookName' value='{$editBook["name"]}'  required>
                </div>
                <div class='form-group row'>
                    <label for='authorName' class='col-md-2 offset-md-2'>Author Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='authorName' name='authorName' value='{$editBook["author"]}' required>
                </div>
                <div class='form-group row'>
                    <label for='genreName' class='col-md-2 offset-md-2'>Genre:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='genreName' name='genreName' value='{$editBook["genre"]}' required>
                </div>
                <div class='form-group row'>
                    <label for='book_language' class='col-md-2 offset-md-2'>Book Language:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='book_language' name='book_language' value='{$editBook["book_language"]}' required>
                </div>
                <div class='form-group row'>
                    <label for='shelf' class='col-md-2 offset-md-2'>Shelf Name:</label>
                    <input class='form-control col-md-4 ml-1' type='text' id='shelf' name='shelf' value='{$editBook["shelf"]}' required>
                </div>
                <div class='form-group row'>
                    <label for='total_copies' class='col-md-2 offset-md-2'>Total No. of Copies:</label>
                    <input class='form-control col-md-2 ml-1' type='number' id='total_copies' name='total_copies' min='1' value='{$editBook["total_copies"]}' required>
                </div>   
                <input type='hidden' name='bookID' value='{$editBook["id"]}'>
                <input type='hidden' name='issued_copies' value='{$editBook["issued_copies"]}'>                
                <div class='col-md-4 offset-md-4'>
                    <div class='d-flex justify-content-between'>
                        <button type='submit' class='btn btn-primary'>Submit Changes</button>
                        <button type='button' onclick='cancelEditing()' class='btn btn-danger'>Cancel Editing</button>
                    </div>
                </div>
            
            </form>
        </div>
    
    
    </div>



    <script src='core/scripts/js/edit-book.js'></script>

EOD;

echo <<< EOD

    <script>
    function cancelEditing() {
    setTimeout(() => {
EOD;
echo        "window.location.replace('/library-management/view-book.php?name=". urlencode($editBook["name"]) . "')";

echo <<< EOD
    }, 300)
    };
    </script>

EOD;
?>