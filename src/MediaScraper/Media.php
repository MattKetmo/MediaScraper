<?php

namespace MediaScraper;

/**
 * Abstract Media object
 *
 * Defined commun attributs for media, such as identifiers and urls
 */
abstract class Media
{
    protected $id  = array();
    protected $url = array();
    
    /**
     * Get the ID attached to the $key
     *
     * @param string $key The key/identifier of the ID
     *
     * @return mixed The ID
     */
    public function getId($key)
    {
        if (!array_key_exists($key, $this->id)) {
            return false;
        }

        return $this->id[$key];
    }

    /**
     * Set the ID attached to the $key
     *
     * @param string $key The key/identifier of the ID
     * @param mixed  $id  The ID
     *
     * @return void
     */
    public function setId($key, $id)
    {
        $this->id[$key] = $id;
    }

    /**
     * Get the url attached to the $key
     *
     * @param string $key The key/identifier of the url
     *
     * @return mixed The url
     */
    public function getUrl($key)
    {
        if (!array_key_exists($key, $this->url)) {
            return false;
        }

        return $this->url[$key];
    }

    /**
     * Set the url attached to the $key
     *
     * @param string $key The key/urlentifier of the url
     * @param mixed  $url The url
     *
     * @return void
     */
    public function setUrl($key, $url)
    {
        $this->url[$key] = $url;
    }
}
