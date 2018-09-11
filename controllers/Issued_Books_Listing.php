<?php

if (session_status() == PHP_SESSION_NONE)
{
    session_start();
}

require ('core/connection.php');

$user_name = "";
$user_id = 0;

if (!empty($_SESSION))
{
    $user_id = $_SESSION["user_id"];
    $user_name = $_SESSION["user_name"];
}


$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();


$queryIssuedBooks = $connection->prepare('SELECT COUNT(*) FROM issued');
$queryIssuedBooks->execute();


if ($queryIssuedBooks->fetchColumn() > 0)
{
    require('core/scripts/php/fetch-issued-books-listing.php');

    $queryIssuedBooks = $connection->prepare('SELECT * FROM issued');
    $queryIssuedBooks->execute();

    $queryIssuedBooks = $queryIssuedBooks->fetchAll(PDO::FETCH_NUM);
    
    echo '<table id="issued-books-table" class="table table-light table-striped table-bordered table-responsive-sm table-hover text-center">';
        echo "
            <thead class='thead-dark'>
                <th scope='col'>No.</th>
                <th scope='col'>Name</th>
                <th scope='col'>Author</th>
                <th scope='col'>Shelf</th>
                <th scope='col'>Issued To</th>
                <th scope='col'>Issue Date</th>
                <th scope='col'>Return Date</th>
                <th scope='col'>Issued By</th>
                <th scope='col'>Receive Book</th>
            </thead>
            <tbody>
        ";
    
    $num = 1;
    foreach($queryIssuedBooks as $issuedBook)
    {
        echo "\n    <tr>";
        
        for($i = 1; $i <= 10; $i++)
        {
            switch($i)
            {
                case 1:
                    echo "\n        <td>$num</td>";
                    $num++;
                    break;
                case 2:
                    echo "\n        <td><a href='view-book?name=".urlencode($issuedBook[$i])."'>$issuedBook[$i]</a></td>";
                    break;
                case 6:
                    continue;
                    break;
                case 7:
                    echo "\n        <td>".date('jS F, Y', strtotime($issuedBook[$i]))."</td>";
                    break;
                case 8:
                    echo "\n        <td>".date('jS F, Y', strtotime($issuedBook[$i]))."</td>";
                    break;
                // case 9:
                //     echo "\n    <td>Librarian $issuedBook[$i]</td>";
                //     break;
                case 10:
                    echo "\n        <td><a class='btn btn-primary' href='issue-receive-book?receive=1&name=".urlencode($issuedBook[2])."&member=".urlencode($issuedBook[6])."'>Receive</a></td>";
                    break;
                default:
                    echo "\n        <td>$issuedBook[$i]</td>";
                    break;
            }
            
        }
        echo "\n    </tr>";
    }

    echo "\n    </tbody>";
    echo "\n</table>\n";
}
else{
    
    echo "<br/><br/><br/><br/><br/>";
    echo "<h3 class='text-light'>You haven't issued any book yet. Click on 'Issue / Receive Book' to start issuing members now.</h4>";
}
?>