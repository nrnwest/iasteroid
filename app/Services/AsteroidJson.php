<?php

declare(strict_types=1);

namespace App\Services;

class AsteroidJson
{
    private const START_DATE = '{startDate}';
    private const END_DATE = '{endDate}';
    private const FORMAT_DATE = 'Y-m-d';


    private string $getData;

    public function __construct()
    {
        $this->getData = config('iasteroid.getData');
    }

    public function get()
    {
        return self::{$this->getData}();
    }

    private function nasa()
    {
        $search = [self::START_DATE, self::END_DATE];

        $replace = [
            date(self::FORMAT_DATE, (time() - config('iasteroid.period'))),
            date(self::FORMAT_DATE, time())
        ];
        $url = config('iasteroid.url') . config('iasteroid.api_key');
        return json_decode(file_get_contents(str_replace($search, $replace, $url)));
    }

    private function file()
    {
        return json_decode(file_get_contents(config('iasteroid.path_file')));
    }

}
