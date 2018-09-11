<?php 
    require("partials/header.partialview.php"); 
    require("partials/navigation.partialview.php");

    if (!(empty($_SESSION["addMemberSuccess"])))
    {
        echo <<< EOD
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Member "{$_SESSION['addMemberSuccess']}" has been added successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>
EOD;

        $_SESSION["addMemberSuccess"] = null;
    }

    if (!(empty($_SESSION["editMemberSuccess"])))
    {
        echo <<< EOD
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            Details of member "{$_SESSION['editMemberSuccess']}" have been changed successfully.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
        </div>
EOD;

        $_SESSION["editMemberSuccess"] = null;
    }

    if (!(empty($_SESSION["duplicateCNIC"])))
{
    echo <<< EOD
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        Details of member "{$_SESSION['duplicateMember']}" can't be added, because a member holding CNIC No. {$_SESSION['duplicateCNIC']} exists already.
        Check the listing below for more information.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">&times;</button>
    </div>
EOD;

    $_SESSION["duplicateMember"] = null;
    $_SESSION["duplicateCNIC"] = null;
}
?>

   <div class="container">
        <h1 class="text-light text-center pt-5 pb-5">List of Members</h1>

            <?php require("controllers/Members_Listing.php");?>
    </div>


<?php require('core/scripts/necessary-scripts.php');?>

<script src="core/scripts/js/members-listing.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>


<?php
require('partials/footer.partialview.php');
?>