<?php

declare(strict_types=1);

return [
    'hi' => [
        'key' => 'hello',
        'str' => 'MacPaw Internship 2022!'
    ],

    'url' => 'https://api.nasa.gov/neo/rest/v1/feed?start_date={startDate}&end_date={endDate}&api_key=lG3ctBdAU2Gb46AcogyWr2GuTaOj4wkAY2emtXv9',

    // how many days 3
    'period' => 3,

    // local file with data about asteroids
    'pathFile' => __DIR__ . '/../resources/asteroid/asteroid.json',

    // file || nasa
    'getData' => 'nasa',
];
