<?php

session_start();
if (empty($_SESSION))
{
    header("Location: /library-management/");
}

else require("views/issue_receive_book.view.php");


?>