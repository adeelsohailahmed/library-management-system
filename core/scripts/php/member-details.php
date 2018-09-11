<?php

$viewMember = $connection->prepare('SELECT * FROM members WHERE name = :member_name AND cnic = :cnic');

$viewMember->bindParam(":member_name", $member_name);
$viewMember->bindParam(":cnic", $cnic);

$viewMember->execute();

$columnNames = array_keys($viewMember->fetch(PDO::FETCH_ASSOC));

$viewMember->execute();

$memberDetails = $viewMember->fetch(PDO::FETCH_NUM);

$columnNames[2] = "CNIC No";
$columnNames[3] = str_replace("_", " ", $columnNames[3]);

$_SESSION["member_id"] = $memberDetails[0];
$delete_member_name = urlencode($memberDetails[1]);



$connection = BooksDatabaseConnection::ConnectTo_BooksDatabase();
//Fetching Books Issued By The Above Member
$issuedCopies = $connection->prepare('SELECT COUNT(*) FROM issued WHERE issued_to = ? AND issued_to_cnic = ?');
$issuedCopies->execute([$member_name, $cnic]);
$issuedCopies = (int)$issuedCopies->fetchColumn();

echo "\n<table id='memberDetailsTable' class='table table-light table-striped table-bordered w-100'>\n";

for ($i = 1; $i <= 3; $i++)
{
    echo "  <tr>\n";
    echo '      <th class="font-weight-bold w-50" scope="row">' . ucwords($columnNames[$i]) . ':</th>';
    if ($i != 3) echo '<td class="memberInfo">' . $memberDetails[$i] . '</td>';
    else echo '<td class="memberInfo">'. date('jS F, Y', strtotime($memberDetails[$i])) . '</td>';
    echo "\n  </tr>\n";
}
    echo "  <tr>
                <th class='font-weight-bold w-50' scope='row'>No. of Issued Books:</th>
                <td class='memberInfo'>$issuedCopies</td>
    </tr>";

echo '</table>';
?>

                <div class="d-flex my-3 justify-content-around">
                <a class="btn btn-info" role="button" href="edit-member?cnic=<?=urlencode($memberDetails[2]);?>">Edit Member Info</a>
                <button class="btn btn-danger" type="button" data-toggle="modal" data-target="#deleteMemberModalCenter">Delete Member</button>
                </div>
<br>
<h4 class="text-white text-center">Books Issued to <?=$member_name?></h4>
<br>
<table id='issuedBooksTable' class='table table-light table-striped table-bordered'>
    <thead class='thead-dark'>
        <th scope="col">No</th>
        <th scope="col">Name</th>
        <th scope="col">Author</th>
        <th scope="col">Shelf</th>
        <th scope="col">Issue Date</th>
        <th scope="col">Return Date</th>
        <th scope="col">Issued By</th>
        <th scope="col">Receive Book</th>
    </thead>
    <tbody>
    <?php
        $issuedCopiesDetails = $connection->prepare('SELECT book_name, author, shelf, issue_date, return_date, issued_by FROM issued WHERE issued_to = ? AND issued_to_cnic = ?');
        $issuedCopiesDetails->execute([$member_name, $cnic]);

        $issuedCopiesDetails = $issuedCopiesDetails->fetchAll(PDO::FETCH_NUM);

        for ($i = 0; $i < $issuedCopies; $i++)
        {
            $num = $i + 1;
            echo "<tr>";
            echo "<td>$num</td>";
            for ($j = 0; $j <= 5; $j++)
            {
                if ($j == 3 || $j == 4) echo "<td>".date('jS F, Y', strtotime($issuedCopiesDetails[$i][$j]))."</td>";
                else echo "<td>{$issuedCopiesDetails[$i][$j]}</td>";
                
            }
            echo "<td><a class='btn btn-primary' href='issue-receive-book?receive=1&name=".urlencode($issuedCopiesDetails[$i][0])."&member=".urlencode($memberDetails[2])."'>Receive</a></td>";
            echo "</tr>";
        }
    ?>
    </tbody>
</table>