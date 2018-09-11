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


if (!empty($_SESSION))
{
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}

// if (!empty($_GET["name"]))
// {
//     $book_name = trim($_GET["name"], '"-/\\;');
//     $book_name = strip_tags($book_name);
// }

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$books = $connection->prepare('SELECT name FROM book');
$books->execute();

$books = $books->fetchAll(PDO::FETCH_NUM);

$connection = UsersDatabaseConnection::ConnectTo_UserDatabase();

$members = $connection->prepare('SELECT name, cnic FROM members');
$members->execute();

$members = $members->fetchAll(PDO::FETCH_NUM);

?>