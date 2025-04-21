<?php

namespace App\Models;

use App\Models\Observers\MessageObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([MessageObserver::class])]
class Message extends Model
{
    use HasUuids;
    use HasFactory;

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
