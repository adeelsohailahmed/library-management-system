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

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$IssueReceive = (int)$_POST["IssueReceive"];
$member = urldecode($_POST["member"]);
$cnic = urldecode($_POST["cnic"]);


if (empty($_POST["bookName"]))
{
    if ($IssueReceive <= 0) $bookList = $connection->prepare('SELECT name from book');
    else {
        $bookList = $connection->prepare('SELECT book_name FROM issued WHERE issued_to LIKE :member AND issued_to_cnic = :cnic');
        $bookList->bindParam(":member", $member);
        $bookList->bindParam(":cnic", $cnic);
    }

    $bookList->execute();
    $bookList = $bookList->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($bookList);
}

else
{
    $bookName = urldecode($_POST["bookName"]);

    if ($IssueReceive <= 0)
    {
        $bookDetail = $connection->prepare('SELECT author, genre, book_language, shelf, total_copies, issued_copies FROM book WHERE name = :bookName');
        $bookDetail->bindParam(":bookName", $bookName);
    }

    else 
    {
        $detail_sql = 
        "
            SELECT book.author, book.book_language, book.shelf, issued.issue_date, issued.return_date FROM book 
            INNER JOIN issued ON book.id = issued.book_id
            WHERE issued.issued_to LIKE :member AND issued.issued_to_cnic = :cnic AND issued.book_name LIKE :bookName
        ";
        $bookDetail = $connection->prepare($detail_sql);
        $bookDetail->bindParam(":member", $member);
        $bookDetail->bindParam(":cnic", $cnic);
        $bookDetail->bindParam("bookName", $bookName);
    }

    $bookDetail->execute();

    $bookDetail = $bookDetail->fetch(PDO::FETCH_ASSOC);
    echo json_encode($bookDetail);

}