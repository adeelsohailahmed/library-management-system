<?php

require ("../core/connection.php");

//echo "<p>Hurrah</p>";
//echo($_POST["inputEmail"]);

$email = $_POST["inputEmail"];

$email = filter_var($email, FILTER_SANITIZE_EMAIL);

if (filter_var($email, FILTER_VALIDATE_EMAIL))
{
    $connection = UsersDatabaseConnection::ConnectTo_UserDatabase();

    $statement = $connection->prepare('SELECT COUNT(email) FROM librarians WHERE email LIKE :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetchColumn();

    if ($result > 0) echo 1;
    else echo 0;
}

else echo '-1';
?>