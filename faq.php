<?php

session_start();
if (empty($_SESSION))
{
    header("Location: /library-management/");
}

else require("views/faq.view.php");


?>