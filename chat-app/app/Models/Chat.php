<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\{BelongsTo, HasMany};

class Chat extends Model
{
    use HasUuids;
    use HasFactory;

    protected $table = 'chats';

    protected $keyType = 'string';

    protected function casts(): array
    {
        return [
            'id' => 'string',
            'name' => 'string',
            'last_message_id' => 'string',
        ];
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'chat_id');
    }

    public function lastMessage(): BelongsTo
    {
        return $this->belongsTo(Message::class, 'last_message_id');
    }
}
