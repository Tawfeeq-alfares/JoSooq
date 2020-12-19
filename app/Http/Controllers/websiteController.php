<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispotchesJobs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;
use DB;
use App\User;
use App\Categorie;
use App\SubCategorie;
use App\Posttype;
use App\Post;
use App\Masseg;
class websiteController extends Controller
{

	//show home
	public function home(){

		$categories = Categorie::all();
		return view('website.home',compact("categories"));
	}

 //show Catigories 
	public function catigories(){

		$categories 	  = Categorie::all();
		$fcategories 	  = $categories[0]->categ_name;
		$subcategories 	  = Subcategorie::all();
		$posts 			  = Post::all();
		$education 			  = Subcategorie::where('categ_name',$fcategories)->get();
		return view('website.catigories',compact("categories","subcategories","posts","education"));
	}

	public function subcatigories(Request $request){
		$id = Request('id');
		
		$subcategories = Subcategorie::where('categ_id',$id)->get();
		
		return response()->json(['status' => true, 'subcategories' => $subcategories]);
	}

 //get all select_catigories
	public function addpost(){
		$posttypes = Posttype::all();
		$categories = Categorie::all();
		return view('website.add_post',compact("categories","posttypes"));
	}

	 public function gettypes(Request $request){

    	$type = Request('type');
    	$types = Subcategorie::where('categ_name',$type)->get();

    	//echo $types;
    	$typename[]="";
    	foreach ($types as $type ) {

    		//echo $type->sub_name;
    		$typename[] = $type->sub_name;
    	}
    	//print_r($typename);

	return response()->json(['status' => true,'t' =>$typename]);

    }






 //insert post
	public function insertpost(Request $request){


		//validate
		$validatedData = $request->validate([

			'titlepost' 	 => 'required|min:3',
			'descriptionpost' 	 => 'required|min:10',
			'namepost'  => 'required',
			'mobilepost' => 'required|min:10',
			'emailpost'  => 'required',
			'selectcategorie' => 'required',

		]);


		
		$posttypeselect	    = Request('posttypeselect');
		$subcategorieselect = Request('subcategorieselect');
		$titlepost 			= Request('titlepost');
		$descriptionpost 	= Request('descriptionpost');
		$namepost 			= Request('namepost');
		$mobilepost 		= Request('mobilepost');
		$emailpost 			= Request('emailpost');
		$test 				= Request('selectcategorie');

		// get the categorie
		$categorie   	  = Categorie::where('categ_name',$test)->get();
		$categorieid 	  = $categorie[0]->categ_id;
		//get the sub
		$subcategorie 	  = Subcategorie::where('sub_name',$subcategorieselect)->get();

		$subcategorieid = null;
		if(count($subcategorie) > 0){
			$subcategorieid   = $subcategorie[0]->sub_id;
		}
		
		//get the postype
		$posttype 		  = Posttype::where('post_type_name',$posttypeselect)->get();
		$posttypeselectid = $posttype[0]->post_type_id;


 	$post=Post::create([
 		'post_title'  	   => $titlepost, 
 		'post_description' => $descriptionpost,
 		'post_name' 	   => $namepost,
 		'post_phone'   	   => $mobilepost, 
 		'post_email'   	   => $emailpost,
 		'post_type_id' 	   => $posttypeselectid,
 		'categ_id'         => $categorieid, 
 		'sub_id'  	  	   => $subcategorieid,
 	]);

 	return redirect("/all_ads/".$categorieid);


 }

 // Show All Posts
 public function showallposts($id){
 	$categories 	   = Categorie::all(); 
 	$categories2       = Categorie::where('categ_id',$id)->get();
 	$subcategories 	   = Subcategorie::all();
 	$allposts 		   = Post::all();
 	$postsforcategorie = Post::where('categ_id',$id)->get();
 	$poststype1        = Post::where('categ_id',$id)->where('post_type_id','1')->get();
 	$poststype2        = Post::where('categ_id',$id)->where('post_type_id','2')->get();

 	return view('website.all_ads',compact("allposts","postsforcategorie","categories","subcategories","categories2","poststype1","poststype2"));
 }
 

 public function showallsingleposts($id){

 	$post  	 = Post::where('post_id',$id)->get();
 	$categid = $post[0]->categ_id;

	$categories    = Categorie::where('categ_id',$categid)->get();
 	$subcategid    = $post[0]->sub_id;
 	
 	$subcategories = Subcategorie::where('sub_id',$subcategid)->get();
 	/*if (empty($subcategid) || $subcategid == null) {
 		return redirect('/home'); 		
 	}else{
 		*/
 	return view('website.single_ads',compact("post","categories","subcategories"));
//}
 }

//show massege page
 public function showmassege(){

 	return view('website.contactus');
 }

 // send massege
 public function sendmassege(Request $request){

 		//validate
 	$validatedData = $request->validate([

 		'namemsg' 	 => 'required',
 		'emailmsg' 	 => 'required',
 		'phonemsg' 	 => 'required',
 		'textmsg' 	 => 'required|min:15',

 	]);


 	$name  = Request('namemsg');
 	$email = Request('emailmsg');
 	$phone = Request('phonemsg');
 	$text  = Request('textmsg');


 	$msg = Masseg::create([

 		'msg_name'  => $name ,
 		'msg_email' => $email ,
 		'msg_phone' => $phone ,
 		'msg_text'  => $text ,

 	]);

 	return redirect('/home');
 }

}
