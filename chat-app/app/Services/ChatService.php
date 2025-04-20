<?php

namespace App\Services;

use App\Helpers\Dto\Request\CursorDto;
use App\Repository\ChatRepository;
use Illuminate\Support\Collection;

final readonly class ChatService
{
    public function __construct(private ChatRepository $chatRepository)
    {
    }

    public function getlist(CursorDto $cursorDto): Collection
    {
        return $this->chatRepository->list($cursorDto)->get();
    }
}
