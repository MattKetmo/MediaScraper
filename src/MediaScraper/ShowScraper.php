<?php

namespace MediaScraper;

use Symfony\Component\BrowserKit\Client;

/**
 * Scraper used to grab information about TV shows
 *
 * This scraper allows you to search TV shows by its title and year, then lazy 
 * load information about it. The search method gives ID about the shows 
 * found, and the load method grab information about the show by its ID.
 *
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
class ShowScraper
{
    protected $adapter;
    protected $client;

    /**
     * Build the scraper
     *
     * @param Client      $client  The client scraper
     * @param ShowAdapterInterface $adapter The show adapter
     */
    public function __construct(Client $client, ShowAdapterInterface $adapter)
    {
        $this->adapter = $adapter;
        $this->client = $client;
    }

    /**
     * Search a show by title and year and returns list of possible results
     *
     * @param string $title Title of the show
     * @param mixed  $year  Year of the show (optional)
     *
     * @return array Array of Shows identified by its ID 
     */
    public function search($title, $year = false)
    {
        $url = $this->adapter->getShowSearchUrl($title, $year);
        $crawler = $this->client->request('GET', $url);

        return $this->adapter->getShowSearchResult($crawler);
    }

    /**
     * Load detail of the show
     *
     * Details are found by id (such as IMDb id)
     *
     * @param Show $show The show to load
     *
     * @return void
     */
    public function load(Show $show)
    {
        $url = $this->adapter->getShowDetailUrl($show);
        $crawler = $this->client->request('GET', $url);
        $this->adapter->loadShowDetails($crawler, $show);
    }

    /**
     * Get episode list in a saison of a show
     *
     * @param Show  $show   The show of the episode
     * @param mixed $saison The saison number (int or string)
     *
     * @return array Array of Episodes contained in the saison (partially load)
     */
    public function getEpisodeList(Show $show, $saison)
    {
        // TODO
    }

    /**
     * Load episode of a show
     *
     * @param mixed $episode The episode number (int or string)
     *
     * @return Episode The wanted episode
     */
    public function loadEpisode(Episode $episode)
    {
        // TODO
    }
}

