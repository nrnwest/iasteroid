<?php

namespace Tests\Unit;

use App\Services\AsteroidData;
use PHPUnit\Framework\TestCase;

class AsteroidDataTest extends TestCase
{
    private AsteroidData $asteroidData;

    public function setUp(): void
    {
        $this->asteroidData = new AsteroidData();
    }

    /**
     * @dataProvider getDataAsteroid
     * @throws \App\Exceptions\ErrorPathFile
     */
    public function testFile(array $asteroid)
    {
        $path = __DIR__ . '/../../resources/asteroid/asteroid.json';
        $data = $this->asteroidData->file($path);
        $this->assertEquals($data[1], $asteroid);
        $this->assertTrue(is_object($data));
    }

    public function getDataAsteroid()
    {
        return [[[
            "referenced" => "3754388",
            "name" => "(2016 NB1)",
            "speed" => "30389.3160215687",
            "date" => "2022-07-12",
            "hazardous" => 1,
        ]]];
    }
}
