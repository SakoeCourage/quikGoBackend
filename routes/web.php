<?php

use App\Events\Usernotification;
use Illuminate\Support\Facades\Route;
use App\Models\Ad;


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
    return view('components.homepage.landingpage')->with([
        'ads' => Ad::latest()->limit(10)->get()

    ]);
});

Route::get('/ads',[\App\Http\Controllers\adsController::class, 'getads']);

Route::get('/{user:name}/profile',[\App\Http\Controllers\Userprofile::class, 'index']);


Auth::routes();

Route::get('/businessprofile', [\App\Http\Controllers\BusinessprofileController::class, 'index'])->name('finishregistration');
Route::post('/businessprofile', [\App\Http\Controllers\BusinessprofileController::class, 'store'])->name('finishregistration');
Route::get('/welcome', 
function(){

    return view('welcome');
}
);

Route::get('/ads/postad',[\App\Http\Controllers\adsController::class, 'index'] )->middleware('auth');
Route::post('/ads/postad',[\App\Http\Controllers\adsController::class, 'store'])->middleware('auth');
Route::get('/ads/{ad:slug}',[\App\Http\Controllers\ViewAddController::class, 'index']);

Route::get('/broadcast', function(){

        broadcast(new Usernotification());
});


