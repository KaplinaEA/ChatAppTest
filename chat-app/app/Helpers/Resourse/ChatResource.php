<?php

namespace App\Helpers\Resourse;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ChatResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $resource = $this->resource;
        if ($resource === null) {
            return [];
        }

        return [
            'id' => $resource->id,
            'createdAt' => $resource->created_at->format('Y-m-d H:i:s'),
            'updatedAt' => $resource->updated_at->format('Y-m-d H:i:s'),
            'lastMessage' => MessagePreviewResource::make($this->whenLoaded('lastMessage')),
        ];
    }
}
