<?php

namespace App\Http\Controllers;

use App\Http\Requests\CursorRequest;
use App\Services\ChatService;
use Illuminate\Http\JsonResponse;

class Controller
{
    public function listByTime(CursorRequest $request, ChatService $chatService): JsonResponse
    {
        $cursor = $request->toDto();
        $list = $chatService->getlist($cursor);
        return response()->json($list);
    }
}
