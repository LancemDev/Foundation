<?php

use App\Livewire\Welcome;
use App\Livewire\ShowVideos;
use App\Livewire\Recommendations;
use App\Livewire\Trending;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', ShowVideos::class);
Route::get('/home', ShowVideos::class);
Route::get('/recommendations', Recommendations::class);
Route::get('/trending', Trending::class);
