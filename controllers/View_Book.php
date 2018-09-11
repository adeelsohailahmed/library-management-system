<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (empty($_SESSION))
{
    header("Location: /library-management/");
}

require ('core/connection.php');

$user_id = 0;
$user_name = "";
$book_name = "";

if (!empty($_SESSION))
{
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}

if (!empty($_GET["name"])) 
{
    $book_name = trim($_GET["name"], '"-/\\;');
    $book_name = strip_tags($book_name);
}

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();


$viewBook = $connection->prepare('SELECT COUNT(*) FROM book WHERE name LIKE :book_name');

$viewBook->bindParam(":book_name", $book_name, PDO::PARAM_STR);

$viewBook->execute();


if ($viewBook->fetchColumn() > 0)
{
    require('core/scripts/php/book-details.php');
    require('core/scripts/php/goodreads-data.php');
}
else{

  echo header("Location: /library-management/");;
}

?>