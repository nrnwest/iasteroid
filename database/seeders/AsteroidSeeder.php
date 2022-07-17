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
    public function run()
    {
        $asteroids = new AsteroidData(config('iasteroid.get_data'));
        foreach ($asteroids->get()->near_earth_objects as $values) {
            foreach ($values as $asteroid) {
                $approachData = $asteroid->close_approach_data[0];
                Asteroid::create([
                        'referenced' => $asteroid->neo_reference_id,
                        'name' => $asteroid->name,
                        'speed' => $approachData->relative_velocity->kilometers_per_hour,
                        'date' => $approachData->close_approach_date,
                        'hazardous' => (int)$asteroid->is_potentially_hazardous_asteroid,
                    ]
                );
            }
        }
    }
}
