<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Validator;
use Session;
use Exception;
use DB;
use App\User;
use App\Categorie;

class authController extends Controller
{
	public function registerpage(){
		return view('auth.register');
	}

    //insert users
	public function insertuser(Request $request){

    	//variables
		$user_name=Request('user_name');
		$email=Request('email');
		$user_phone=Request('user_phone');
		$password=Request('password');
		$conig_password=Request('conig_password');
		$user_type= '2';

    	//validate
		$validatedData = $request->validate([

			'user_name' 	 => 'required|min:3',
			'email' 	 => 'required|email',
			'user_phone' 	 => 'required|min:10|numeric',
			'password'  => 'required|min:6|',
			'conig_password' => 'same:password'

		]);


		//insert user in DB
		User::create([

			'user_name'		=> $user_name,
			'email'      	=> $email,
			'user_phone'	=> $user_phone,
			'password'      => Hash::make($password),
			'user_type_id'  => $user_type,
		]);


		return view('auth.login');
	}

    //login page show
	public function loginpage(){
		return view('auth.login');
	}

    //chick user
	public function chickuser(Request $request){
		

		$validatedData  = $request->validate([
			'email' 	=> 'required|email',
			'password'  => 'required',

		]);

			//variables 
		$email    = $request->input('email');
		$password = $request->input('password');


		if (Auth::attempt(['email' => $email , 'password' => $password,'user_type_id' => 1 ])) {

			return redirect(url('/admin/home'));
		}elseif (Auth::attempt(['email' => $email , 'password' => $password,'user_type_id' => 2 ])) {

			return redirect(url('/home')); 
		}

		else{
			 session()->flash('unsuccess','not correct');
			 return redirect("/loginpage");
			//echo '<script>alert("not correct")</script>'; 
			//return view('auth.login'); 
			//exit;
		}





    		//validate login user
			/*$validatedData = Validator::make($request->all(),[

				'user_email' 	=> 'required|email',
				'user_password' => 'required',

			]);


			if ($validatedData->fails()) {
				session()->flash('error',$validatedData->errors());
				return redirect('/');
			}
			*/
/*
			$validatedData = $request->validate([
				'user_email' 	=> 'required|email',
				'user_password' => 'required',

			]);

			//variables 
			$user_email    = $request->input('user_email');
			$user_password = $request->input('user_password');
			
			



			$password_md5 = md5($request[$user_password]);
			
			//$email 	  = DB::table('users')->where('user_email',$user_email)->get();
			//$password = DB::table('users')->where('user_password',$password_md5)->first();


			$user = User::where('user_email',$user_email)->where('user_password',$password_md5)->get();
			$categories = Categorie::all();
			
			if (count($user)>0) {

				if($user_email=="tawfeeq@gmail.com"){
						//Session::set("admin",$email);
						session(['admin' => $user_email]);
						return  view('website.home',compact("categories"));
					}else{
						session(['guest' => $user_email]);
						return  view('website.home',compact("categories"));
					}

				
			}else{
				session()->flash('error','incorrect email or password');
				return redirect(url('loginuser'));

			}

*/



		}

		public function registerAdminPage(){

			return view('admin.admin_addadmin');
		}

		public function insertadmin(Request $request){

			//validate
			$validatedData = $request->validate([

				'user_name' 	 => 'required|min:3',
				'email' 	 => 'required|email',
				'user_phone' 	 => 'required|min:10|numeric',
				'password'  => 'required|min:6|',
				'conig_password' => 'same:password'

			]);

		//variables
			$user_name 		= Request('user_name');
			$email 	   		= Request('email');
			$user_phone 	= Request('user_phone');
			$password       = Request('password');
			$conig_password = Request('conig_password');
			$user_type 		= '1';

			//insert user in DB
		User::create([

			'user_name'		=> $user_name,
			'email'      	=> $email,
			'user_phone'	=> $user_phone,
			'password'      => Hash::make($password),
			'user_type_id'  => $user_type,
		]);


			return redirect('/showusers');
		}



		

	}
