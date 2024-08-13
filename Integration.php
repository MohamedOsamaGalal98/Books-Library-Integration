<?php

$loader = require 'vendor/autoload.php';

use GuzzleHttp\client;

$client = new Client();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
$URL = 'https://openlibrary.org/search.json?q=' . $_POST['name'];


$res = $client->get($URL);

$data = json_decode($res->getBody()->getContents());

//$bookTitle = $_POST['name'];


//var_dump($data);
//var_dump($data->docs[0]->author_name[0]);



$bookTitle = array_column($data->docs, 'title');
$count = count($bookTitle);
//print_r($bookTitle);


$bookAuthor = array_column($data->docs, 'author_name');
//print_r($bookAuthor);

//$bookAuthor = $data->docs[0]->author_name;

$cover = array_column($data->docs, 'cover_i');
$coverNum = count($cover);
//print_r($cover);

  for($i = 0; $i < $coverNum; $i++) {

//foreach ($cover as $value) {
	$BookCover[$i] = 'https://covers.openlibrary.org/b/id/' . $cover[$i] . '-L.jpg';
}


//$BookCover = 'https://covers.openlibrary.org/b/id/' . $data->docs[0]->cover_i . '-L.jpg';

$publishYear = array_column($data->docs, 'first_publish_year');
//print_r($publishYear);

//$publishYear = $data->docs[0]->first_publish_year;


$pagesCount = array_column($data->docs, 'number_of_pages_median');
//print_r($pagesCount);

//$pagesCount = $data->docs[0]->number_of_pages_median;

//}


}

