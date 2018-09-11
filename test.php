<?php

echo "Hello ";
 
if (!empty($_GET["name"])) $book_name = urlencode($_GET["name"]);
else header("Location: /library-management/");

$key = 'nmwTDSMVpZ34iudm4Vsw';

$url = 'http://www.goodreads.com/search/index.xml?key='.$key.'&q='.$book_name;

echo $url;

$xml = simplexml_load_file($url);

$result = $xml->search->results->work->best_book;


$name = $result->author->name;
$author_id = $result->author->id;
$book_name = $result->title;
$book_id = $result->id;

echo $name . "\n Your ID is: ". $author_id ." Your Book ID is: ". $book_id ."<br> <br>";

// foreach ($xml->author->books->Children() as $child)
//   {
//   echo $child->title_without_series . "<br>";
//   }

$iframe_url = 'http://www.goodreads.com/api/reviews_widget_iframe?did=37911&format=html&header_text=Goodreads+reviews+for+'.urlencode($book_name).'&book_language='.$book_id.'&links=660&min_rating=&num_reviews=&review_back=ffffff&stars=000000&stylesheet=&text=444';

print_r($iframe_url);

$author_url = 'https://www.goodreads.com/author/show/'.$author_id.'?format=xml&key='.$key;

$author_xml = simplexml_load_file($author_url);

$author_img_url = $author_xml->author->image_url;

$morebooks = array();

foreach ($author_xml->author->books->book as $book)
{
    echo $book->title;
}



?>




<style>
  #goodreads-widget {
    font-family: georgia, serif;
    padding: 18px 0;
    width:575px;
  }
  #goodreads-widget h1 {
    font-weight:normal;
    font-size: 16px;
    border-bottom: 1px solid #BBB596;
    margin-bottom: 0;
  }
  #goodreads-widget a {
    text-decoration: none;
    color:#660;
  }
  iframe{
    background-color: #ffffff;
  }
  #goodreads-widget a:hover { text-decoration: underline; }
  #goodreads-widget a:active {
    color:#660;
  }
  #gr_footer {
    width: 100%;
    border-top: 1px solid #BBB596;
    text-align: right;
  }
  #goodreads-widget .gr_branding{
    color: #382110;
    font-size: 11px;
    text-decoration: none;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  }
</style>


<div id="goodreads-widget">
  <div id="gr_header"><h1><a rel="nofollow" href="https://www.goodreads.com/book/show/<?=$book_id?>">Goodreads reviews for <?=$book_name?></a></h1></div>
  <iframe id="the_iframe" src="about:blank" width="575" height="400" frameborder="0"></iframe>

</div>


<script>

  window.onload = function()
  {
    document.getElementsByTagName('iframe')[0].setAttribute("src", "<?=$iframe_url?>");
  };

</script>

    