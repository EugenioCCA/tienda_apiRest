<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productCont;
use App\Http\Controllers\sucursalCont;
use App\Http\Controllers\usercontroller;

Route::get('/user', function (Request $request) {
    return $request->user(); 
})->middleware('auth:sanctum');


Route::controller(productCont::class)->group(function () {

    //Products
    Route::post('product','saveProducts');
    Route::get('products','getProducts');
    Route::get('product/{id}','getProduct');
    Route::delete('product/{id}','deleteProduct'); 
    Route::put('product/{id}','updateProduct'); 

    
});

Route::controller(sucursalCont::class)->group(function (){
    //Branchs
    Route::post('branch','addBranch');
    Route::get('branchs','getBranchs');
    Route::get('branch/{id}','getBranch');
    Route::delete('branch/{id}','deleteBranch'); 
    Route::put('branch/{id}','updateBranch'); 
});

Route::controller(usercontroller::class)->group(function (){
    Route::post('register','register');
    Route::post('login', 'login'); 
    Route::get('users', 'getUsers'); 
    Route::post('user','saveUser'); 
    Route::delete('user/{id}','deleteUser'); 
});