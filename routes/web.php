<?php

use App\Livewire\HomePage;
use App\Livewire\Posts\Show;
use Illuminate\Support\Facades\Route;

Route::get('/', HomePage::class)->name('home');
Route::get('/posts/{post}', Show::class);