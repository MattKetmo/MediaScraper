# PHP5 library to grab media information from the web (dev)

Initially created to scrap movies

## Installation

```
./bin/install_vendors.php
```

## Usage

```php
use MediaScraper\Movie;
use MediaScraper\MovieScraper;
use MediaScraper\Adapter\TheMovieDb;
use Goutte\Client;

$client  = new Client();
$tmdb    = new TheMovieDb('MY_API_KEY');
$scraper = new MovieScraper($client, $tmdb);

//
// Search movie by name
//
echo "--- Looking for 'True Grit'\n";
$movies  = $scraper->search('True Grit');
//$movies  = $scraper->search('The Social Network', '2010');

if (count($movies) > 0) {
    echo count($movies) . ' movie(s) found :' . PHP_EOL;

    foreach ($movies as $movie) {
        echo sprintf("- %s (%s)\n", $movie->getTitle(), $movie->getYear());
    }
} else {
    echo 'No movie found' . PHP_EOL;
}

//
// Load movie (by ID)
//
echo "--- Get movie 'tt1285016'\n";
$movie = new Movie();
$movie->setImdbId('tt1285016');
$scraper->load($movie);

echo 'Name: ' . $movie->getTitle() . PHP_EOL;
echo 'Year: ' . $movie->getYear()  . PHP_EOL;
echo 'Plot: ' . $movie->getPlot()  . PHP_EOL;
```
