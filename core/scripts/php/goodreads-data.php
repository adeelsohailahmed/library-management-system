<?php

$key = 'nmwTDSMVpZ34iudm4Vsw';

$book_url = 'https://www.goodreads.com/search/index.xml?key='.$key.'&q='.$book_name;

$xml = simplexml_load_file($book_url);


if ($xml->search->{'total-results'} > 0)
{

    $result = $xml->search->results->work->best_book;


    $name = $result->author->name;
    $author_id = $result->author->id;
    $book_name = $result->title;
    $book_id = $result->id;


    $author_url = 'https://www.goodreads.com/author/show/'.$author_id.'?format=xml&key='.$key;

    $author_xml = simplexml_load_file($author_url);

    $author_img_url = $author_xml->author->image_url;

    $morebooks = array();

    foreach ($author_xml->author->books->book as $book)
    {
        $morebooks[] = $book->title;
    }

}


else
{
    $name = "Author Not Found";
    $author_img_url = "#";
    $author_xml = null;
}


?>