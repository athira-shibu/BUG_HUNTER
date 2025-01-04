<?php
declare(strict_types=1);

namespace App\Constants\Bug;

use MyCLabs\Enum\Enum;

class BugStatusEnum extends Enum
{
    public const OPEN = 'open';

    public const IN_PROGRESS = 'in-progress';

    public const RESOLVED = 'resolved';

    public const CLOSED = 'closed';
}
