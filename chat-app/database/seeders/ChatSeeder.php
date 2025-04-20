<?php

namespace Database\Seeders;

use App\Models\Chat;
use App\Models\Message;
use Illuminate\Database\Seeder;

class ChatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Chat::factory()
            ->count(100)
            ->create()
            ->each(function ($chat) {
                $chat->messages()->saveMany(
                    Message::factory()->count(random_int(10, 100))->make()
                );
            });
    }
}

