<?php
declare(strict_types=1);

namespace App\DataTransferObjects\Bug;

use App\Constants\Bug\BugSeverityEnum;
use App\Constants\Bug\BugStatusEnum;
use DateTime;

final class BugCreateDto
{
    private string $title;

    private string $description;

    private BugSeverityEnum $severity;

    private BugStatusEnum $status;

    private DateTime $raisedAt;

    private ?string $solution;

    public function __construct(
        string $title,
        string $description,
        BugSeverityEnum $severity,
        BugStatusEnum $status,
        DateTime $raisedAt,
        ?string $solution = null,
    ) {
        $this->title = $title;
        $this->description = $description;
        $this->severity = $severity;
        $this->status = $status;
        $this->raisedAt = $raisedAt;
        $this->solution = $solution;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getSeverity(): BugSeverityEnum
    {
        return $this->severity;
    }

    public function getStatus(): BugStatusEnum
    {
        return $this->status;
    }

    public function getRaisedAt(): DateTime
    {
        return $this->raisedAt;
    }

    public function getSolution(): ?string
    {
        return $this->solution;
    }
}
