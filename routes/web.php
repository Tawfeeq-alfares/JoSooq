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

# layouts
Route::get('/auth', function () { return view('layouts.auth'); });
Route::get('/webmain', function () { return view('layouts.webmain'); });
Route::get('/adminmain', function () { return view('layouts.adminmain'); });


# Auth

//show register page
Route::get('/registeruser','authController@registerpage');
//inser tuser
Route::post('/insertuser','authController@insertuser');
//show login page
Route::get('loginpage','authController@loginpage');
//chick user
Route::post('/chickuser','authController@chickuser');
//insert Admin
Route::post('/insertadmin','authController@insertadmin');
//logout user
Route::get('/logout', function() {
   session()->flush();
  	
      return redirect('/home'); 
});



# admin

Route::group(["middleware" => "admin"],function(){
	//Show Admin Home
Route::get('/admin/home','adminController@adminhome');
//get all users
Route::get('/showusers','adminController@showusers');
//delete user
Route::get('/deleteuser/{user_id}','adminController@deleteUser');
//get all categories
Route::get('/showcategories','adminController@showcategories');
});

//add categorie
Route::post('/addCategorie','adminController@addCategorie');
//delete categorie
Route::get('/deletecategorie/{categ_id}','adminController@deleteCategorie')->middleware("admin");
//get categories for id
Route::get('/editcategorie/{categ_id}','adminController@editCategorie')->middleware("admin");
//update categorie
Route::post('/ubdateCategorie/{categ_id}','adminController@updateCategorie');
//get all subCategories
Route::get('/showsubCategories','adminController@showsubCategories')->middleware("admin");
//add subcategorie
Route::post('/addSubCategorie','adminController@addSubCategorie');
//delete Subcategorie
Route::get('/deletesubcategorie/{sub_id}','adminController@deleteSubCategorie')->middleware("admin");
//get Subcategories for id
Route::get('/editesubcategorie/{sub_id}','adminController@editsubCategorie')->middleware("admin");
//Update SubCategorie
Route::post('/ubdateSubcategorie/{sub_id}','adminController@ubdateSubcategorie');
//get posts
Route::get('/showposts/{categ_id}','adminController@showposts')->middleware("admin");
//show masseges
Route::get('/showmasseges','adminController@showmasseges')->middleware("admin");
//delete massege
Route::get('/deletemassege/{msg_id}','adminController@deleteMassege')->middleware("admin");
//show register page
Route::get('/registeradmin','authController@registerAdminPage')->middleware("admin");


# WebSite
//home site
Route::get('/home','websiteController@home');
//Catigoriews site
Route::get('/catigories','websiteController@catigories');
//sub Catigories
Route::post('/subcatigories','websiteController@subcatigories'); //ajax
// select Categories site
Route::get('/addpost', 'websiteController@addpost')->middleware("auth");
//get sub
Route::post('/gettypes','websiteController@gettypes');
//inserte post
Route::post('/insertpost','websiteController@insertpost');
//show all posts
Route::get('/all_ads/{categ_id}','websiteController@showallposts');
//show single post
Route::get('/single_ads/{post_id}', 'websiteController@showallsingleposts');
//show massege page
Route::get('/contactus','websiteController@showmassege');
//massege
Route::post('/massege','websiteController@sendmassege');


Route::get('/faq', function () { return view('website.faq'); });
Route::get('/feedback', function () { return view('website.feedback'); });
Route::get('/how_it_works', function () { return view('website.how_it_works'); });
Route::get('/privacy_policy', function () { return view('website.privacy_policy'); });
Route::get('/sitemap', function () { return view('website.sitemap'); });
Route::get('/termsofuse', function () { return view('website.termsofuse'); });
