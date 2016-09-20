### A guzzle interface to make API calls for laravel 5 applications.

#####1) Add package service provider:

	Basemkhirat\API\APIServiceProvider::class
	
#####2) Add package alias:

	'API' => Basemkhirat\API\Facades\API::class
	
#####3) Publishing:
    
    php artisan vendor:publish
	

### Usage:

You can set the API base url from api config file and make a request with request path only

##### GET Request:  API::get("get", $config)
##### GET Request:  API::post("post", $config)
##### GET Request:  API::put("put", $config)
##### GET Request:  API::delete("delete", $config)

Or make a request with full url

##### GET Request:  API::get("http://httpbin.org/get", $config)
##### GET Request:  API::post("http://httpbin.org/post", $config)
##### GET Request:  API::put("http://httpbin.org/put", $config)
##### GET Request:  API::delete("http://httpbin.org/delete", $config)

For more guzzle request options

Browse Guzzle docs : [Guzzle Docs](http://docs.guzzlephp.org/en/latest/request-options.html#allow-redirects)

`Good luck`
 
`Dont forget to send a feedback..`