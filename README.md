<h1> Rss </h1>
Simple class permit to use rss with url (rss format use is xml).  
<h5>Initialisation</h5>
<code>
        require __DIR__ . '/vendor/autoload.php';<br/>
	use Rss\Rss;<br/>
	$url = 'https://www.developpez.com/index/rss'; <br/>
	$rss = new Rss($url, 6);  
 </code>
<h5>Use</h5>
<p>display input with url use for rss</p>
<code>
   $rss->showInputUrl()
 </code>
 
<p>display logo</p>
<code>
   echo $rss->getLogoHtml();
 </code>
 
 <p>display articles</p>
<code>
   $rss->getData();
 </code>
 
# Contribute
git clone https://github.com/kevin-schmitt/Rss.git

