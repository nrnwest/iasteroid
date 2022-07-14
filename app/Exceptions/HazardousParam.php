<?php

declare(strict_types=1);

namespace App\Exceptions;

class HazardousParam extends \Exception
{
    private const MESSAGES = 'valid values: false or true. you specified: ';

    public function __construct(?string $message = "")
    {
        parent::__construct(self::MESSAGES . $message);
    }
}
