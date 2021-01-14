<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Image Driver
    |--------------------------------------------------------------------------
    |
    | Intervention Image supports "GD Library" and "Imagick" to process images
    | internally. You may choose one of them according to your PHP
    | configuration. By default PHP's "GD Library" implementation is used.
    |
    | Supported: "gd", "imagick"
    |
    */

    'driver' => 'gd',



    'sizes' => [
        'thumbnail' => [255, 270],
        'medium'    => [540, 583],
        // 'larage' => [600, 600],
    ],

    'base_url_thumbnail' => 'http://localhost:8000/resizes/thumbnail',
    'base_url_medium'    => 'http://localhost:8000/resizes/medium',
    

];
