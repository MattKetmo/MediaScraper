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
     * Get the URL to crawl
     *
     * @param mixed $keys The name of the media to search
     * 
     * @return string The search URL 
     */
    public function getSearchUrl($keys);
    
    /**
     * Get direct search URL with specific keys (like imdb id)
     *
     * @param mixed $keys
     *
     * @return string Url of the looking media
     */
    public function getFindUrl($keys);
    
    /**
     * Look into the crawled web page to get a list of result
     *
     * @param Crawler The crawled page
     *
     * @return array The search result (with titles & urls)
     */
    public function getSearchResult(Crawler $crawler);
    
    /**
     * Grab all data of the media
     *
     * @param Crawler The crawled page
     *
     * @return mixed The media
     */
    public function getDetails(Crawler $crawler);
}