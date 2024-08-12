<?php

$loader = require 'vendor/autoload.php';

use GuzzleHttp\client;

$client = new Client();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
$URL = 'https://openlibrary.org/search.json?q=' . $_POST['name'];


$res = $client->get($URL);

$data = json_decode($res->getBody()->getContents());

$bookTitle = $_POST['name'];


//var_dump($data);


//echo '<pre>';
//var_dump($data->docs[0]->author_name[0]);


$bookAuthor = $data->docs[0]->author_name[0];

$BookCover = 'https://covers.openlibrary.org/b/id/' . $data->docs[0]->cover_i . '-L.jpg';

$publishYear = $data->docs[0]->first_publish_year;

$pagesCount = $data->docs[0]->number_of_pages_median;

}