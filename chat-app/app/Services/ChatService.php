<?php

namespace App\Services;

use App\Helpers\Dto\Request\CursorDto;
use App\Http\Resources\ChatsCursorResource;
use App\Repository\ChatRepository;

final readonly class ChatService
{
    public function __construct(private ChatRepository $chatRepository)
    {
    }

    public function getlist(CursorDto $cursorDto): ChatsCursorResource
    {
        $chats = $this->chatRepository->list($cursorDto)->get();
        return ChatsCursorResource::make($chats);
    }
}
