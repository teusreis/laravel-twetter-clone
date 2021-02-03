<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FollowCotroller;
use App\Http\Controllers\TweetController;
use App\Http\Controllers\ExploreController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|thin a group which
| contains the "web" middleware group. Now create something great!
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider wi
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/', [TweetController::class, "index"])->name("home");

Route::prefix("/tweets")->group(function () {
    Route::post('/', [TweetController::class, "store"]);
    Route::post('/{tweet}/like', [TweetController::class, "like"])->name("tweet.like");
    Route::post('/{tweet}/dislike', [TweetController::class, "dislike"])->name("tweet.dislike");
    Route::delete('/{tweet}/delete', [TweetController::class, "delete"])->name("tweet.delete");
});

Route::prefix("/profile")->group(function () {

    Route::get("/{user:username}/show", [ProfileController::class, "show"])->name("profile.show");
    Route::get("/{user:username}/edit", [ProfileController::class, "edit"])->name("profile.edit");
    Route::patch("/{user:username}/update", [ProfileController::class, "update"])->name("profile.update");

    Route::post("/{user:username}/follow", [FollowCotroller::class, "store"])->name("profile.follow");
    Route::delete("/{user:username}/unfollow", [FollowCotroller::class, "delete"])->name("profile.unfollow");
});

Route::get("/explore", [ExploreController::class, "index"])->middleware("auth")->name("explore.index");
