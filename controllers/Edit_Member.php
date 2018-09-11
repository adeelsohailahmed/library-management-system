<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

if (empty($_SESSION) && empty($_POST))
{
    header("Location: /library-management/");
}

require ('core/connection.php');


if (!empty($_SESSION))
{
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}


$connection = UsersDatabaseConnection::ConnectTo_UserDatabase();
$connection->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );

if (!empty($_GET["cnic"])) 
{
    $cnic = trim(strip_tags($_GET["cnic"], '"-/\\;'));
    $cnic = str_replace(['-', '.', '+', '*', ' '], "", $cnic);

}

$connection = UsersDatabaseConnection::ConnectTo_UserDatabase();

$editMember = $connection->prepare('SELECT COUNT(*) FROM members WHERE cnic = :cnic');

$editMember->bindParam(":cnic", $cnic);
$editMember->execute();

if ($editMember->fetchColumn() > 0)
{
    $editMember = $connection->prepare('SELECT * FROM members WHERE cnic = :cnic');
    $editMember->bindParam(":cnic", $cnic);

    $editMember->execute();

    $editMember = $editMember->fetch(PDO::FETCH_ASSOC);
}

else{

    echo "We didn't find any shit whatsoever";
}

?>