
<?php
require('views/partials/header.partialview.php') ;
require('views/partials/navigation.partialview.php');

if (!(empty($_SESSION["changesSaved"])))
{
    echo '<script>alert("'.$_SESSION["changesSaved"].'")</script>';
    $_SESSION["changesSaved"] = null;
}


?>
    <div class="container-fluid mt-5 mx-auto">
        <div class="row">
            <div class="col">
                <h4 class="text-white text-center">Member Details</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <?php require('controllers/View_Member.php'); ?>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteMemberModalCenter" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="deleteMemberModalLongTitle">Delete the member '<?=urldecode($delete_member_name)?>'?</h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
        </div>
        <div class="modal-body">
            Careful: Once this action has been taken, it cannot be reversed!
            <br><br>
            Proceed with deleting the member?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button id="#confirmDelete" type="button" onclick="deletetheMember()" class="btn btn-danger">Delete Member</button>
        </div>
        </div>
    </div>
    </div>

<?php require('core/scripts/necessary-scripts.php'); ?>

<script src="core/scripts/js/view-member.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>



<?php require('views/partials/footer.partialview.php'); ?>

