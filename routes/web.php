<?php

use Illuminate\Support\Facades\Route;

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{id}',['as'=>'home.post','uses'=>'AdminpostsController@post']);




Route::group(['middleware'=>'admin'],function(){
  
    Route::get('/admin', function(){
        return view('admin.index');
    }
    );

    Route::resource('/admin/posts', 'AdminpostsController');
    Route::resource('/admin/users', 'AdminusersController');
    Route::resource('/admin/categories', 'AdminCategoriesController');
    Route::resource('/admin/media', 'AdminmediaController');
    Route::resource('/admin/comments', 'PostCommentsController');
    Route::resource('/admin/comments/replies', 'CommentRepliesController');

    

}

);