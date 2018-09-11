<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

$activation_hash = strip_tags($_GET["activation_id"]);
    
require ('core/connection.php');

$connection = UsersDatabaseConnection::ConnectTo_UserDatabase();

$verifyAccount = $connection->prepare('SELECT COUNT(1) FROM librarians WHERE activation_hash = :activation_hash');
    
$verifyAccount->bindParam('activation_hash', $activation_hash);

$verifyAccount->execute();

if ($verifyAccount->fetchColumn() > 0)
{

    $accountActive = $connection->prepare('SELECT COUNT(1) FROM librarians WHERE account_activated = 0 AND activation_hash = :activation_hash');
    $accountActive->bindParam(':activation_hash', $activation_hash);

    $accountActive->execute();

    if ($accountActive->fetchColumn() > 0)
    {

        $activateAccount = $connection->prepare('UPDATE librarians SET account_activated = 1 WHERE activation_hash = :activation_hash');
        
        $activateAccount->bindParam(':activation_hash', $activation_hash);

        $activateAccount->execute();

        $_SESSION["accountActivated"] = "true";

        header('Location: /library-management/');
    }

    else 
    {
        $_SESSION["accountAlreadyActivated"] = true;

        header('Location: /library-management/');
    }
}

else 
{
    header('Location: /library-management/');
}



?>