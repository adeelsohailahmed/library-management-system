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



$book_id = 0;
$book_name = "";
$author_name = "";
$genre  = "";
$book_language = "";
$read_status = 0;


$user_id = $_SESSION["user_id"];
$user_name = $_SESSION["user_name"];



if (!empty($_POST))
{
    $book_id = $_POST["bookID"];
    $book_name = $_POST["bookName"];
    $author_name = $_POST["authorName"];
    $genre  = $_POST["genreName"];
    $book_language = str_replace("-", "", $_POST["book_language"]);
    $shelf = $_POST["shelf"];
    $total_copies = $_POST["total_copies"];
    $issued_copies = $_POST["issued_copies"];

    if ($total_copies < $issued_copies)
    {
        $total_copies = $issued_copies;
    }

    $connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
    $connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

    $changes = $connection->prepare('UPDATE book SET name = :book_name, author = :author_name, genre = :genre, book_language = :book_language, shelf = :shelf, total_copies = :total_copies WHERE id = :book_id');


    $changes->bindParam(":book_name", $book_name);
    $changes->bindParam(":author_name", $author_name);
    $changes->bindParam(":genre", $genre);
    $changes->bindParam(":book_language", $book_language);
    $changes->bindParam(":shelf", $shelf);
    $changes->bindParam(":total_copies", $total_copies);

    $changes->bindParam(":book_id", $book_id);


    $changes->execute();
    $_SESSION["changesSaved"] = "Changes have been saved successfully!";
    header("Location: /library-management/view-book.php?name=".urlencode($book_name));
}
