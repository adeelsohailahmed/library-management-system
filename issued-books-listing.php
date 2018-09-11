<?php

session_start();
if (empty($_SESSION))
{
    header("Location: /library-management/");
}

else require("views/issued_books_listing.view.php");


?>