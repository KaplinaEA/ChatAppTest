<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class MessagePreviewResource extends JsonResource
{
    public function toArray(Request $request): ?array
    {
        $resource = $this->resource;
        if ($resource === null) {
            return null;
        }

        return [
            'id' => $resource->id,
            'preview' => substr($resource->text, 0, 100),
        ];
    }
}
