<?php

use Illuminate\Support\Facades\Route;
use App\Events\MessageNotification;
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

Route::get('/product', function () {
    return view('product');
});

Route::get('/event', function () {
    try{
$jsonString = [
    ["name" => "John", "age" => 30],
    ["name" => "Jane", "age" => 25],
    ["name" => "Bob", "age" => 40]
];


    // $myJSON = json_encode($myObj);
    // var_dump($myJSON);
    event(new MessageNotification((json_encode($jsonString)) ));

    }catch(Exception $e){
        echo $e;
    }

   
});

Route::get('/listen', function () {
    return view('product');
});

