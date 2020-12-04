<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('livewire');
});

Route::get('example', \App\Http\Livewire\Teste::class);
