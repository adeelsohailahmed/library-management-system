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

$post_book_info = [];
foreach ($_POST["memberDetails"] as $memberInfo)
{
    $post_member_info[] = strip_tags($memberInfo);
}



$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();

$deleteMember = $connection->prepare('SELECT COUNT(*) FROM issued WHERE issued_to = ? AND issued_to_cnic = ?');
$deleteMember->execute([$post_member_info[0], $post_member_info[1]]);

if ($deleteMember->fetchColumn() > 0)
{
    echo 3;
}
else 
{
    $connection = UsersDatabaseConnection::ConnectTo_UserDatabase();
    $deleteMember = $connection->prepare('DELETE FROM members WHERE name = ? AND cnic = ?');

    $deleteMember->execute([$post_member_info[0], $post_member_info[1]]);
    echo 1;
}
