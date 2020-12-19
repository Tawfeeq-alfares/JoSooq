<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



//get all users
Route::get('/users','APIController@getusers');
//insert user
Route::post('/register','APIController@register');
//delete user
Route::post('/deleteuser','APIController@deleteuser');
//get all categories
Route::get('/categories','APIController@getCategories');
//add Categorie
Route::post('/addcategorie','APIController@addCategorie');
//delete Categorie
Route::post('/deletecategorie','APIController@deleteCategorie');
//update categorie
Route::post('/updatecategorie','APIController@updateCategorie');
//get all subcategories
Route::get('/subcategories','APIController@getSubCategories');
//add subcategorie
Route::post('/addsubcategorie','APIController@addSubCategorie');
//delete subcategorie 
Route::post('/deletesubcategorie','APIController@deleteSubCategorie');
//ubpdate subcategorie
Route::post('/updatesubcategorie','APIController@updateSubCategorie');
//get all post
Route::post('/posts','APIController@posts');
//get all masseges
 Route::get('user', 'Api\AuthPassportController@details');
//delete massege
Route::post('/deletemassege','APIController@deleteMassege');


//Route::get('/categandsub','APIController@CategAndSub');

/*
Route::group(['middleware' => 'auth:api'], function(){
    Route::get('/masseges','APIController@getMasseges');


});

Route::middleware('auth:api')->group(function () {
   
});