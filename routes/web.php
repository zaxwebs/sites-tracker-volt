<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
	->middleware(['auth', 'verified'])
	->name('dashboard');

Route::view('profile', 'profile')
	->middleware(['auth'])
	->name('profile');

Volt::route('/domains/create', 'create-domain');
Volt::route('/domains/manager', 'domains');
Volt::route('/domains', 'index-domains');
Volt::route('/domains/{id}', 'show-domain');

Volt::route('/tags/create', 'create-tag');
Volt::route('/tags', 'index-tags');

require __DIR__ . '/auth.php';
