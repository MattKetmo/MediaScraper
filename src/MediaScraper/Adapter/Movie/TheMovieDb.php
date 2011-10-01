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
        $ret = array();
        $movies = $crawler->filter('movies > movie');
        
        foreach ($movies as $movie) {
            $title = $movie->getElementsByTagName('name')->item(0)->nodeValue;
            $released = $movie->getElementsByTagName('released')->item(0)->nodeValue;
            preg_match('/(\d\d\d\d)-\d\d-\d\d/', $released, $matches);
            $year = $matches[1];
            $id = $movie->getElementsByTagName('id')->item(0)->nodeValue;
            
            $ret[] = array(
                'name' => sprintf('%s (%s)', $title, $year),
                'url'  => sprintf(TheMovieDb::FIND_URL,
                    $this->lang,
                    $this->apikey,
                    $id)
                );
        }
        
        return $ret;
    }
    
    public function getDetails(Crawler $crawler)
    {
        $movies = $crawler->filter('movies > movie');
        $movie = $movies->first();
        
        // TODO : more info
        
        return array(
            'title' => $movie->filter('name')->text(),
            'year'  => substr($movie->filter('released')->text(), 0, 4),
            'plot'  => $movie->filter('overview')->text(),
            );
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