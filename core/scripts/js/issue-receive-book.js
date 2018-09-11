function BookDetails(data)
{
    var book = jQuery.parseJSON(data);
    $("#authorName").val(book.author);
    $("#book_language").val(book.book_language);
    $("#shelf").val(book.shelf);
    $("#total_copies").val(book.total_copies);
    $("#issued_copies").val(book.issued_copies);

    if ($("#IssueReceive").val() >=1)
    {
        $("#issue_date").val(book.issue_date);
        $("#return_date").val(book.return_date);
    }
}

function fetchBookDetails()
{
    $.post("ajax-scripts/Book_Details.php", $("#IssueReceive, #member, #cnic, #bookName").serialize())
        .done(BookDetails);
}

function BookList(data)
{
    var list = jQuery.parseJSON(data);
    $("#bookName").html("");
    $.each(list, function(){
        if (this.book_name == undefined) $("#bookName").append("<option value= '" +this.name + "'>" + this.name + "</option>");
        else $("#bookName").append("<option value= '" +this.book_name + "'>" + this.book_name + "</option>");;
    });

    if ($("#bookName").val() == null)
    {
        $("#authorName").val("");
        $("#book_language").val("");
        $("#shelf").val("");
        $("#issue_date").val("");
        $("#bookName").html("<option>No books issued yet</option>");
        $("#issue-receive-button").attr("disabled", true);
    }
    else
    {
        $("#issue-receive-button").removeAttr("disabled");
        fetchBookDetails();
    }
}

function fetchBookList()
{
    $("#cnic").val($("#member option:selected").attr("cnic-no"));
    $.post("ajax-scripts/Book_Details.php", $("#IssueReceive, #member, #cnic").serialize())
    .done(BookList);
}

function IssueReceiveChanges()
{
    if (Number($("#IssueReceive").val()) >= 1)
    {
        $("#issue1").hide();
        $("#issue2").hide();
        $("#issueto").text("Issued To:");
        $("#issue_date").attr("readonly", true);
        $("#return_date").attr("readonly", true);
        $("#issue-receive-button").text("Receive Book");


    }
    else
    {
        $("#issue1").show();
        $("#issue2").show();
        $("#issueto").text("Issue To:");
        $("#issue_date").removeAttr("readonly");
        $("#return_date").removeAttr("readonly");
        $("#issue-receive-button").text("Issue Book");        
    }

    fetchBookList();
}

$(document).ready(function(){
    var url_string = window.location.href; //window.location.href
    var url = new URL(url_string);
    var member = url.searchParams.get("member");
    var bookname = url.searchParams.get("name");
    var receive = url.searchParams.get("receive");
    var issue = url.searchParams.get("issue");
    //console.log(receive, member, bookname);

    if (receive == 1 && member !== null && bookname !== null) 
    {
        $("#IssueReceive").val("1").change();
        $("#member option[cnic-no='" + member + "']").attr('selected', true).change();
        setTimeout(() => {
            $("#bookName").val(decodeURIComponent(bookname)).change();
        }, 200);
    }
    else if (issue == 1 && bookname !== null)
    {
        $("#member").change();
        setTimeout(() => {
            $("#bookName").val(decodeURIComponent(bookname)).change();
        }, 200);
    }
    else IssueReceiveChanges();

    
});
$("#IssueReceive").on('change', IssueReceiveChanges);
$("#member").on('change', fetchBookList);
$("#bookName").on('change', fetchBookDetails);
