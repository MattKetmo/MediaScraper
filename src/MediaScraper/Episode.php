<?php

namespace MediaScraper;

use DateTime;

/**
 * A TV Show episode
 */
class Episode extends Media
{
    const IMDB_IDENTIFIER = 'imdb';

    protected $show;
    protected $season;
    protected $number;
    protected $title;
    protected $plot;

    /**
     * Get the IMDb ID of this episode
     *
     * @return mixed IMDb ID
     */
    public function getImdbId()
    {
        return $this->getId(self::IMDB_IDENTIFIER);
    }

    /**
     * Set the IMDb ID of the episode
     *
     * @param mixed $id The IMDb ID (ttXXXXXXX)
     *
     * @return void
     */
    public function setImdbId($id)
    {
        $this->setId(self::IMDB_IDENTIFIER, $id);
    }

    /**
     * Get the show of the episode
     *
     * @return Show The show of the episode
     */
    public function getShow()
    {
        return $this->show;
    }

    /**
     * Set the show of the episode in the show
     *
     * @param Show $show The show of the episode
     *
     * @return void
     */
    public function setShow(Show $show)
    {
        $this->show = $show;
    }

    /**
     * Get the season of the episode
     *
     * @return mixed The season of the episode
     */
    public function getSeason()
    {
        return $this->season;
    }

    /**
     * Set the season of the episode in the season
     *
     * @param mixed $season The season of the episode
     *
     * @return void
     */
    public function setSeason($season)
    {
        $this->season = $season;
    }

    /**
     * Get the number of the episode
     *
     * @return mixed The number of the episode
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set the number of the episode in the season
     *
     * @param mixed $number The number of the episode
     *
     * @return void
     */
    public function setNumber($number)
    {
        $this->number = $number;
    }

    /**
     * Get the title of the episode
     *
     * @return string The title of the episode
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the title of the episode
     *
     * @param string $title The title of the episode
     *
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get the plot of the episode
     *
     * @return string The plot of the episode
     */
    public function getPlot()
    {
        return $this->plot;
    }

    /**
     * Set the plot of the episode
     *
     * @param string $plot The plot of the episode
     *
     * @return void
     */
    public function setPlot($plot)
    {
        $this->plot = $plot;
    }
}
