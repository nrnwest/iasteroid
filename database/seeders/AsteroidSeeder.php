<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Asteroid;
use App\Services\AsteroidData;
use Illuminate\Database\Seeder;

class AsteroidSeeder extends Seeder
{
    public function run(AsteroidData $asteroidsData): void
    {
        $methodData = config('iasteroid.getData');
        $data = $asteroidsData->$methodData();
        foreach ($data as $asteroids) {
            $asteroid = new Asteroid();
            foreach ($asteroids as $field => $value) {
                $asteroid->$field = $value;
            }
            $asteroid->save();
        }
    }
}
