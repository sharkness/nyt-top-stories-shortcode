# NYT Top Stories Shortcode

Use a shortcode to display the top stories from the New York Times.

- requires API Key from NYT 
- Can be used to display data from any of the "Top Stories" categories https://developer.nytimes.com/docs/top-stories-product/1/overview


The Top Stories API returns an array of articles currently on the specified section (arts, business, ...).

`/{section}.json`

Use home to get articles currently on the homepage.

`/home.json`

The possible section value are: arts, automobiles, books, business, fashion, food, health, home, insider, magazine, movies, nyregion, obituaries, opinion, politics, realestate, science, sports, sundayreview, technology, theater, t-magazine, travel, upshot, us, and world.

**Example Calls**

```
https://api.nytimes.com/svc/topstories/v2/arts.json?api-key=yourkey
https://api.nytimes.com/svc/topstories/v2/home.json?api-key=yourkey
https://api.nytimes.com/svc/topstories/v2/science.json?api-key=yourkey
https://api.nytimes.com/svc/topstories/v2/us.json?api-key=yourkey
https://api.nytimes.com/svc/topstories/v2/world.json?api-key=yourkey
```

Resource Types
URIs are relative to https://api.nytimes.com/svc/topstories/v2, unless otherwise noted. 


## How to get your API Key

## How to select and set the API endpoint for the shortcode

## How to use the shortcode