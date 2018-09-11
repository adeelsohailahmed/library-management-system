<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (empty($_SESSION) && empty($_POST))
{
    header("Location: /library-management/");
}

require ('../core/connection.php');


if (!empty($_SESSION))
{
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}

$name = ucwords(strip_tags($_POST["name"]));
$cnic = trim(strip_tags($_POST["cnic"], '"-/\\;'));
$cnic = str_replace(['-', '.', '+', '*', ' '], "", $cnic);

$registration_date = strip_tags($_POST["registration_date"]);

$connection = UsersDatabaseConnection::ConnectTo_UserDatabase();
$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$addMember = $connection->prepare('SELECT COUNT(*) FROM members WHERE cnic = ?');
$addMember->execute([$cnic]);

if ($addMember->fetchColumn() > 0)
{
    $_SESSION["duplicateMember"] = $name;
    $_SESSION["duplicateCNIC"] = $cnic;
    header("Location: /library-management/add-member");
    exit();
}

$addMember = $connection->prepare('INSERT INTO members (id, name, cnic, registration_date) VALUES (null, ?, ?, ?)');

$addMember->execute([$name, $cnic, $registration_date]);

$_SESSION["addMemberSuccess"] = $name;

header("Location: /library-management/members-listing");

?>

