<?php

$viewBook = $connection->prepare('SELECT * FROM book WHERE name LIKE :book_name');

$viewBook->bindParam(":book_name", $book_name, PDO::PARAM_STR);

$viewBook->execute();


$columnNames = array_keys($viewBook->fetch(PDO::FETCH_ASSOC));

$viewBook->execute();

$bookDetails = $viewBook->fetch(PDO::FETCH_NUM);

$columnNames[4] = "Language";
$columnNames[6] = str_replace("_", " ", $columnNames[6]);
$columnNames[7] = str_replace("_", " ", $columnNames[7]);

$_SESSION["book_id"] = $bookDetails[0];
$shelf_book_name = urlencode($bookDetails[1]);
$author_name = urlencode($bookDetails[2]);

echo "\n<table id='bookDetailsTable' class='table table-light table-striped table-bordered'>\n";

for ($i = 1; $i <= 7; $i++)
{
    echo "  <tr>\n";
    echo '      <th class="font-weight-bold" scope="row">' . ucwords($columnNames[$i]) . ':</th>';
    echo '<td class="bookInfo">' . $bookDetails[$i] . '</td>';
    echo "\n  </tr>\n";
}

echo '</table>';

?>