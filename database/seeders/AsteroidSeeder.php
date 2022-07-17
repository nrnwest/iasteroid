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
        $asteroids = new AsteroidData(config('iasteroid.get_data'));
        foreach ($asteroids->get()->near_earth_objects as $values) {
            foreach ($values as $asteroidParams) {
                $approachData = $asteroidParams->close_approach_data[0];
                $asteroid = new Asteroid();
                $this->writeAsteroid(
                    $asteroid,
                    $asteroidParams->neo_reference_id,
                    $asteroidParams->name,
                    $approachData->relative_velocity->kilometers_per_hour,
                    $approachData->close_approach_date,
                    (int)$asteroidParams->is_potentially_hazardous_asteroid
                );
            }
        }
    }

    private function writeAsteroid(
        Asteroid $asteroid,
        string $referenced,
        string $name,
        string $speed,
        string $date,
        int $hazardous
    ): void {
        $asteroid->referenced = $referenced;
        $asteroid->name = $name;
        $asteroid->speed = $speed;
        $asteroid->date = $date;
        $asteroid->hazardous = $hazardous;
        $asteroid->save();
    }
}
