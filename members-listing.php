<?php

session_start();
if (empty($_SESSION))
{
    header("Location: /library-management/");
}

else require("views/members_listing.view.php");


?>