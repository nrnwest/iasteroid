<?php

declare(strict_types=1);

return [
    'hi' => [
        'key' => 'hello',
        'str' => 'MacPaw Internship 2022!'
    ],

    'api_key' => 'lG3ctBdAU2Gb46AcogyWr2GuTaOj4wkAY2emtXv9',
    'url' => 'https://api.nasa.gov/neo/rest/v1/feed?start_date={startDate}&end_date={endDate}&api_key=',

    // period in seconds (3 days)
    'period' => 259200,

    'path_file' => __DIR__ . '/../resources/asteroid/asteroid.json',

    // file || nasa
    'getData' => 'file',
];
