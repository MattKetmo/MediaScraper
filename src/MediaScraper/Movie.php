<?php

namespace MediaScraper;

use DateTime;

/**
 * A movie
 */
class Movie
{
    protected $title;
    protected $year;
    protected $plot;

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
