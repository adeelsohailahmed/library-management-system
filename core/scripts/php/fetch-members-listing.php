<?php

    $queryMembers = $connection->prepare('SELECT * FROM members');
    // $queryMembers->bindParam(":user_id", $user_id, PDO::PARAM_STR);
    // $queryMembers->bindParam(":user_name", $user_name, PDO::PARAM_STR);
    $queryMembers->execute();

    echo '
    <table id="members-table" class="table tablesorter-bootstrap table-light table-striped table-bordered table-responsive-sm table-hover text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Name</th>
                <th scope="col">CNIC No.</th>
                <th scope="col">Registration Date</th>
                <th scope="col">Books Issued</th>
            </tr>
        </thead>
        <tbody>    ';

    $num = 1;
    foreach($queryMembers->fetchAll(PDO::FETCH_NUM) as $row)
    {
       echo "
            <tr>
            ";
            for ($i = 0; $i <= 4; $i++)
            {
                switch($i)
                {
                    case 0:
                        echo "<th scope='row'>". $num ."</th>";
                        $num += 1;
                        break;
                    case 1:
                        echo "<td><a href='view-member?name=".urlencode($row[$i])."&cnic=".urlencode($row[2])."'>". $row[$i] . "</a></td>";
                        break;
                    case 3:
                        echo "<td>". date('jS F, Y', strtotime($row[$i])) ."</td>";
                        break;
                    case 4:
                        $booksIssued = $connection2->prepare('SELECT COUNT(*) FROM issued WHERE issued_to = :member AND issued_to_cnic = :cnic');
                        $booksIssued->bindParam(":member", $row[1]);
                        $booksIssued->bindParam(":cnic", $row[2]);
                        $booksIssued->execute();
                        $booksIssued = $booksIssued->fetchColumn();
                        echo "<td> $booksIssued </td>";
                        break;
                    default:
                        echo "<td> $row[$i] </td>";
                        break;
                }
                
            }
       echo "</tr>";    
       
    }
    echo "
        </tbody>
    </table>";


?>