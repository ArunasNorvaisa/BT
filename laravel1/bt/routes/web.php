<?php

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

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('radarai', function () {
    $radaras = [
        'id' => 1,
        'date' => '2017-11-11',
        'number' => 'AAA001',
        'distance' => 100,
        'time' => 10,
        'created_at' => '2018-05-15'
    ];
    return view('radarai.index', ['radar' => $radaras]);
});
*/

Route::get('radarai', function () {
    $radarai = \App\Radar::all();
    return view('radarai.index', ['radars' => $radarai]);
});

Route::get('radarai/{id}', function ($id) {
    $radarai = \App\Radar::find($id);
    return view('radarai.show', ['radar' => $radarai]);
})->name('radar.show');

Route::get('drivers', function () {
    $drivers = \App\Drivers::all();
    return view('drivers.index', ['drivers' => $drivers]);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
