<?php

class UsersDatabaseConnection
{
    public static function ConnectTo_UserDatabase()
    {
        $database = require ('config/config-users.php');
        try {
            return new PDO(
                $database['connection'].';dbname='.$database['db_name'],
                $database['user'],
                $database['password']               
            );
        }
        catch (PDOException $e)
        {
            alert('Cannot connect to database. Please try again later.');
        }
    }


}

class BooksDatabaseConnection
{
    public static function ConnectTo_BooksDatabase()
    {
        $database = require ('config/config-books.php');
        try {
            return new PDO(
                $database['connection'].';dbname='.$database['db_name'],
                $database['user'],
                $database['password']               
            );
        }
        catch (PDOException $e)
        {
            alert('Cannot connect to database. Please try again later.');
        }
    }


}

?>