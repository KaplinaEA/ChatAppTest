<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursorRequest;
use App\Http\Resources\ChatsCursorResource;
use App\Services\ChatService;

final class ChatController
{
    public function listByTime(CursorRequest $request, ChatService $chatService): ChatsCursorResource
    {
        $cursor = $request->toDto();
        $list = $chatService->getlist($cursor);
        return ChatsCursorResource::make($list);
    }
}
