<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Message extends Model
{
    use HasUuids;

    protected $table = 'messages';

    protected $keyType = 'string';

    protected $touches = ['chat'];

    protected function casts(): array
    {
        return [
            'id' => 'string',
            'text' => 'string',
            'chat_id' => 'string',
        ];
    }

    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class, 'chat_id');
    }
}
