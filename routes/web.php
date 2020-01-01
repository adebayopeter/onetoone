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

use App\User;
use App\Address;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert/{id}', function($id){

    $user = User::findOrFail($id);

    $address = new Address(['name' => '30 Akute-Ajuwon Ifo LGA']);

    $user->address()->save($address);

});

Route::get('/update/{id}', function($id){
    
    $address = Address::where('user_id', $id)->first();

    $address->name = "2345 Updated Avenue Liverpool, UK";

    $address->save();

});

Route::get('/read/{id}', function($id){

    $user = User::findOrFail($id);

    echo $user->address->name;

});

Route::get('/delete/{id}', function($id){

    $user = User::findOrFail($id);

    $user->address()->delete();

    return "done";

});