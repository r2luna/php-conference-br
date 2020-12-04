<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('livewire');
});

Route::get('example', \App\Http\Livewire\Teste::class);

Route::get('whatsapp', \App\Http\Livewire\Whatsapp::class);
