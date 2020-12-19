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
use App\Post;
use App\Masseg;
class adminController extends Controller
{

  public function adminhome(){

    return view('admin.admin_home');
  }
	//get all Users
  public function showusers(){

   $users = User::all();
   return view('admin.admin_users',compact("users"));
 }

     //Delete User
 public function deleteUser($id){
   User::where('user_id',$id)->firstorfail()->delete();
   session()->flash('success','deleted success');
   return redirect("/showsubCategories");
 }

    //get all Categories
 public function showcategories(){

   $categories = Categorie::all();
   return view('admin.admin_categories',compact("categories"));
 }



   //Add Categorie
 public function addCategorie(Request $request){

  $categoriename    = Request("categoriename");

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
        public function deleteCategorie($id){
         Categorie::where('categ_id',$id)->firstorfail()->delete();
         session()->flash('success','deleted success');
         return redirect("/showcategories");
       }

    //Edit categorie
       public function editCategorie($id){
        $categorie = Categorie::find($id);
        return view('admin.update_categorie')->with('categorie',$categorie);
      }

    //Update Categorie
      public function updateCategorie($id){

        $updatecategorie =Categorie::find($id);

        
        $updatecategorie->categ_name =Request("updatecategname");
        //$updatecategorie->categ_image =Request($image_name);
        $updatecategorie->save();


        return redirect("/showcategories");

      }

        //Get SubCategories
      public function showsubCategories(){

       $subcategories = Subcategorie::all();
       $categories = Categorie::all();
       return view('admin.admin_subCategories',compact("subcategories","categories"));
     }

    // Add SubCategorie
     public function addSubCategorie(Request $request){

       $sub_name = Request('subcategoriename');
       $categ    = Request('selectcategorie');

       $categorie=Categorie::where('categ_name',$categ)->get();
       $id=$categorie[0]->categ_id;

       $image = Subcategorie::create([
        'sub_name'   => $sub_name, 
        'categ_id'   => $id,
        'categ_name' => $categ,
      ]);

       return redirect('showsubCategories');
     }


   //Delete SubCategorie
     public function deleteSubCategorie($id){
       Subcategorie::where('sub_id',$id)->firstorfail()->delete();
       session()->flash('success','deleted success');
       return redirect("/showsubCategories");
     }


    //Edit Subcategorie
     public function editsubCategorie($id){
      $subcategorie=Subcategorie::find($id);
      $categories = Categorie::all();
      return view('admin.update_subCategorie',compact("categories","subcategorie"));
    }

    //Update SubCategorie
    public function ubdateSubcategorie($id){

      $updatesubcategorie = Subcategorie::find($id);

      $updatesubcategorie->sub_name = Request('subcategoriename');
      $updatesubcategorie->categ_name = Request('selectcategorie');
      $updatesubcategorie->save();
      return redirect('/showsubCategories');
    }

    //get posts
    public function showposts($id){

      if ($id == 'all') {
        $posts = Post::all();
      }else{

       $posts = Post::where('categ_id',$id)->get(); 
     }


     return view('admin.admin_posts',compact("posts"));
   }

   //Show masseges
   public function showmasseges(){

    $masseges = Masseg::all();
    return view('admin.admin_masseges',compact('masseges'));
   }

   //Delete Massege
   public function deleteMassege($id){

         Masseg::where('msg_id',$id)->firstorfail()->delete();
         session()->flash('success','delete success');
         return redirect('/showmasseges');
   }
 }
