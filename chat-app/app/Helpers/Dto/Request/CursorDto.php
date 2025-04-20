<?php

namespace App\Helpers\Dto\Request;

final readonly class CursorDto
{
    public const int LIMIT = 20;

    public function __construct(public ?string $key, public ?string $date)
    {
    }
}
