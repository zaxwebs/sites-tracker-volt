<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Counter;
use Livewire\Volt\Volt;

Route::get('/', function () {
	return view('welcome');
});

Route::get('/counter', Counter::class);
Volt::route('/adder', 'adder');
