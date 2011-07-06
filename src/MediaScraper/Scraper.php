<?php

namespace MediaScraper;

use Goutte\Client;
use Symfony\Component\DomCrawler\Crawler;

/**
 * Scraper that call adapter to grab information
 *
 * @author Matthieu Moquet <matthieu@moquet.net>
 */
class Scraper
{
    protected $adapter;
    protected $client;
    
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
        $this->client = new Client();
    }
    
    public function search($name)
    {
        $url = $this->adapter->getSearchUrl($name);
        $crawler = $this->client->request('GET', $url);
        
        return $this->adapter->getSearchResult($crawler);
    }
    
    public function scrap($url)
    {
        $crawler = $this->client->request('GET', $url);
        
        return $this->adapter->getDetails($crawler);
    }
}