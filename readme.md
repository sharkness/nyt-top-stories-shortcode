# NYT Top Stories Shortcode

Use a shortcode [nyt_top_stories] to display the top stories from the New York Times. 

- requires API Key from NYT 
- Can be used to display data from any of the "Top Stories" categories https://developer.nytimes.com/docs/top-stories-product/1/overview

The Top Stories API returns an array of articles currently on the specified section (arts, business, ...).

        `/{section}.json`



## How to get your API Key

Visit https://developer.nytimes.com/get-started to create a free developer account. 



## How to select your API endpoint for display

Your API endpoint will depend on the category from which you want to display the top stories. Based on that category, you'll select the appropriate endpoint.

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

**Resource Types**

URIs are relative to https://api.nytimes.com/svc/topstories/v2, unless otherwise noted. 



## How to set the API endpoint in the WP admin menu

Choose "NYT Data" from the menu in the admin panel. Enter your desired endpoint and click save. Done!



## How to use the shortcode [nyt_top_stories]

The shortcode [nyt_top_stories] can be used on any post or page of your site. The shortcode will display an unordered list of the top stories' headlines, which will link to their corresponding articles on the New York Times site. The `<ul>` is wrapped in a `div` with the class `fone-nyt-block`. This class is completely unstyled. Its sole purpose is to give you a class on which to add your own css rules, should you so desire.