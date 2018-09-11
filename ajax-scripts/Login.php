<?php

require ("../core/connection.php");


$email = $_POST["inputEmail"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$password = $_POST["inputPass"];

$connection = UsersDatabaseConnection::ConnectTo_UserDatabase();

$emailCheck = $connection->prepare('SELECT COUNT(1) FROM librarians WHERE email LIKE :email AND account_activated = 1');

$emailCheck->bindParam(':email', $email, PDO::PARAM_STR);
$emailCheck->execute();

if ($emailCheck->fetchColumn() > 0)
{
    
    $password_hash = $connection->prepare('SELECT id, user_name, password_hash FROM librarians WHERE email LIKE :email');
    
    $password_hash->bindParam(':email', $email, PDO::PARAM_STR);
    $password_hash->execute();

    $password_hash = $password_hash->fetch(PDO::FETCH_ASSOC);
    $user_name = $password_hash["user_name"];
    $user_id =  $password_hash["id"];
    $password_hash = $password_hash["password_hash"];
    if (password_verify($password, $password_hash))
    {
        
        session_start();
        $_SESSION['user_name'] = $user_name;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['firstTimeViewingBook'] = "true";
        echo 1;
    } 
    else echo 0 ;
}

else
{
    echo 0;
}


?>