<?php
declare(strict_types=1);

namespace App\Constants\Bug;

use MyCLabs\Enum\Enum;

class BugSeverityEnum extends Enum
{
    public const LOW = 'low';

    public const MEDIUM = 'medium';

    public const HIGH = 'high';

    public const CRITICAL = 'critical';
}
