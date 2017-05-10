<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>RSS</title>
    <link rel="stylesheet" href="css/rss.css">
  </head>
  <body>

  </body>
</html>

<?php
include_once('Rss.php');
$rss = new Rss('http://www.computerworld.com/category/data-center/index.rss', 4);
$rss->getData();
?>
