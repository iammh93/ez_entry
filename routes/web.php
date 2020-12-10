<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['namespace' => 'App\Http\Dashboard\Controllers'], function() {
    Route::get('/', 'DashboardController@index')->name('dashboard.main.get');
    // Route::post('submitEntryForm', 'DashboardController@postSubmitEntryForm')->name('dashboard.entry-form.post');
});

Route::group(['namespace' => 'App\Http\Entry\Controllers'], function() {
    Route::multistep('/entry', 'EntryFormController')
    ->steps(1)
    ->name('entry.entry-form');

    Route::multistep('/entry', 'EntryFormController')
    ->steps(2)
    ->name('entry.entry-form');

    Route::multistep('/entry', 'EntryFormController')
    ->steps(3)
    ->name('entry.entry-form');
});
