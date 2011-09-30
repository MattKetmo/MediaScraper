<?php

namespace MediaScraper\Adapter\Movie;

use Symfony\Component\DomCrawler\Crawler;

class TheMovieDb extends AbstractAdapter
{
    const SEARCH_URL = "http://api.themoviedb.org/2.1/Movie.search/%s/xml/%s/%s";
    const FIND_URL   = 'http://api.themoviedb.org/2.1/Movie.getInfo/%s/xml/%s/%s';
    const IMDB_URL   = 'http://api.themoviedb.org/2.1/Movie.imdbLookup/%s/xml/%s/%s';
    
    protected $apikey;
    protected $lang;
    
    public function __construct($apikey, $lang = 'en')
    {
        $this->apikey = $apikey;
        $this->lang = $lang;
    }
    
    public function getSearchResult(Crawler $crawler)
    {
        // TODO
    }
    
    public function getDetails(Crawler $crawler)
    {
        // TODO
    }
    
    protected function getSearchMovieUrl($title, $year = false)
    {
        if ($year) {
            $input = $title . ' ' . $year;
        } else {
            $input = $title;
        }
        
        return sprintf(TheMovieDb::SEARCH_URL,
            $this->lang,
            $this->apikey,
            urlencode($input));
    }
    
    protected function getFindMovieUrl($id)
    {
        return sprintf(TheMovieDb::FIND_URL,
            $this->lang,
            $this->apikey,
            $id);
    }
    
    protected function getImdbLookupUrl($imdbId)
    {
        return sprintf(TheMovieDb::IMDB_URL,
            $this->lang,
            $this->apikey,
            $imdbId);
    }
}