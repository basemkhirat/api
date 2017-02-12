### A guzzle interface to make API calls for laravel 5 applications.

##### 1) Install package via composer:

	composer require basemkhirat/api

##### 2) Add package service provider:

	Basemkhirat\API\APIServiceProvider::class
	
##### 3) Add package alias:

	'API' => Basemkhirat\API\Facades\API::class
	
##### 4) Publishing:
    
    php artisan vendor:publish
	
### Usage:

#### Requests with request uri:

    // $config is optional
    
    GET Request     :  API::get("users/show", $config)
    POST Request    :  API::post("users/create", $config)
    PUT Request     :  API::put("users/update", $config)
    DELETE Request  :  API::delete("users/delete", $config)

#### Or using full url:

    // $config is optional
    
    GET Request     :  API::get("http://httpbin.org/get", $config)
    POST Request    :  API::post("http://httpbin.org/post", $config)
    PUT Request     :  API::put("http://httpbin.org/put", $config)
    DELETE Request  :  API::delete("http://httpbin.org/delete", $config)

#### Getting body content text:

    API::get("get", $config)->getBody()->getContent()

#### Getting body content array:

    API::get("get", $config)->toArray()

#### Getting status code:

    API::get("get", $config)->getStatusCode()   // int 200

    
#### Multiple drivers:

In api.php config file, repeat `default` array block
     
     return [
     
         // Called using API::driver("default")->get($uri) or API::get($uri) directly
         
         "default" => [
            'base_uri' => 'http://site1.dev/api/',
            ....
            ...
            .
         ],
         
         // Called using API::driver("another")->get($uri)
         
         "another" => [
            'base_uri' => 'http://site2.dev/api/',
            ....
            ...
            .
          ]
     ];
     
     
#### Native guzzle calling:


    //API::guzzle() return guzzle client object
    
    API::guzzle()->get("get", $config)->getBody()->getContents();
    
   For more guzzle request options
   
   Browse Guzzle docs : [Guzzle Docs](http://docs.guzzlephp.org/en/latest/request-options.html#allow-redirects)

`Good luck`

`Dont forget to send a feedback..`
