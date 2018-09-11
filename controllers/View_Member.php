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

if (!empty($_GET["name"]) && !empty($_GET["cnic"])) 
{
    $member_name = trim($_GET["name"], '"-/\\;');
    $member_name = strip_tags($member_name);

    $cnic = trim($_GET["cnic"], '"-/\\;');
    $cnic = strip_tags($cnic);

}
else
{
    header('Location: /library-management/members-listing');
    exit();
}

$connection = UsersDatabaseConnection::ConnectTo_UserDatabase();


$viewMember = $connection->prepare('SELECT COUNT(*) FROM members WHERE name = :member_name AND cnic = :cnic');

$viewMember->bindParam(":member_name", $member_name);
$viewMember->bindParam(":cnic", $cnic);

$viewMember->execute();


if ($viewMember->fetchColumn() > 0)
{
    require('core/scripts/php/member-details.php');
}
else{

  echo header("Location: /library-management/");;
}

?>