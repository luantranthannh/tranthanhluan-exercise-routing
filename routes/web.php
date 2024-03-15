<?php

use Illuminate\Support\Facades\Route;

Route::get('/users', function () {
    global $users;
    $names = implode(", " , array_column($users, 'name'));
    return "There are " . $names;
});


// Route::get('api/user', function () {
//     global $users;
//     return $users;
// });

// Route::get('api/user/{index}', function (int $index) {
//     global $users;
//     if(isset($users[$index])){
//         return $users[$index];
//     }
//     else{
//         return "Couldn't find with index " . $index;
//     }
// });

// Route::get('api/user/{userName}', function ($userName) {
//     global $users;
    
//     foreach ($users as $user) {
//         if ($user['name'] === $userName) {
//             return $user;
//         }
//     }
    
//     return "Couldn't find user with userName " . $userName;
// });