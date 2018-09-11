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


$connection = UsersDatabaseConnection::ConnectTo_UserDatabase();
$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

$id = strip_tags($_POST["member_id"]);
$name = ucwords(strip_tags($_POST["name"]));
$cnic = trim(strip_tags($_POST["cnic"], '"-/\\;'));
$cnic = str_replace(['-', '.', '+', '*', ' '], "", $cnic);
$registration_date = strip_tags($_POST["registration_date"]);


$cnicExists = $connection->prepare('SELECT COUNT(*) FROM members WHERE cnic = ?');
$cnicExists->execute([$cnic]);
$cnicExists = (int) $cnicExists->fetchColumn();

$editMember = $connection->prepare('SELECT id FROM members WHERE cnic = ?');
$editMember->execute([$cnic]);
$editMember = (int) $editMember->fetchColumn();


if ($cnicExists > 0 && ($editMember !== (int)$id))
{
    $_SESSION["duplicateMember"] = $name;
    $_SESSION["duplicateCNIC"] = $cnic;
    header("Location: /library-management/members-listing");
    exit();
}

$editMember = $connection->prepare('UPDATE members SET name = ?, cnic = ?, registration_date = ? WHERE id = ?');
$editMember->execute([$name, $cnic, $registration_date, $id]);

$_SESSION["editMemberSuccess"] = $name;

header("Location: /library-management/members-listing");

?>
