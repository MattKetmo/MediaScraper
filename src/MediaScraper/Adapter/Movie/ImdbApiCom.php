<?php

namespace MediaScraper\Adapter\Movie;

use Symfony\Component\DomCrawler\Crawler;

class ImdbApiCom extends AbstractAdapter
{
    const BASE_URL = "http://www.imdbapi.com/";
    
    public function __construct()
    {
    }
    
    public function getSearchResult(Crawler $crawler)
    {
        $content = $crawler->first()->text();
        $info = json_decode($content, true);
        
        // ImdbApi.com gives only one result per search
        return array(array( 
            'name' => sprintf('%s (%s)', $info['Title'], $info['Year']),
            'url' => $this->getImdbLookupUrl($info['ID'])
        ));
    }
    
    public function getDetails(Crawler $crawler)
    {
        $content = $crawler->first()->text();
        $info = json_decode($content, true);
        
        return array( 
            'title' => $info['Title'],
            'year'  => $info['Year'],
            'plot'  => $info['Plot']
        );
    }
    
    protected function getSearchMovieUrl($title, $year = false)
    {
        if ($year) {
            $params = sprintf('?t=%s&y=%s', urlencode($title), urlencode($year));
        } else {
            $params = sprintf('?t=%s', urlencode($title));
        }
        
        return ImdbApiCom::BASE_URL . $params;
    }
    
    protected function getFindMovieUrl($id)
    {
        // ImdbApi.com only bases on IMDB ids
        return $this->getImdbLookupUrl($id);
    }
    
    protected function getImdbLookupUrl($imdbId)
    {
        $params = sprintf('?i=%s', urlencode($imdbId));
        
        return ImdbApiCom::BASE_URL . $params;
    }
}