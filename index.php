<?php
	require __DIR__ . '/vendor/autoload.php';
	use Rss\Rss;
	$url = 'https://www.developpez.com/index/rss';
	$rss = new Rss($url, 6);
?>
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
	<!-- rss input -->
	<section class="grid">
		<section class="url" role="information" >
			<?php echo $rss->showInputUrl();?>
		</section>
		<section class="logo" role="information" >
			<?php echo $rss->getLogoHtml();?>
		</section>
		<main class="main" role="main">
			<?php

			$rss->getData();
			?>
		</main>
	</section>
	<!-- <script src="js/rss.js"></script> -->
  </body>
</html>


