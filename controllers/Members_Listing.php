<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

require ('core/connection.php');

$user_name = "";
$user_id = 0;

if (!empty($_SESSION))
{
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}


$connection = UsersDatabaseConnection::ConnectTo_UserDatabase();

$connection2 = BooksDatabaseConnection::ConnectTo_BooksDatabase();



$queryMembers = $connection->prepare('SELECT COUNT(*) FROM members');
$queryMembers->execute();


if ($queryMembers->fetchColumn() > 0)
{
    require('core/scripts/php/fetch-members-listing.php');
}
else{
    
    echo "<br/><br/><br/><br/><br/>";
    echo "<h3 class='text-light'>You haven't added any member yet. Click on 'Add New Library Member' to start adding members now.</h4>";
}
?>