<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (empty($_SESSION) || empty($_POST))
{
    header("Location: /library-management/");
}


require ('../core/connection.php');

$user_name = $_SESSION["user_name"];


$book_id = $_SESSION["book_id"];

$post_book_info = [];
foreach ($_POST["bookDetails"] as $bookInfo)
{
    $post_book_info[] = $bookInfo;
}



$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$deleteBook = $connection->prepare('DELETE FROM book WHERE id = :book_id AND name = :book_name');

$deleteBook->bindParam(":book_id", $book_id);
$deleteBook->bindParam(":book_name", $post_book_info[0]);


$deleteBook->execute();

$deleteBook = $connection->prepare('DELETE FROM issued WHERE book_id = :book_id AND book_name = :book_name');

$deleteBook->bindParam(":book_id", $book_id);
$deleteBook->bindParam(":book_name", $post_book_info[0]);


$deleteBook->execute();

echo 1;
