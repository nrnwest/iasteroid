<?php

declare(strict_types=1);

namespace App\Exceptions;

class ErrorPathFile extends \Exception
{
    private const MESSAGES = 'the specified file does not exist: ';

    public function __construct(?string $message = "")
    {
        parent::__construct(self::MESSAGES . $message);
    }
}
