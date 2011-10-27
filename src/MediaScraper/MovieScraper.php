<?php

namespace MediaScraper;

use Symfony\Component\BrowserKit\Client;

/**
 * Scraper used to grab information about movies
 *
 * This scraper allows you to search movie by its title and year, then lazy 
 * load information about it. The search method gives ID about the movies 
 * found, and the load method grab information about the movie by its ID.
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
     * @param MovieAdapterInterface $adapter The movie adapter
     */
    public function __construct(Client $client, MovieAdapterInterface $adapter)
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
     * @return array Array of Movies identified by its ID 
     */
    public function search($title, $year = false)
    {
        $url = $this->adapter->getMovieSearchUrl($title, $year);
        $crawler = $this->client->request('GET', $url);

        return $this->adapter->getMovieSearchResult($crawler);
    }

    /**
     * Load detail of the movie
     *
     * Details are found by id (such as IMDb id)
     *
     * @param Movie $movie The movie to load
     *
     * @return void
     */
    public function load(Movie $movie)
    {
        $url = $this->adapter->getMovieDetailUrl($movie);
        $crawler = $this->client->request('GET', $url);
        $this->adapter->loadMovieDetails($crawler, $movie);
    }
}
