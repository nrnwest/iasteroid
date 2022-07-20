<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Asteroid;
use App\Services\AsteroidData;
use Illuminate\Database\Seeder;

class AsteroidSeeder extends Seeder
{
    private const METHOD_FILE = 'file';

    public function run(AsteroidData $asteroidsData): void
    {
        if (config('iasteroid.getData') === self::METHOD_FILE) {
            $data = $asteroidsData->file(config('iasteroid.pathFile'));
        } else {
            $data = $asteroidsData->nasa(config('iasteroid.url'), config('iasteroid.period'));
        }
        foreach ($data as $asteroids) {
            $asteroid = new Asteroid();
            foreach ($asteroids as $k => $v) {
                $asteroid->{$k} = $v;
            }
            $asteroid->save();
        }
    }
}
