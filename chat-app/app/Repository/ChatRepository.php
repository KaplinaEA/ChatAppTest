<?php

namespace App\Repository;

use App\Helpers\Dto\Request\CursorDto;
use App\Models\Chat;
use Illuminate\Database\Eloquent\Builder;

class ChatRepository extends AbstractRepository
{
    public function __construct()
    {
        parent::__construct(Chat::class);
    }

    public function list(CursorDto $cursorDto): Builder
    {
        $query = $this->newQuery();
        $query->select(['id', 'name', 'created_at', 'updated_at', 'last_message_id']);
        if (!is_null($cursorDto->date) && !is_null($cursorDto->key)) {
            $query->where('updated_at', '<', $cursorDto->date)
                ->orWhere(function ($query) use ($cursorDto) {
                    $query->where('updated_at', '=', $cursorDto->date)
                        ->where('id', '<=', $cursorDto->key);
                });
        }
        $query->with(['lastMessage:id,text'])
            ->orderByDesc('updated_at')
            ->limit(CursorDto::LIMIT + 1);
        return $query;
    }
}
