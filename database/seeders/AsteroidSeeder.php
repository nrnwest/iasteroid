<?php

namespace Database\Seeders;

namespace Database\Seeders;

use App\Models\Asteroid;
use App\Services\AsteroidData;
use Illuminate\Database\Seeder;

class AsteroidSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $asteroids = new AsteroidData();
        $dataMethod = config('iasteroid.getData');
        if ($dataMethod === 'file') {
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
