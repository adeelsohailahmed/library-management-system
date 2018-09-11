<?php 
    require("partials/header.partialview.php"); 
    require("partials/navigation.partialview.php");

    if (!(empty($_SESSION["addBookSuccess"])))
    {
        echo <<< EOD
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Book "{$_SESSION['addBookSuccess']}" has been added successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>
EOD;

        $_SESSION["addBookSuccess"] = null;
    }

    if (!(empty($_SESSION["issue_success"])))
    {
        echo <<< EOD
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Book "{$_SESSION['issue_success']}" issued to "{$_SESSION['issue_member']}" successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>
EOD;

        $_SESSION["issue_success"] = null;
        $_SESSION["issue_member"] = null;
    }

    if (!(empty($_SESSION["received_book_name"])))
    {
        echo <<< EOD
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Book "{$_SESSION['received_book_name']}" received from "{$_SESSION['received_book_member']}" successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>
EOD;

        $_SESSION["received_book_name"] = null;
        $_SESSION["received_book_member"] = null;
    }

    if (!(empty($_SESSION["firstTimeViewingBook"])))
    {
        echo <<< EOD
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            You can search and/or filter books by book's name, author, genre, language, or shelf name. <br><br>
            To change the ordering of books, click on the column name you wish to order your books with. <br><br>
            You can also order the books by multiple columns. First click on the main column you wish to order your books with, 
            then hold shift and click on the secondary column you wish to order your books with, and so on. <br><br>
            Ordering can be applied to searched/filtered books too.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>
EOD;

        $_SESSION["firstTimeViewingBook"] = null;
    }
?>

   <div class="container">
        <h1 class="text-light text-center pt-5 pb-5">List of Books</h1>
        <!-- <div class="form-group row justify-content-end">
            <label for="search-filter" class="col-sm-4 col-form-label text-light text-right">Search or Filter by</label>
            <div class="col-sm-6">
                <input type="text" class="form-control text-center" id="search-filter" placeholder="any entry of any column like name, author etc">
            </div>
        </div>-->
            <?php require("controllers/Book_Listing.php");?>
    </div>


<?php require('core/scripts/necessary-scripts.php');?>

<script src="core/scripts/js/book-listing.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>


<?php
require('partials/footer.partialview.php');
?>