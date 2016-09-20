<?php

return [

    "default" => [

        /**
         * Base URL of Rest service
         */

        'base_uri' => 'http://localhost/api/',

        /**
         * Float describing the timeout of the request in seconds.
         */

        'timeout' => 5.0,

        /**
         * Describes the redirect behavior of a request
         * Set to false to disable redirects
         */

        "allow_redirects" => [
            'max' => 5,
            'strict' => false,
            'referer' => false,
            'protocols' => ['http', 'https'],
            'track_redirects' => false
        ],

        /**
         * Set to false to disable throwing exceptions on an HTTP protocol errors
         */

        "http_errors" => false,

        /**
         * Specify whether or not Content-Encoding responses (gzip, deflate, etc.) are automatically decoded.
         */

        "decode_content" => true,

        /**
         * Describes the SSL certificate verification behavior of a request.
         * Set to true to enable SSL certificate verification and use the default CA bundle provided by operating system.
         * Set to false to disable certificate verification (this is insecure!).
         * Set to a string to provide the path to a CA bundle to enable verification using a custom certificate.
         */

        "verify" => false,

        /**
         * Specifies whether or not cookies are used in a request or what cookie jar to use or what cookies to send
         */

        "cookies" => false,

        /**
         * Associative array of headers to add to the request. Each key is the name of a header,
         * and each value is a string or array of strings representing the header field values.
         */
        "headers" => [
            "User-Agent" => "GuzzleHttp/6.2.1 curl/7.49.1 PHP/5.6.19",
            'Accept' => 'application/json',
        ]

    ]


    /*
     * For more guzzle request options
     * Browse Guzzle docs : http://docs.guzzlephp.org/en/latest/request-options.html
     *
     */

];