<?php

namespace MediaScraper\Adapter\Movie;

use MediaScraper\Adapter;

abstract class AbstractAdapter implements Adapter
{   
    public function getSearchUrl($keys)
    {
        $title = '';
        $year = false;
        
        if (is_array($keys)) {
            if (isset($keys['title'])) {
                $title = $keys['title'];                
            }
            
            if (isset($keys['year'])) {
                $year = $keys['year'];                
            }    
        } else if (is_string($keys)) {
            $title = $keys;
            // TODO detect year in title
        }
        
        return $this->getSearchMovieUrl($title, $year);
    }
    
    public function getFindUrl($keys)
    {
        $ret = '';
        
        if (is_array($keys)) {
            if (isset($keys['id'])) {
                $ret = $this->getFindMovieUrl($keys['id']);
            } else if (isset($keys['imdb'])) {
                $ret = $this->getImdbLookupUrl($keys['imdb']);
            } else {
                // TODO throws Exception
            }
        } else if (is_string($keys)){
            if (preg_match('/tt\d+/', $keys)) {
                
            } else {
                $ret = $this->getImdbLookupUrl($keys);
            }
        }
        
        return $ret;
    }
    
    protected abstract function getSearchMovieUrl($title, $year = false);
    
    protected abstract function getFindMovieUrl($id);
    
    protected abstract function getImdbLookupUrl($imdbId);
    
}