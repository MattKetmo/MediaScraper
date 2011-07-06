<?php

namespace MediaScraper\Adapter\Movie;

use MediaScraper\Adapter;

class TheMovieDb implements Adapter
{
    protected $apikey;
    
    public function __construct($apikey)
    {
        $this->apikey = $apikey;
    }
    
    function getSearchUrl($name)
    {
        // TODO
    }
    
    function getSearchResult(Crawler $crawler)
    {
        // TODO
    }
    
    function getDetails(Crawler $crawler)
    {
        // TODO
    }
}