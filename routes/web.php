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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('movie','App\Http\Controllers\MoviesController');



//Edit Added
Route::Get('edit{id}','App\Http\Controllers\MoviesController@edit');

//Update Added
/*Route::post('edit/{id}','App\Http\Controllers\MoviesController@update');*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::put('/Admin-Update/{id}','App\Http\Controllers\Admin\DashboardController@AdminRegister');
Route::delete('/User-deleted{id}','App\Http\Controllers\Admin\DashboardController@destroy');

Route::group(['middleware'=> ['auth','admin']],function (){

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    });
    Route::get('/create', function () {
        return view('movie.create');
    });
    Route::get('/registered-users','App\Http\Controllers\Admin\DashboardController@registered');
    Route::get('/Admin-Profile','App\Http\Controllers\Admin\DashboardController@AdminProfile');
    Route::get('/Admin-edit{id}','App\Http\Controllers\Admin\DashboardController@AdminEdit');






});
