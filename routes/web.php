<?php

use App\Http\Controllers\TasksController;
use App\Http\Controllers\MySampleResourceController;
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
//Route::get('invitations',['invitation' => '12345','answer' => 'yes']);
Route::get('tasks',[TasksController::class,'index']);
Route::get('tasks/create',[TasksController::class,'create']);
Route::post('tasks',[TasksController::class,'store']);
Route::resource('test',MySampleResourceController::class);
Route::get('redirect-users-comments-show',function(){
   return redirect()
       ->route('users.comments.show',['id' => 10])
       ->with(['error' => true, 'message' => 'Whoops...Something went wrong']);
});
Route::get('redirect-to-/',function(){
   return redirect('/');
});
Route::get('download',function(){
    return response()->download('1.txt','readme.txt');
});
