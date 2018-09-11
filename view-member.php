<?php

session_start();
if (empty($_SESSION))
{
    header("Location: /library-management/");
}


require('views/view_member.view.php');


?>