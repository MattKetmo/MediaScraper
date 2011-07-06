<?php

namespace MediaScraper;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Interface for the scraper adapters
 *
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
interface Adapter
{
    /**
     * Get direct search URL with specific keys (like imdb id)
     */
    //function getDetailsUrl($options = array());
    
    /**
     * Get the URL to crawl
     *
     * @param string $name    The name of the media to search
     * 
     * @return string The search URL 
     */
    function getSearchUrl($name);
    
    /**
     * Look into the crawled web page to get a list of result
     *
     * @param Crawler The crawled page
     *
     * @return array The search result (with title & url)
     */
    function getSearchResult(Crawler $crawler);
    
    /**
     * Grab all data of the media
     *
     * @param Crawler The crawled page
     *
     * @return mixed The media
     */
    function getDetails(Crawler $crawler);
}