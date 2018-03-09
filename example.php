<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>RSS</title>
    <link rel="stylesheet" href="css/rss.css">
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/old-standard" type="text/css"/> 
  </head>
  <body>

  </body>
</html>

<?php
include_once('Rss.php');
$rss = new Rss('https://www.20minutes.fr/feeds/rss-une.xml', 4);
$rss->getData();
?>
