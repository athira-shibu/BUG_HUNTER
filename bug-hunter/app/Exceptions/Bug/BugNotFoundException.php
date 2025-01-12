<?php
declare(strict_types=1);

namespace App\Exceptions\Bug;

use App\Exceptions\RunTimeException;

final class BugNotFoundException extends RunTimeException
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
