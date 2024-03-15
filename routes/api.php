<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


use Illuminate\Support\Facades\Redirect;
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
    return $request->user();
});

Route::prefix('/user')->group(function() {
    global $users;

    Route::get('/', function () use ($users) {
        return $users;
    });

    Route::get('/{userIndex}', function ($userIndex) use ($users) {
        if (isset($users[$userIndex])) {
            return $users[$userIndex];
        } else {
            return "Don't find";
        }
    });

    Route::get('/{userName}', function ($userName) use ($users) {
        foreach ($users as $user) {
            if ($user['name'] === $userName) {
                return $user;
            }
        }
        return "Don't find";
    });


    Route::get('/{userIndex}/post/{postIndex}', function ($userIndex, $postIndex) {
        global $users;
        if (isset($users[$userIndex])) {
            $user = $users[$userIndex];
            $posts = $user['posts'];

            if (isset($posts[$postIndex])) {
                $post = $posts[$postIndex];
                return $post;
            } else {
                return response("Cannot find the post with index $postIndex");
            }
        } else {
            return response("Cannot find the user with index $userIndex");
        }
    });
    
    Route::fallback(function () {
        return "Don't find";
    });
}) ;