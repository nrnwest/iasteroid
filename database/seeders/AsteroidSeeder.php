<?php

namespace Database\Seeders;

namespace Database\Seeders;

use App\Services\AsteroidData;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use PHPUnit\Framework\MockObject\ConfigurableMethodsAlreadyInitializedException;

class AsteroidSeeder extends Seeder
{
    private const CREATED_AT_FORMAT = 'Y-m-d H:i:s';

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
                DB::table('asteroids')->insert([
                        'referenced' => $asteroid->neo_reference_id,
                        'name' => $asteroid->name,
                        'speed' => $approachData->relative_velocity->kilometers_per_hour,
                        'date' => $approachData->close_approach_date,
                        'hazardous' => (int)$asteroid->is_potentially_hazardous_asteroid,
                        'created_at' => date(self::CREATED_AT_FORMAT),
                    ]
                );
            }
        }
    }
}
//php artisan db:seed --class=AsteroidSeeder
