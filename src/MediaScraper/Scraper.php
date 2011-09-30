<?php

namespace MediaScraper;

use Goutte\Client;

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
    
    /**
     * Searches media and returns list of possible results
     *
     * @param mixed $keys 
     *
     * @return array Name and url of the media found
     */
    public function search($keys)
    {
        $url = $this->adapter->getSearchUrl($keys);
        $crawler = $this->client->request('GET', $url);
        
        return $this->adapter->getSearchResult($crawler);
    }
    
    /**
     * Finds media and returns one result
     *
     * @param mixed $keys 
     *
     * @return string Url of the result
     */
    public function find($keys)
    {
        return $this->adapter->getFindUrl($keys);
    }
    
    /**
     * Scrap a web page to get information about the media 
     *
     * @param string $url
     *
     * @return array Information about the media
     */
    public function scrap($url)
    {
        $crawler = $this->client->request('GET', $url);
        
        return $this->adapter->getDetails($crawler);
    }
}