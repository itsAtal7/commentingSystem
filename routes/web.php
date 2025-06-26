<?php

use App\Livewire\HomePage;
use App\Livewire\ShowPost;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class);
Route::get('/posts/{post}', ShowPost::class);