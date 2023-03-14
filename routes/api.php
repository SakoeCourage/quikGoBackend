<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Location;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return ([
        "user" => $request->user(),
        "businessprofile" => $request->user()->businessprofile,
        "checkbusinessprofile" => $request->user()->checkbusinessprofile
    ]);
});
Auth::routes();
Route::middleware('auth')->post('/getuser', function () {

    return ([
        "user" => request()->user(),
        "businessprofile" => request()->user()->businessprofile ?? null,
       
    ]);
});

Route::get('/', function () {
    return ([
        "Ad" => Ad::latest()->limit(10)->get(),
        "Category" => Category::All()
    ]);
});

Route::get('/ads', [\App\Http\Controllers\adsController::class, 'getads']);
Route::post('/ad/delete', [\App\Http\Controllers\adsController::class, 'deletead']);

Route::get('/{user:name}/profile', [\App\Http\Controllers\Userprofile::class, 'index']);


Route::get('/location', function () {
    return Location::all();
});

Route::get('/category', function () {
    return Category::all();
});




Route::get('/businessprofile', [\App\Http\Controllers\BusinessprofileController::class, 'index']);
Route::post('/businessprofile', [\App\Http\Controllers\BusinessprofileController::class, 'store']);
Route::put('/businessprofile', [\App\Http\Controllers\BusinessprofileController::class, 'update']);


Route::get('/ads/postad', [\App\Http\Controllers\adsController::class, 'index']);
Route::post('/ads/postad', [\App\Http\Controllers\adsController::class, 'store']);
Route::get('/ads/{ad:slug}', [\App\Http\Controllers\ViewAddController::class, 'index']);


Route::post('/ads/likead',[\App\Http\Controllers\LikesController::class, 'index']);
Route::post('/ads/likers',[\App\Http\Controllers\LikesController::class, 'getLikers']);


Route::get('/user/notification',[\App\Http\Controllers\UserController::class, 'notification']);
Route::get('/user/notifications/markasread',[\App\Http\Controllers\UserController::class, 'marknotificationsasread']);

Route::post('/user/updatelogininfo',[\App\Http\Controllers\Auth\UpdateLogininfo::class, 'update']);
Route::post('/user/deleteaccount',[\App\Http\Controllers\Auth\DeleteUserAccount::class, 'deleteaccount']);

Route::get('/auth/google/redirect', [\App\Http\Controllers\Auth\GoogleOauthController::class,'index']);

Route::post('/auth/google/callback', [\App\Http\Controllers\Auth\GoogleOauthController::class,'getUser']);
Route::post('/loadsubcategories', [\App\Http\Controllers\SubcategoriesController::class,'loadsubcategories']);
