# PHP5 library to grab media information from the web (dev)

Initially created to scrap movies

## Usage

$tmdb    = new TheMovieDb('MY_API_K3Y');
$scraper = new Scraper($tmdb);
$movie   = $scraper->search('The Social Network');