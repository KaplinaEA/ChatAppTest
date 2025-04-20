<?php

namespace App\Helpers\Resourse;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MessagePreviewResource extends JsonResource
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
