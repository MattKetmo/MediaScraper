<?php

namespace MediaScraper;

use Goutte\Client;

/**
 * Scraper that call adapter to grab information
 *
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
class MovieScraper
{
    protected $adapter;
    protected $client;

    /**
     * Build the scraper
     *
     * @param Client       $client  The client scraper
     * @param MovieAdapter $adapter The movie adapter
     */
    public function __construct($client, $adapter)
    {
        $this->adapter = $adapter;
        $this->client = $client;
    }

    /**
     * Search movie by title and year and returns list of possible results
     *
     * @param string $title Title of the movie
     * @param mixed  $year  Year of the movie (optional)
     *
     * @return array Array of Movie
     */
    public function search($title, $year = false)
    {
        $url = $this->adapter->getSearchUrl($title, $year);
        $crawler = $this->client->request('GET', $url);

        return $this->adapter->getSearchResult($crawler);
    }

    /**
     * Load detail of the movie
     *
     * Details are found by id (such as IMDb id)
     *
     * @param Movie &$movie The movie to load
     *
     * @return void
     */
    public function load(&$movie)
    {
        $url = $this->adapter->getDetailUrl($movie);
        $crawler = $this->client->request('GET', $url);
        $this->adapter->loadDetails($crawler, $movie);
    }
}
