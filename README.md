# PHP5 library to grab media information from the web (dev)

Initially created to scrap movies

## Installation

```
./bin/install_vendors.php
```

## Usage

```php
<?php

require_once '/path/to/autoload.php';

$tmdb    = new TheMovieDb('MY_API_K3Y');
$scraper = new Scraper($tmdb);
$movies  = $scraper->search(array('title' => 'The Social Network', 
                                  'year' => '2010'));
if (count($movies) > 0) {
    foreach ($movies as $movie) {
        echo $movie['name'] . ' -> ' . $movie['url'] . PHP_EOL;
    }
    
    // grab informations about the first movie found
    $movie = $scraper->scrap($movies[0]['url']);
    var_dump($movie);
} else {
    echo 'No movie found' . PHP_EOL;
}
```
