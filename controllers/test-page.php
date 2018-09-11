<?php


$book_name = $_POST["bookName"];
$author =   $_POST["authorName"];
$book_language = $_POST["book_language"];
$shelf = $_POST["shelf"];
$total_copies = $_POST["total_copies"];
$issued_copies = $_POST["issued_copies"];
$member = $_POST["member"];
$issue_date = $_POST["issue_date"];
$return_date = $_POST["return_date"];

$book_name = strip_tags($book_name);
$author = strip_tags($author);
$shelf = strip_tags($shelf);
$total_copies = (int)strip_tags($total_copies);
$issued_copies = (int)strip_tags($issued_copies);
$member = strip_tags($member);
$issue_date = strip_tags($issue_date);
$return_date = strip_tags($return_date);


var_dump($member);
var_dump($book_name);
var_dump($issue_date);
var_dump($return_date);