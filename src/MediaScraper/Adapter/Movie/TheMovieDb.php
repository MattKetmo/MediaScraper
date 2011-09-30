<?php

namespace MediaScraper\Adapter\Movie;

use MediaScraper\Adapter;
use Symfony\Component\DomCrawler\Crawler;

class TheMovieDb implements Adapter
{
    const SEARCH_URL = "http://api.themoviedb.org/2.1/Movie.search/%s/xml/%s/%s";
    const INFO_URL   = 'http://api.themoviedb.org/2.1/Movie.getInfo/%s/xml/%s/%s';
    const IMDB_URL   = 'http://api.themoviedb.org/2.1/Movie.imdbLookup/%s/xml/%s/%s';
    
    protected $apikey;
    protected $lang;
    
    public function __construct($apikey, $lang = 'en')
    {
        $this->apikey = $apikey;
        $this->lang = $lang;
    }
    
    public function getSearchUrl($keys)
    {
        // TODO
    }
    
    public function getFindUrl($keys)
    {
        // TODO
    }
    
    public function getSearchResult(Crawler $crawler)
    {
        // TODO
    }
    
    public function getDetails(Crawler $crawler)
    {
        // TODO
    }
}