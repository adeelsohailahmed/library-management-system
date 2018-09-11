<?php 
    require("partials/header.partialview.php"); 
    require("partials/navigation.partialview.php");

?>

   <div class="container">
        <h1 class="text-light text-center pt-5 pb-5">List of Issued Books</h1>

            <?php require("controllers/Issued_Books_Listing.php");?>
    </div>


<?php require('core/scripts/necessary-scripts.php');?>

<script src="core/scripts/js/issued-books-listing.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>


<?php
require('partials/footer.partialview.php');
?>