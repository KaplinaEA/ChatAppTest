<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('messages', static function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->timestamps();
            $table->text('text');
            $table->index('created_at');
            $table->uuid('chat_id')->index();
            $table->foreign('chat_id')->references('id')->on('chats')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
