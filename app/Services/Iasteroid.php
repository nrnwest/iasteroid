<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Asteroid;
use Illuminate\Support\Collection;

class Iasteroid
{
    public const KEY_HAZARDOUS = 'hazardous';
    public const HAZARDOUS_FALSE = 'false';
    public const HAZARDOUS_TRUE = 'true';

    private const COLUMN_SPEED = 'speed';
    private const COLUMN_DATE = 'date';
    private const ORDER_DESC = 'desc';

    public function getHi(): Collection
    {
        $result = new Collection();
        $result->put(config('iasteroid.hi.key'), config('iasteroid.hi.str'));
        return $result;
    }

    public function getHazardousAsteroids(): Collection
    {
        return Asteroid::where(self::KEY_HAZARDOUS, 1)
            ->orderBy(self::COLUMN_DATE, self::ORDER_DESC)
            ->get();
    }

    public function getFastest(?string $hazardous): Collection
    {
        $hazardous = ($hazardous === self::HAZARDOUS_FALSE || $hazardous === null) ? 0 : 1;
        return Asteroid::where(self::KEY_HAZARDOUS, $hazardous)
            ->orderBy(self::COLUMN_SPEED, self::ORDER_DESC)
            ->get();
    }

}
