<?php

namespace MediaScraper;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Interface for the movie scraper adapters
 *
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
interface MovieAdapter
{
    /**
     * Get the URL to crawl
     *
     * @param string $title Title of the movie
     * @param mixed  $year  Year of the movie (optional)
     *
     * @return string The search URL
     */
    function getSearchUrl($title, $year = false);

    /**
     * Look into the crawled web page to get a list of result
     *
     * @param Crawler $crawler The crawled page
     *
     * @return array Array of Movie
     */
    function getSearchResult($crawler);

    /**
     * Get direct search URL with specific keys (like imdb id)
     *
     * @param Movie &$movie The movie to search
     *
     * @return string Url of the movie
     */
    function getDetailUrl(&$movie);

    /**
     * Grab all data of the movie
     *
     * @param Crawler $crawler The crawled page
     * @param Movie   $movie   The movie to load
     *
     * @return void
     */
    function loadDetails($crawler, $movie);
}
