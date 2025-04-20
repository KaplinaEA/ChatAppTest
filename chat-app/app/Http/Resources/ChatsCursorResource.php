<?php

namespace App\Http\Resources;

use App\Helpers\Dto\Request\CursorDto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class ChatsCursorResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $key = null;
        $date = null;
        $chats = [];
        $resource = $this->resource;
        if ($resource !== null && !$resource->isEmpty()) {
            if($resource->count() > CursorDto::LIMIT) {
                $last = $resource->pop();
                $key = $last->id;
                $date = $last->updated_at;
            }
            $chats = ChatCollectionResource::make($resource)->toArray($request);
        }

        return [
            'chats' => $chats,
            'nextPage' => [
                'key' => $key,
                'date' => $date?->format('Y-m-d H:i:s')
            ]
        ];
    }
}
