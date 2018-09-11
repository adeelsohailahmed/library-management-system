<?php

session_start();
if (empty($_SESSION))
{
    header("Location: /library-management/");
}


require('views/edit_book.view.php');


?>