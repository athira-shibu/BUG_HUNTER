<?php
declare(strict_types=1);

namespace App\Exceptions;

use App\Exceptions\AbstractException;

abstract class RunTimeException extends AbstractException
{
    /**
     * Run time exception status code.
     */
    public function getStatusCode(): int
    {
        return self::STATUS_CODE_RUNTIME;
    }
}
