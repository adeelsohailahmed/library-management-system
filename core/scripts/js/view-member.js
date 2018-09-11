var memberDetails = [];

function getMemberDetails()
{
    $("#memberDetailsTable .memberInfo").each(function()
    {
        memberDetails.push($(this).html());
    });
}

function deletetheMember()
{
    $("#deleteMemberModalCenter").modal("hide");
    getMemberDetails();
    $.post('ajax-scripts/Delete_Member.php', {memberDetails: memberDetails})
        .done (function ( data ){
            if (data === "1")
            {
                alert("Member '"+ memberDetails[0]+"' has been successfully deleted.");
                
                    window.location.replace("/library-management/members-listing.php");
                
            }
            else if (data === "3")
            {
                alert("Member '"+ memberDetails[0] + "' can't be deleted until all the books issued to " + memberDetails[0] + " aren't received first.");
            }
        });
}


$(document).ready(function(){

    if ($(window).width() > 800) $("#issuedBooksTable").DataTable();
    else{
        $("#issuedBooksTable").DataTable({
            responsive: true
        });
        }

    $("#issuedBooksTable_length").addClass("text-white");
    $("#issuedBooksTable_filter label").prepend("Filter or ");
    $("#issuedBooksTable_filter label").addClass("text-white");
    $("#issuedBooksTable_info").addClass("text-white");

    $("#issuedBooksTable_filter label input").attr("placeholder", "e.g. War and Peace");

    $(".dataTables_empty").text("This member hasn't issued any book yet.");
});

