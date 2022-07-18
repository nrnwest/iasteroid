<?php

declare(strict_types=1);

namespace App\Services;

use App\Exceptions\ErrorPathFile;
use Illuminate\Support\Collection;

class AsteroidData
{
    private const START_DATE = '{startDate}';
    private const END_DATE = '{endDate}';
    private const FORMAT_DATE = 'Y-m-d';


    public function nasa(string $url, int $day = 3): Collection
    {
        $periodSeconds = $day * 24 * 60 * 60;
        $search = [self::START_DATE, self::END_DATE];
        $replace = [
            date(self::FORMAT_DATE, (time() - $periodSeconds)),
            date(self::FORMAT_DATE, time())
        ];
        return $this->get(new Collection(json_decode(file_get_contents(str_replace($search, $replace, $url)))));
    }

    public function file($pathFile): Collection
    {
        if (!is_file($pathFile)) {
            throw new ErrorPathFile($pathFile);
        }
        return $this->get(new Collection(json_decode(file_get_contents($pathFile))));
    }

    private function get(Collection $data): Collection
    {
        $result = new Collection();
        foreach ($data->get('near_earth_objects') as $dayData) {
            foreach ($dayData as $asteroidData) {
                $approachData = $asteroidData->close_approach_data[0];
                $result->put(null, [
                        'referenced' => $asteroidData->neo_reference_id,
                        'name' => $asteroidData->name,
                        'speed' => $approachData->relative_velocity->kilometers_per_hour,
                        'date' => $approachData->close_approach_date,
                        'hazardous' => (int)$asteroidData->is_potentially_hazardous_asteroid
                    ]
                );
            }
        }
        return $result;
    }

}
