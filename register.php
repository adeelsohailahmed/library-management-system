<?php
session_start();
if (!empty($_SESSION["user_name"]))
{
    header("Location: book-listing");
}
require('views/register.view.php');


?>