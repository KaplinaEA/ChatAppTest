<?php

use App\Http\Controllers\ChatController;
use Illuminate\Support\Facades\Route;

Route::get('/chats/list', [ChatController::class, 'listByTime'])->name('chats.list');
