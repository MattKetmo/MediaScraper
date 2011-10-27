<?php

namespace MediaScraper\Adapter;

use MediaScraper\Movie;
use MediaScraper\MovieAdapterInterface;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Movie adapter for ImdbApi.com website
 *
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
class ImdbApiCom implements MovieAdapterInterface
{
    const BASE_URL = "http://www.imdbapi.com/";
    
    /**
     * {@inheritdoc}
     */
    public function getMovieSearchUrl($title, $year = false)
    {
        if ($year) {
            $params = sprintf('?t=%s&y=%s', urlencode($title), urlencode($year));
        } else {
            $params = sprintf('?t=%s', urlencode($title));
        }
        
        return ImdbApiCom::BASE_URL . $params;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getSearchResult(Crawler $crawler)
    {
        $content = $crawler->first()->text();
        $info = json_decode($content, true);
        
        // ImdbApi.com gives only one result per search
        $movie = new Movie();
        $movie->setTitle($info['Title']);
        $movie->setYear($info['Year']);
        $movie->setImdbId($info['ID']);

        return array($movie);
    }

    /**
     * {@inheritdoc}
     */
    public function getMovieDetailUrl(Movie $movie)
    {
        if ($movie->getImdbId()) {
            $params = sprintf('?i=%s', urlencode($movie->getImdbId()));
            $url = ImdbApiCom::BASE_URL . $params;
        } else {
            // TODO throws Exception
        }

        return $url;
    }

    /**
     * {@inheritdoc}
     */
    public function loadMovieDetails(Crawler $crawler, Movie $movie)
    {
        $content = $crawler->first()->text();
        $info = json_decode($content, true);

        $movie->setTitle($info['Title']);
        $movie->setYear($info['Year']);
        $movie->setPlot($info['Plot']);
    }
}
