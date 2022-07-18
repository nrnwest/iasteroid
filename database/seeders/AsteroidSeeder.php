<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Asteroid;
use App\Services\AsteroidData;
use Illuminate\Database\Seeder;

class AsteroidSeeder extends Seeder
{
    private const METHOD_FILE = 'file';
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $asteroids = new AsteroidData();
        if (config('iasteroid.getData') === self::METHOD_FILE) {
            $data = $asteroids->file(config('iasteroid.pathFile'));
        } else {
            $data = $asteroids->nasa(config('iasteroid.url'), config('iasteroid.period'));
        }
        foreach ($data as $asteroidData) {
            $asteroid = new Asteroid();
            foreach ($asteroidData as $k => $v) {
                $asteroid->{$k} = $v;
            }
            $asteroid->save();
        }
    }

}
