
<?php
require('views/partials/header.partialview.php') ;
require('views/partials/navigation.partialview.php');

if (!(empty($_SESSION["changesSaved"])))
{
    echo '<script>alert("'.$_SESSION["changesSaved"].'")</script>';
    $_SESSION["changesSaved"] = null;
}

if (!(empty($_SESSION["firstTimeViewingBook"])))
{
    echo <<< EOD
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <b>Tip:</b> If the author shown is not correct, ensure the title of book has been spelled correctly.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
EOD;

    $_SESSION["firstTimeViewingBook"] = null;
}
?>
    <div class="container-fluid h-100 my-5">
   
        <div class="row">
            <div class="col-md-5">
                <h3 class="text-light">Book Details</h3>
                <?php require('controllers/View_Book.php'); ?>
                <div class="d-flex my-3 justify-content-around">
                <a class="btn btn-primary" role="button" href="issue-receive-book?issue=1&name=<?=$shelf_book_name?>">Issue Book</a>
                <a class="btn btn-info" role="button" href="edit-book?name=<?=$shelf_book_name?>">Edit Book Info</a>
                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteBookModalCenter">Delete Book</button>
                </div>
            </div>
            <div class="col-md-6 offset-md-1">

                <h3 class="text-light">Author Details</h3>
                <div class="biography bg-white">
                    <img src=<?=$author_img_url?> class="img img-thumbnail float-right author-photo">
                    <h4 class="pl-2 pt-1"><?=$name?><button id="author-biography" class="btn btn-outline-info btn-lg ml-3 collapsed bioButton" data-toggle="collapse" data-target="#detailsCollapse">Show biography</h4></button>
                    
                    <div class="form-control collapse" id="detailsCollapse">
                    <?php if ($author_xml !== null){
                        if ($author_xml->author->about != '')
                        {
                            echo $author_xml->author->about;
                        }
                        else echo "Author biography was not found on GoodReads.";
                    }
                    ?> 
                    </div>
                </div>

            </div>
        </div>
        <div class="row pt-5 mt-5">
            <div class="col-md-5">
            <h3><a rel="nofollow noopener" href="https://www.goodreads.com/book/show/<?php if ($author_xml !== null) echo $book_id?>" target="_blank" class="text-light">Goodreads reviews for <?=$book_name?></a></h3>
                <div id="goodreads-widget" class="embed-responsive embed-responsive-4by3" >
                        <iframe id="the_iframe" class="embed-responsive-item pl-2" src="about:blank"></iframe>
                </div>
            </div>
            <div class="col-md-6 offset-md-1">
            <?php if ($author_xml !== null)
            {
                echo '<h3 class="text-light">More books by '.$name. '</h3>';
                echo '<div class="bg-light moreBooks">';
                   echo '<div>';      
                                    echo "<table class='table table-striped table-bordered'>";
                                    echo "<thead class='thead-dark'>
                                            <tr>
                                                <th scope='col'>No.</th>
                                                <th scope='col'> Title</th>
                                            </tr>
                                    </thead>";
                                    echo "<tbody>";
                                    if ($author_xml->author->works_count > 1)
                                    {
                                        $no = 1;
                                        foreach ($morebooks as $title)
                                        {
                                            if (urldecode($book_name) != $title)
                                            {
                                                echo "  <tr>";
                                                echo "      <td>".$no."</td>";
                                                $no += 1;
                                                echo "      <td>".$title."</td>";
                                                echo "  </tr>";
                                            }
                                        }
                                    }
                                    else echo "<tr><td colspan='2' class='text-center'>This author only wrote one book (the one which you're currently viewing).</td></tr>";
                                    echo "</tbody>";
                                    echo "</table>";
                            }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteBookModalCenter" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteBookModalLongTitle">Delete the book '<?=urldecode($shelf_book_name)?>'?</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            Careful: Once this action has been taken, it cannot be reversed!
            <br><br>
            Proceed with deleting the book?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button id="#confirmDelete" type="button" onclick="deletetheBook()" class="btn btn-danger">Delete Book</button>
        </div>
        </div>
    </div>
    </div>

<?php require('core/scripts/necessary-scripts.php'); ?>

<script src="core/scripts/js/view-book.js"></script>

<script>
    var $iframeurl = 'https://www.goodreads.com/api/reviews_widget_iframe?did=37911&format=html&header_text=Goodreads+reviews+for+<?=urlencode($book_name)?>+&isbn=+<?=$book_id?>+&links=1D81FF&min_rating=&num_reviews=&review_back=ffffff&stars=000000&stylesheet=&text=444';
    window.onload = $("#the_iframe").attr("src", $iframeurl);
</script>

<?php require('views/partials/footer.partialview.php'); ?>

