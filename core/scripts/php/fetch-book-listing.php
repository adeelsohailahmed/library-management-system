<?php

    $queryBooks = $connection->prepare('SELECT * FROM book');
    $queryBooks->execute();

    echo '
    <table id="book-table" class="table tablesorter-bootstrap table-light table-striped table-bordered table-responsive-sm table-hover text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Book Name</th>
                <th scope="col">Author</th>
                <th scope="col">Genre</th>
                <th scope="col">Language</th>
                <th scope="col">Shelf Name</th>
                <th scope="col">Total Copies</th>
                <th scope="col">Copies Issued</th>
                <th scope="col">Copies Left</th>
            </tr>
        </thead>
        <tbody>    ';

    $num = 1;
    foreach($queryBooks->fetchAll(PDO::FETCH_NUM) as $row)
    {
        //var_dump($row);
       echo "
            <tr>
            ";
            for ($i = 0; $i <= 8; $i++)
            {
                switch($i)
                {
                    case 0:
                        echo "<th scope='row'>". $num ."</th>";
                        $num += 1;
                        break;
                    case 1:
                        echo "<td><a href='view-book?name=".urlencode($row[$i])."'>". $row[$i] . "</a></td>";
                        break;
                    case 6:
                        $total_copies =  $row[$i];
                        echo "<td>". $row[$i] . "</td>";
                        break;                   
                    case 7:
                        $issued_copies = $row[$i];
                        echo "<td>". $row[$i] . "</td>";
                        break;
                    case 8:
                        $remaining_copies = $total_copies - $issued_copies;
                        echo "<td>". $remaining_copies . "</td>";
                        break;
                    default:
                        echo "<td>". $row[$i] . "</td>";
                        break;
                }
                
            }
       echo "</tr>";    
       
    }
    echo "
        </tbody>
    </table>";


?>