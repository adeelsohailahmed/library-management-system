<?php

require '../core/connection.php';

$connection = UsersDatabaseConnection::ConnectTo_UserDatabase();

$unclaimedAccounts = $connection->prepare("SELECT COUNT(*) FROM librarians WHERE account_activated = 0");
$unclaimedAccounts->execute();

if ($unclaimedAccounts->fetchColumn() > 0)
{
    $unclaimedAccounts = $connection->prepare("DELETE FROM librarians WHERE account_activated = 0");
    $unclaimedAccounts->execute();
    echo "Unclaimed Accounts Successfully Deleted. <a href='/library-management/'>Click here to go back to main page</a>";
}

else echo "No unclaimed accounts found in the database. <a href='/library-management/'>Click here to go back to main page</a>";


?>