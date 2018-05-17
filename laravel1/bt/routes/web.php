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

Route::get('radarai', function () {
    $radarai = \App\Radar::all();
    return view('radarai.index', ['radars' => $radarai]);
});*/

Route::prefix('radarai')->group(function () {
Route::get('/', 'RadarsController@index')->name('radars.index');
Route::get('create', 'RadarsController@create')->name('radars.create');
Route::post('create', 'RadarsController@store')->name('radars.store');
Route::get('show/{id}', 'RadarsController@show')->name('radar.show');
Route::put('update/{id}', 'RadarsController@update')->name('radars.update');
});

Route::prefix('drivers')->group(function () {
Route::get('/', 'DriversController@index')->name('drivers.index');
Route::get('show/{driverId}', 'DriversController@show')->name('drivers.show');
Route::get('create', 'DriversController@create')->name('drivers.create');
Route::post('create', 'DriversController@store')->name('drivers.store');
Route::put('update/{driverId}', 'DriversController@update')->name('drivers.update');
});

/*Route::get('drivers', function () {
    $drivers = \App\Drivers::all();
    return view('drivers.index', ['drivers' => $drivers]);
});

Route::get('drivers/{driverId}', function ($driverId) {
    $driver = \App\Drivers::find($driverId);
    return view('drivers.show', ['driver' => $driver]);
})->name('driver.show');*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
