<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (empty($_SESSION))
{
    header("Location: /library-management/");
}

require ('../core/connection.php');


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
$IssueReceive = $_POST["IssueReceive"];
$member = $_POST["member"];
$cnic = $_POST["cnic"];
$book_name = $_POST["bookName"];
$author =   $_POST["authorName"];
$book_language = $_POST["book_language"];
$shelf = $_POST["shelf"];
$total_copies = $_POST["total_copies"];
$issued_copies = $_POST["issued_copies"];


$issue_date = $_POST["issue_date"];
$return_date = $_POST["return_date"];

$IssueReceive = (int)strip_tags($IssueReceive);
$member = strip_tags($member);
$cnic = strip_tags($cnic);
$book_name = strip_tags($book_name);
$author = strip_tags($author);
$shelf = strip_tags($shelf);
$total_copies = (int)strip_tags($total_copies);
$issued_copies = (int)strip_tags($issued_copies);

$issue_date = strip_tags($issue_date);
$return_date = strip_tags($return_date);

$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );


if ($IssueReceive <= 0)
{

    $dateReturn = new DateTime($return_date);
    $dateIssue = new DateTime($issue_date);

    if ($dateReturn < $dateIssue)
    {
        $_SESSION["date_error"] = $book_name;
        header('Location: /library-management/issue-receive-book?name='.urlencode($book_name));
        exit();    
    }


    if ($issued_copies < $total_copies)
    {
        $bookExists = $connection->prepare('SELECT COUNT(*) FROM issued WHERE book_name = :book_name AND issued_to = :member AND issued_to_cnic = :cnic');
        $bookExists->bindParam(":book_name", $book_name);
        $bookExists->bindParam(":member", $member);
        $bookExists->bindParam(":cnic", $cnic);
    
        $bookExists->execute();

        if ($bookExists->fetchColumn() > 0)
        {
            $_SESSION["already_issued_book"] = $book_name;
            $_SESSION["already_issued_member"] = $member . ' (CNIC: ' . $cnic . ')';

            header('Location: /library-management/issue-receive-book');
            exit();
        }
        else
        {
            $bookid = $connection->prepare('SELECT id FROM book WHERE name LIKE :book_name AND author LIKE :author AND shelf LIKE :shelf');

            $bookid->bindParam(":book_name", $book_name);
            $bookid->bindParam(":author", $author);
            $bookid->bindParam(":shelf", $shelf);

            $bookid->execute();

            $bookid = $bookid->fetch(PDO::FETCH_ASSOC);

            $bookid = (int)$bookid["id"];

            $issueBook = $connection->prepare('INSERT into issued (id, book_id, book_name, author, shelf, issued_to, issued_to_cnic, issue_date, return_date, issued_by) VALUES (null, :bookid, :book_name, :author, :shelf, :member, :cnic, :issue_date, :return_date, :user_name)');

            $issueBook->bindParam(":bookid", $bookid);
            $issueBook->bindParam(":author", $author);
            $issueBook->bindParam(":book_name", $book_name);
            $issueBook->bindParam(":author", $author);
            $issueBook->bindParam(":shelf", $shelf);
            $issueBook->bindParam(":member", $member);
            $issueBook->bindParam(":cnic", $cnic);
            $issueBook->bindParam(":issue_date", $issue_date);
            $issueBook->bindParam(":return_date", $return_date);
            $issueBook->bindParam(":user_name", $user_name);

            $issueBook->execute();

            $issued_copies += 1;

            $update_issued_copies = $connection->prepare('UPDATE book SET issued_copies = :issued_copies WHERE id = :bookid AND name = :book_name');

            $update_issued_copies->bindParam(":issued_copies", $issued_copies);
            $update_issued_copies->bindParam(":bookid", $bookid);
            $update_issued_copies->bindParam(":book_name", $book_name);

            $update_issued_copies->execute();

            $_SESSION["issue_success"] = $book_name;
            $_SESSION["issue_member"] = $member . ' (CNIC: ' . $cnic . ')';
            header('Location: /library-management/');
            exit();
         }
    }

    else 
    {
        $_SESSION["issue_book_name"] = $book_name;
        header('Location: /library-management/issue-receive-book');
        exit();
    }
}

else 
{
    $bookExists = $connection->prepare('SELECT COUNT(*) FROM issued WHERE book_name = :book_name AND issued_to = :member AND issued_to_cnic = :cnic');
    $bookExists->bindParam(":book_name", $book_name);
    $bookExists->bindParam(":member", $member);
    $bookExists->bindParam(":cnic", $cnic);

    $bookExists->execute();

    if ($bookExists->fetchColumn() > 0)
    {
        $bookid = $connection->prepare('SELECT book_id FROM issued WHERE book_name = :book_name AND issued_to = :member AND issued_to_cnic = :cnic');
        $bookid->bindParam(":book_name", $book_name);
        $bookid->bindParam(":member", $member);
        $bookid->bindParam(":cnic", $cnic);
        
        $bookid->execute();
        $bookid = (int)$bookid->fetchColumn();

        $ReceiveBook = $connection->prepare('DELETE FROM issued WHERE book_id = :book_id AND issued_to = :member AND issued_to_cnic = :cnic');
        $ReceiveBook->bindParam(":book_id", $bookid);
        $ReceiveBook->bindParam(":member", $member);
        $ReceiveBook->bindParam(":cnic", $cnic);

        $ReceiveBook->execute();

        $issued_copies = $connection->prepare('SELECT issued_copies FROM book WHERE id = :bookid');
        $issued_copies->bindParam(":bookid", $bookid);
        $issued_copies->execute();
        
        $issued_copies = (int)$issued_copies->fetchColumn();
        
        $issued_copies -= 1;

        $update_issued_copies = $connection->prepare('UPDATE book SET issued_copies = :issued_copies WHERE id = :bookid AND name = :book_name');

        $update_issued_copies->bindParam(":issued_copies", $issued_copies);
        $update_issued_copies->bindParam(":bookid", $bookid);
        $update_issued_copies->bindParam(":book_name", $book_name);

        $update_issued_copies->execute();

        $_SESSION["received_book_name"] = $book_name;
        $_SESSION["received_book_member"] = $member . ' (CNIC: ' . $cnic . ')';

        header("Location: /library-management/");
    } 
}
?>