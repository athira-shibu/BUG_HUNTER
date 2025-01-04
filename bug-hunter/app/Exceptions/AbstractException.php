<?php
declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Throwable;

abstract class AbstractException extends Exception implements AbstractExceptionInterface
{
    private array $messageParameters;

    /**
     * @param string|null $message
     * @param array|null $messageParameters
     * @param int|null $code
     * @param \Throwable|null $previous
     */
    public function __construct(
        ?string $message = null,
        ?array $messageParameters = null,
        ?int $code = null,
        ?Throwable $previous = null
    ) {
        parent::__construct($message ?? '', $code ?? 0, $previous);

        $this->messageParameters = $messageParameters ?? [];
    }

    /**
     * @return mixed[]
     */
    public function getMessageParameters(): array
    {
        return $this->messageParameters;
    }
}