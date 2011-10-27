<?php

namespace MediaScraper;

use Symfony\Component\DomCrawler\Crawler;

/**
 * Interface for the show scraper adapters
 *
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
interface ShowAdapterInterface
{
    /**
     * Get the URL to crawl
     *
     * @param string $title Title of the show
     * @param mixed  $year  Year of the show (optional)
     *
     * @return string The search URL
     */
    function getShowSearchUrl($title, $year = false);

    /**
     * Look into the crawled web page to get a list of result
     *
     * @param Crawler $crawler The crawled page
     *
     * @return array Array of Shows
     */
    function getShowSearchResult(Crawler $crawler);

    /**
     * Get direct search URL with specific keys (like imdb id)
     *
     * @param Show $show The show to search
     *
     * @return string Url of the show
     */
    function getShowDetailUrl(Show $show);

    /**
     * Grab all data of the show and load them into $show
     *
     * @param Crawler $crawler The crawled page
     * @param Show    $show    The show to load
     *
     * @return void
     */
    function loadShowDetails(Crawler $crawler, Show $show);

    /**
     * Get url of the episode guide
     *
     * @param Show $show The episodes' show
     *
     * @return string Url of the episodes
     */
    function getEpisodeGuideUrl(Show $show);

    /**
     * Grab the episodes
     *
     * @param Crawler $crawler The crawled page
     *
     * @return array Array of Episodes
     */
    function getEpisodeList(Crawler $crawler);

    /**
     * Grab all data of the episode and load it
     *
     * @param Crawler $crawler The crawled page
     * @param Episode $episode The episode to load
     *
     * @return void
     */
    function loadEpisode(Crawler $crawler, Episode $episode);
}

