function authorBio()
{

    if (!($("#author-biography").hasClass("collapsed"))){
        $("#author-biography").html("Show Biography");
        $(this).removeClass("bioButtonReversed");
        $(this).addClass("bioButton");
    } 
    else {
        $("#author-biography").html("Hide Biography");
        $(this).removeClass("bioButton");
        $(this).addClass("bioButtonReversed");
    }

}

var bookDetails = [];

function getBookDetails()
{
    $("#bookDetailsTable .bookInfo").each(function()
    {
        bookDetails.push($(this).html());
    });
}

function deletetheBook()
{
    $("#deleteBookModalCenter").modal("hide");
    getBookDetails();
    $.post('ajax-scripts/Delete_Book.php', {bookDetails: bookDetails})
        .done (function ( data ){
            if (data === "1")
            {
                alert("Book '"+ bookDetails[0]+"' has been successfully deleted.");
                
                    window.location.replace("/library-management/book-listing.php");
                
            }
        });
}



$("#author-biography").on("click", authorBio);
