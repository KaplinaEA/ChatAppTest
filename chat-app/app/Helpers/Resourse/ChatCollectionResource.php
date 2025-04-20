<?php

namespace App\Helpers\Resourse;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ChatCollectionResource extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return $this->collection
            ->map(static fn(Chat $item) => ChatResource::make($item))
            ->toArray();
    }
}
