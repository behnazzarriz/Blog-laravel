<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/',function (){
    return view('welcome');
});
Auth::routes();
Route::get('/home','HomeController@index')->name('home');
Route::group(['middleware'=>'Admin'],function (){
    Route::resource('admin/users','Admin\AdminUserController');

    Route::resource('admin/posts','Admin\AdminPostsController');
    /*deleted all posts*/
    Route::delete('admin/deletedAll/posts','Admin\AdminPostsController@deletedAll')->name('comments.delete.all');

    Route::resource('admin/categories','Admin\AdminCategoriesController');

    Route::get('admin/photos/upload','Admin\AdminPhotosController@upload')->name('photos.upload');
    Route::resource('admin/photos','Admin\AdminPhotosController');

    Route::get('admin/dashboard','Admin\DashboardController@index')->name('dashboard.index');

    /*-----------for comments rout----------*/
          /*list of comments*/
    Route::get('admin/comments','Admin\CommentsController@index')->name('comments.index');
          /*change status of comments by admin*/
    Route::post('admin/comment/{id}','Admin\CommentsController@actions')->name('comments.actions');
          /*edit comment*/
    Route::get('admin/comment/{id}','Admin\CommentsController@edit')->name('comments.edit');
    Route::patch('admin/comment/{id}','Admin\CommentsController@update')->name('comments.update');
          /*delete comment*/
    Route::delete('admin/comment/{id}','Admin\CommentsController@destroy')->name('comments.destroy');



    /*-----------End for comments rout----------*/


});

/*routes for frontend*/
Route::get('/','Frontend\MainController@index')->name('frontend.index');
Route::get('post/{slug}','Frontend\PostController@show')->name('frontend.post.show');
Route::get('/search}','Frontend\PostController@searchTitle')->name('frontend.post.search');
Route::post('comments/{postId}','Frontend\commentsController@store')->name('frontend.Comments.Store');
Route::post('comments','Frontend\commentsController@reply')->name('frontend.comments.reply');


