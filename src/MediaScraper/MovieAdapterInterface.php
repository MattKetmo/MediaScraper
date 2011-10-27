<?php

namespace MediaScraper;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Interface for the movie scraper adapters
 *
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
interface MovieAdapterInterface
{
    /**
     * Get the URL to crawl
     *
     * @param string $title Title of the movie
     * @param mixed  $year  Year of the movie (optional)
     *
     * @return string The search URL
     */
    function getMovieSearchUrl($title, $year = false);

    /**
     * Look into the crawled web page to get a list of result
     *
     * @param Crawler $crawler The crawled page
     *
     * @return array Array of Movies
     */
    function getMovieSearchResult(Crawler $crawler);

    /**
     * Get direct search URL with specific keys (like imdb id)
     *
     * @param Movie $movie The movie to search
     *
     * @return string Url of the movie
     */
    function getMovieDetailUrl(Movie $movie);

    /**
     * Grab all data of the movie and load them into $movie
     *
     * @param Crawler $crawler The crawled page
     * @param Movie   $movie   The movie to load
     *
     * @return void
     */
    function loadMovieDetails(Crawler $crawler, Movie $movie);
}
