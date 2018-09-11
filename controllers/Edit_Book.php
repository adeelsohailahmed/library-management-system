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

$user_name = "";
$book_name = "";

if (!empty($_SESSION))
{
    $user_name = $_SESSION["user_name"];
}

if (!empty($_GET["name"])) 
{
    $book_name = trim($_GET["name"], '"-/\\;');
    $book_name = strip_tags($book_name);
}

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$editBook = $connection->prepare('SELECT COUNT(*) FROM book WHERE name LIKE :book_name');

$editBook->bindParam(":book_name", $book_name, PDO::PARAM_STR);
$editBook->execute();

if ($editBook->fetchColumn() > 0)
{
    $editBook = $connection->prepare('SELECT * FROM book WHERE name LIKE :book_name');
    $editBook->bindParam(":book_name", $book_name, PDO::PARAM_STR);

    $editBook->execute();

    $editBook = $editBook->fetch(PDO::FETCH_ASSOC);

    require('core/scripts/php/edit-book-formatting.php');
}
else{

  echo "We didn't find any shit whatsoever";
}



?>