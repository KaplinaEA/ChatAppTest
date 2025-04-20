<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

Route::get('/chats/list', [Controller::class, 'listByTime']);
