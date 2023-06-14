<?php

use Illuminate\Support\Facades\Route;
use Auth;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/setup',function (){
    $credentials = [
        'email' => 'admin@admin.com',
        'password' => 'password'
    ];


    if(!Auth::attempt($credentials)){
        $user = new \App\Models\User();
        $user->name = "Admin";
        $user->email = "admin@admin.com";
        $user->password = \Illuminate\Support\Facades\Hash::make($credentials['password']);
        $user->save();

        if(Auth::attempt($credentials)){

            $user = Auth::user();

            $adminToken = $user->createToken('adminToken',['create','update','delete']);
            $updateToken = $user->createToken('updateToken',['create','update']);
            $basicToken = $user->createToken('basicToken');

            return [
                'admin' => $adminToken->plainTextToken,
                'update' => $updateToken->plainTextToken,
                'basic' => $basicToken->plainTextToken,
            ];
        }

    }
});
