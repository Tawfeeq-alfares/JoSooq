<?php

namespace App\Http\Controllers;

use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispotchesJobs;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Hash;
use Exception;
use DB;
use Validator;
use Session;
use App\User;
use App\Categorie;
use App\Subcategorie;
use App\Post;
use App\Masseg;


class APIController extends Controller
{
	//show users
	public function getusers(Request $request){

		$users = User::all();
		return Response($users);
	}

    //register
	public function register(Request $request){

		$name = $request->input('name');
		$email=$request->input('email');
		$phone=$request->input('phone');
		$password=$request->input('password');
		$user_type=$request->input('user_type_id');

		User::create([

			'user_name'		=> $name,
			'email'      	=> $email,
			'user_phone'	=> $phone,
			'password'      => Hash::make($password),
			'user_type_id'  => $user_type,
		]);

		return response()->json(['messg'=>'ok']);
	}

    //delete user
	public function deleteuser(Request $request){

		$id = $request->input('id');
		User::where('user_id',$id)->firstorfail()->delete();
    	//User::findOrFail($id)->delete();
		return response()->json(['messg'=>'ok']);
	}

    //get all categories
	public function getCategories(){

		$categories = Categorie::all();

		return Response($categories);
	}

    //inserte categorie
	public function addCategorie(Request $request){

		$categoriename    = $request->input('categoriename');

		if ($request->hasFile('categorieimage')) {

			$image = $request->file('categorieimage');

            $image_name = time() . '.' . $image->getClientOriginalExtension(); // to get image

            $destinationPath = $image->storeAs('public/uploades/', $image_name);
        }

        $image = Categorie::create([
        	'categ_name' => $categoriename, 
        	'categ_image' => $image_name,
        ]);

        return response()->json(['status' => true, 'image' => $image]);

    }



      //Delete Categorie
    public function deleteCategorie(Request $request){

    	$categid = $request->input('categid');
    	Categorie::where('categ_id',$categid)->firstorfail()->delete();
    	//User::findOrFail($id)->delete();
    	return response()->json(['messg'=>'ok']);
    }


     //Update Categorie
    public function updateCategorie(Request $request){

    	$id= $request->input('id');

    	if ($request->hasFile('categorieimage')) {

    		$image = $request->file('categorieimage');

            $image_name = time() . '.' . $image->getClientOriginalExtension(); // to get image

            $destinationPath = $image->storeAs('public/uploades/', $image_name);
        }

        $updatecategorie =Categorie::find($id);
        $updatecategorie->categ_name =$request->input('updatecategname');
        $updatecategorie->categ_image =$image_name;
        $updatecategorie->save();


        return response()->json(['messg'=>'ok']);

    }

      //get all sub SubCategories
    public function getSubCategories(){

    	$subcategories = Subcategorie::all();

    	return response($subcategories);
    }

      //add SubCategorie
    public function addSubCategorie(Request $request){
    	$subname   = $request->input('subname');
    	$categid   = $request->input('categid');
    	$categname = $request->input('categname');

    	Subcategorie::create([

    		'sub_name' 	 => $subname,
    		'categ_id'   => $categid,
    		'categ_name' => $categname,
    	]);

    	return response()->json(['messg'=>'ok']); 

    }

      //delete SubCategorie
    public function deleteSubCategorie(Request $request){

    	$subcategid = $request->input('subcategid');
    	Subcategorie::where('sub_id',$subcategid)->firstorfail()->delete();
    	//User::findOrFail($categid)->delete();
    	return response()->json(['messg'=>'ok']);
    }

      //update SubCategorie
    public function updateSubCategorie(Request $request){
    	$subid 	   = $request->input('subid');
    	$subname   = $request->input('subname');
    	$categid   = $request->input('categid');
    	$categname = $request->input('categname');

    	$updatesubcategorie =Subcategorie::find($subid);
    	$updatesubcategorie->sub_name   = $subname;
    	$updatesubcategorie->categ_id   = $categid;
    	$updatesubcategorie->categ_name = $categname;
    	$updatesubcategorie->save();

    	return response()->json(['messg'=>'ok']);

    }

    public function posts(Request $request){

    	$idpost = $request->input('postid');

    	if ($idpost == 'all') {

    		$posts = Post::all();
    	}else{

    		$posts = Post::where('categ_id',$idpost)->get(); 
    	}


    	return response($posts);
    }

    //get all Masseges
    public function getMasseges(){

    	$masseges = Masseg::all();

    	return response($masseges);
    }

    //delete massege
    public function deleteMassege(Request $request){

    	$massegeid = $request->input('massegeid');
		Masseg::where('msg_id',$massegeid)->firstorfail()->delete();
    	//User::findOrFail($id)->delete();
		return response()->json(['messg'=>'ok']);
    }


    /*public function CategAndSub(){ 

    	
    	$categories = Categorie::with('subcategories')->get();

    	//return response($categories)->with;
    	return response($categories);
    }
    */

 

}
