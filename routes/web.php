<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 1;
});
Route::match(['get','post'],'match',function(){
    return 'match';
});
Route::get('users/{id}/friends',function($id){
    return 'ID of YOUR FRIEND IS:' . $id;
});
Route::get('user/{id?}',function($id = ' '){
    return 'Hello ' . $id . '!';
});
Route::get('user/{name}',function($name){
    return 'Hello ' . $name . '!';
})->where('name','[A-Za-z]+');
Route::middleware('auth')->group(function(){
   Route::get('dashboard',function(){
       return view('dashboard');
   });
   Route::get('account',function(){
      return view('account');
   });
});
Route::prefix('home')->group(function(){
    Route::get('/',function(){
        return view('welcome');
    });
    Route::get('profile',function(){
       return 'home/profile/';
    });
});
Route::fallback(function(){
    return 'this route does not exists';
});
Route::domain('api.myapp.com')->group(function(){
   Route::get('/',function(){
       //something
   });
});
Route::namespace('Dashboard')->group(function(){
    //По сути просто неймспейс Dashboard добавляється до контролера
    Route::get('dashboard/purchases',[\App\Http\Controllers\PurchaseController::class,'index']);
});
Route::name('users.')->prefix('users')->group(function(){
    Route::name('comments.')->prefix('comments')->group(function(){
        Route::get('{id}',function($id){
            return 'Your id is:' . $id;
            //Повна назва роута: users.comments.show
            //URL: users/comments/{id}
        })->name('show');
    });
});
