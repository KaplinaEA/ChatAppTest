<?php

namespace App\Models\Observers;

use App\Models\Message;

class MessageObserver
{
    public function created(Message $message): void
    {
        $chat = $message->chat;
        $chat->last_message_id = $message->id;
        $chat->save();
    }
}
