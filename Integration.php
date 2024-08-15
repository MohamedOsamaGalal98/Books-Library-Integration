<?php

$loader = require 'vendor/autoload.php';

use GuzzleHttp\client;

$client = new Client();

if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

	$URL = 'https://openlibrary.org/search.json?q=' . $_POST['name'];
	$res = $client->get($URL);
	$data = json_decode($res->getBody()->getContents());

	$responseData = $data->docs;
	$booksData = [];
	foreach($responseData as $index => $book) {
			if (isset($book->title) && isset($book->author_name) && isset($book->first_publish_year) && isset($book->number_of_pages_median)) {
				$booksData[$index]['title'] = $book->title;
				$booksData[$index]['author_name'] = $book->author_name;
				$booksData[$index]['number_of_pages_median'] = $book->number_of_pages_median;
				$booksData[$index]['first_publish_year'] = $book->first_publish_year;

				if (isset($book->cover_i)){
						$booksData[$index]['cover_i'] = 'https://covers.openlibrary.org/b/id/' . $book->cover_i . '-L.jpg';}
				else{$booksData[$index]['cover_i'] = "";}	
		}

	}


}


