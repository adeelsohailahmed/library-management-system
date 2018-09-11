<?php

session_start();
if (empty($_SESSION))
{
    header("Location: /library-management/");
}

else require("views/add_member.view.php");


?>