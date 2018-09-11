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


$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();



$queryBooks = $connection->prepare('SELECT COUNT(*) FROM book');
$queryBooks->execute();


if ($queryBooks->fetchColumn() > 0)
{
    require('core/scripts/php/fetch-book-listing.php');
}
else{
    
    echo "<br/><br/><br/><br/><br/>";
    echo "<h3 class='text-light'>You haven't added any book yet. Click on 'Add New Book' to start adding books now.</h4>";
}
?>