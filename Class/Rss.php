<?php

    namespace  Rss;
	class RSS{

    // url of xml
    private $_url = null;
    private $_error = false;
	private $_logo;
    // content of xml
    private $_feeds;
    // number of item get and display from xml
    private $_limitRss;


	public function __construct($url, $limit = 5){

      if($url = filter_var($url, FILTER_VALIDATE_URL))
      {
        $this->_url = $url;
        $this->_limitRss = (int) $limit;
	    $this->loadFile();
	    $this->setLogoUrl($this->_feeds->channel->image[0]->url);
      }
      else {
        $this->_error = true;
      }
	}

	/**
     * generate input url 
     *
     * @access static
     * @public
     * @param  none
     * @return String 
     */
	public function showInputUrl() : String 
	{
		$input = '<input type="url" id="urlRss" value="'.$this->_url.'" name="rss" readonly>';
		return $input;
	}
	
    /**
     * load xml file rss
     *
     * @access public
     * @public
     * @param  none
     * @return none
     */
    public function loadFile()
    {

      if($this->_error === false)
      {
         $this->_feeds = simplexml_load_file($this->_url);
      }
			else {
				 $this->_error = true;
			}
    }

	/**
	 * get logo html in img balise
	 *
	 * @access public
	 * @public
	 * @param  none
	 * @return html
	 */
	public function getLogoHtml(): string
	{
		if(empty($this->_logo)) return "";
		return '<img src="'.$this->_logo.'" alt="logo"/> ';
	}

	/**
	 * get logo html in img balise
	 *
	 * @access public
	 * @public
	 * @param  none
	 * @return html
	 */
	public function setLogoUrl(string $urlLogo) 
	{
		$this->_logo = $urlLogo;
	}
	
	
    /**
     * transform rss data to html data
     *
     * @access public
     * @public
     * @param  none
     * @return none
     */
    public function getData()
    {
       if(!empty($this->_feeds))
       {
           $data = array();
           $site = $this->_feeds->channel->title;
           $sitelink = $this->_feeds->channel->link;
			
		   echo '<section class="article">';
			   $i = 0;
			   foreach ($this->_feeds->channel->item as $item)
			   {
				// limit
				if($i > $this->_limitRss)  break;


				 $data['title'] = $item->title;
				 $data['link'] = $item->link;
				 $data['description'] = $item->description;
				 $data['postDate'] = $item->pubDate;
				 $data['pubDate'] = date('D, d M Y',strtotime( $data['postDate']));

				 $this->display($data);
				 $i++;

			   }
             echo '</section>';
      }
      else {
          $this->_error = true;
      }

	}

  /**
   * get html for display
   *
   * @access public
   * @public
   * @param  $data array
   * @return none
   */
  public function display($data)
  {
     if(!empty($this->_error) && !empty($data) && is_array($data))
     {
       $content = '
                     <article class="post">
                       <header class="post-head">
                         <h2><a class="feed_title" href="'. $data['link'].'">'.$data['title'] .'</a></h2>
                         <span>'. $data['pubDate'] .'</span>
                       </header>
                       <main class="post-content">
                         '.implode(' ', array_slice(explode(' ',  $data['description']), 0, 90)).'...' . '<a href="' . $data['link'] . '">Read more</a>
                       </main>
                     </article>';
				echo $content;
    }
    else
		{
      $this->_error = true;
    }

	}


}
