<?php
declare(strict_types=1);

namespace App\Exceptions\Category;

use App\Exceptions\RuntimeException;

final class CategoryNotFoundException extends RuntimeException
{
    public function getErrorCode(): int
    {
        return self::ERROR_CODE_RUN_TIME + 014;
    }

    public function getErrorSubCode(): int
    {
        return 1;
    }
}