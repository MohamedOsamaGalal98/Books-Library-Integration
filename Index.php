<?php

require 'Integration.php';

?>

<!DOCTYPE html>
<html>
<head>
  <title>Open Library API Results</title>
  <style>
    body{

      font-family: Arial, sans-serif;
      background-color: #f9f9f9;
    }
    .container {
      max-width: 800px;
      margin: 40px auto;
      padding: 20px;
      background-color: #fff;
      border: 1px solid #ddd;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .result-list {
      list-style: none;
      padding: 0;
      margin: 0;
    }
    .result-list li {
      margin-bottom: 20px;
      padding: 20px;
      border-bottom: 1px solid #ccc;
    }
    .result-list li:last-child {
      border-bottom: none;
    }
    .book-cover {
      width: 100px;
      height: 150px;
      margin-right: 20px;
      float: left;
    }
    .book-info {
      overflow: hidden;
    }
    .book-title {
      font-size: 18px;
      font-weight: bold;
      margin-top: 0;
    }
    .book-author {
      font-size: 16px;
      color: #666;
    }
    .book-publication-date {
      font-size: 14px;
      color: #999;
    }
    .pages-count{
      font-size: 14px;
      color: #999;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Open Library API Results</h1>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <head>Book Name</head>
      <input type="text" name="name">
      <input type="submit" value="Search">
       </form>
<?php
if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

  for($i = 0; $i < $count; $i++) {

?>

    <ul class="result-list">
      <li>
        <img src="<?php echo $BookCover[$i]; ?>" alt="<?php echo $bookTitle[$i]; ?>" class="book-cover">
        <div class="book-info">
          <h2 class="book-title"><?php echo $bookTitle[$i]; ?></h2>
          <p class="book-author">
            <?php foreach ($bookAuthor[$i] as $name) {
                      echo $name . '<br>';  
                  } ?></p>
          <p class="book-publication-date"><?php echo $publishYear[$i]; ?></p>
          <p class="pages-count"><?php echo $pagesCount[$i]; ?></p>        
        </div>
      </li>
    </ul>
<?php
      }
    } 
  ?>
  </div>
</body>
</html>
