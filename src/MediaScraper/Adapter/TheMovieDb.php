<?php

namespace MediaScraper\Adapter;

use MediaScraper\Movie;
use MediaScraper\MovieAdapter;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Movie adapter for TheMovieDb.org website
 *
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
class TheMovieDb implements MovieAdapter
{
    const SEARCH_URL = "http://api.themoviedb.org/2.1/Movie.search/%s/xml/%s/%s";
    const FIND_URL   = 'http://api.themoviedb.org/2.1/Movie.getInfo/%s/xml/%s/%s';
    const IMDB_URL   = 'http://api.themoviedb.org/2.1/Movie.imdbLookup/%s/xml/%s/%s';

    protected $apikey;
    protected $lang;

    /**
     * Build the adapter
     *
     * @param string $apikey The API key
     * @param string $lang   Language
     */
    public function __construct($apikey, $lang = 'en')
    {
        $this->apikey = $apikey;
        $this->lang = $lang;
    }

    /**
     * {@inheritdoc}
     */
    public function getSearchUrl($title, $year = false)
    {
        if ($year) {
            $input = $title . ' ' . $year;
        } else {
            $input = $title;
        }

        return sprintf(TheMovieDb::SEARCH_URL,
            $this->lang,
            $this->apikey,
            urlencode($input)
        );
    }

    /**
     * {@inheritdoc}
     */
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
            $imdbId = $movie->getElementsByTagName('imdb_id')->item(0)->nodeValue;

            $movie = new Movie();
            $movie->setTitle($title);
            $movie->setYear($year);
            $movie->setId('themoviedb.org', $id);
            $movie->setImdbId($imdbId);

            $ret[] = $movie;
        }

        return $ret;
    }

    /**
     * {@inheritdoc}
     */
    public function getDetailUrl(Movie $movie)
    {
        if ($movie->getId('themoviedb.org')) {
            $url = sprintf(self::FIND_URL,
                $this->lang,
                $this->apikey,
                $movie->getId('themoviedb.org')
            );
        } else if ($movie->getImdbId()) {
            $url = sprintf(self::IMDB_URL,
                $this->lang,
                $this->apikey,
                $movie->getImdbId()
            );
        } else {
            // TODO throws Exception
        }

        return $url;
    }

    /**
     * {@inheritdoc}
     */
    public function loadDetails(Crawler $crawler, Movie $movie)
    {
        $movies = $crawler->filter('movies > movie');
        $movieDetails = $movies->first();

        $title = $movieDetails->filter('name')->text();
        $year  = substr($movieDetails->filter('released')->text(), 0, 4);
        $plot  = $movieDetails->filter('overview')->text();

        $movie->setTitle($title);
        $movie->setYear($year);
        $movie->setPlot($plot);
    }
}
