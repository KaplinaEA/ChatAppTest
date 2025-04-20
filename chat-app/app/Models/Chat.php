<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
        ];
    }

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class, 'chat_id');
    }

    public function lastMessage(): HasOne
    {
        return $this->hasOne(Message::class, 'chat_id')->latest();
    }
}
