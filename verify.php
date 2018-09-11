<?php

if (!empty($_GET["activation_id"]))
{
    require ('controllers/Verify_Account.php');
}
else header('Location: /library-management/');

?>