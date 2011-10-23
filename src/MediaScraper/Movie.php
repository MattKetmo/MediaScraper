<?php

namespace MediaScraper;

use DateTime;

/**
 * A movie
 */
class Movie
{
    protected $id = array();
    protected $title;
    protected $year;
    protected $plot;

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
     * Get the IMDb ID of this movie
     *
     * @return mixed IMDb ID
     */
    public function getImdbId()
    {
        return $this->getId('imdb');
    }

    /**
     * Set the IMDb ID of the movie
     *
     * @param mixed  $id  The IMDb ID (ttXXXXXXX)
     *
     * @return void
     */
    public function setImdbId($id)
    {
        $this->setId('imdb', $id);
    }

    /**
     * Get the title of the movie
     *
     * @return string The title of the movie
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title of the movie
     *
     * @param string $title The title of the movie
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get the year of the movie
     *
     * @return string The year of the movie
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the year of the movie
     *
     * @param string $year The year of the movie
     *
     * @return void
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * Get the plot of the movie
     *
     * @return string The plot of the movie
     */
    public function getPlot()
    {
        return $this->plot;
    }

    /**
     * Set the plot of the movie
     *
     * @param string $plot The plot of the movie
     *
     * @return void
     */
    public function setPlot($plot)
    {
        $this->plot = $plot;
    }
}
