<?php

session_start();
if (empty($_SESSION))
{
    header("Location: /library-management/");
}

else require("views/about.view.php");


?>