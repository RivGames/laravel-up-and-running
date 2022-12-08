<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 1;
});
Route::match(['get','post'],'match',function(){
    return 'match';
});
Route::any('any',function(){
   return 'any';
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
