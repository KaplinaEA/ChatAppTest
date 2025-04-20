<?php

namespace App\Http\Resources;

use App\Models\Chat;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

final class ChatCollectionResource extends ResourceCollection
{
    public function toArray(Request $request): array
    {
        return $this->collection
            ->map(static fn(Chat $item) => ChatResource::make($item))
            ->toArray();
    }
}
