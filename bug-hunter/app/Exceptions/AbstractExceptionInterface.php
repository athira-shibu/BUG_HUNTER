<?php
declare(strict_types=1);

namespace App\Exceptions;

interface AbstractExceptionInterface
{
    /**
     * Get error code.
     *
     * @return int
     */
    public function getErrorCode(): int;

    /**
     * Get error sub code.
     *
     * @return int
     */
    public function getErrorSubCode(): int;

    /**
     * Http status code.
     *
     * @return int
     */
    public function getStatusCode(): int;

    /**
     * Get message parameters.
     *
     * @return mixed[]
     */
    public function getMessageParameters(): array;

    public const STATUS_CODE_RUNTIME = 500;

    public const ERROR_CODE_RUN_TIME = 5000;
}