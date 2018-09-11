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


if (!empty($_SESSION))
{
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}


$book_name = $_POST["bookName"];
$author =   $_POST["authorName"];
$genre = $_POST["genreName"];
$book_language = $_POST["book_language"];
$shelf = $_POST["shelf"];
$total_copies = $_POST["total_copies"];

$book_name = strip_tags($book_name);
$author = strip_tags($author);
$genre  = strip_tags($genre);
$book_language = strip_tags($book_language);
$shelf = strip_tags($shelf);
$total_copies = (int)strip_tags($total_copies);

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$addBook = $connection->prepare('INSERT INTO book (id, name, author, genre, book_language, shelf, total_copies) VALUES (null, :book_name, :author, :genre, :book_language, :shelf, :total_copies)');

$addBook->bindParam(":book_name", $book_name);
$addBook->bindParam(":author", $author);
$addBook->bindParam(":genre", $genre);
$addBook->bindParam(":book_language", $book_language);
$addBook->bindParam(":shelf", $shelf);
$addBook->bindParam(":total_copies", $total_copies, PDO::PARAM_INT);



$addBook->execute(); 
$_SESSION["addBookSuccess"] = $book_name;

header("Location: /library-management/");

?>

