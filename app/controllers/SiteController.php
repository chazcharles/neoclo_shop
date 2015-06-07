<?php 
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookAuthorizationException;
use Facebook\FacebookRequestException;

session_start();


class SiteController extends BaseController{
	public function home()
	{
		return View::make('home');
	}
	
	public function product_search()
	{
		$product = Product::where('product_name','like','%'.$_GET['param'].'%')->orderBy('created_at', 'DESC')->paginate(9); 
		return View::make('product-view-list',['product' => $product]); //passing data user ke view users.show
	}
	
	public function product_detail_view($id)
	{
		//return View::make('product-detail')->with('success', $id); //kirim id ke view
		try{$_id = Crypt::decrypt($id);} //decrypt ID dari product_view_list.blade.php
		catch (Illuminate\Encryption\DecryptException $e){return Redirect::to('/');} // jika hasil error maka lempar ke home
		
		$product = Product::where('product_id',$_id)->first();  /*notes: ketika ingin ambil isi dari hasMany relationship gunakan first() bukan get()*/
		//$product = Product::with('product_image_large')->get();
		$related = Product::where('product_gender','men')->whereNotIn('product_id', [$_id])->orderBy(DB::raw('RAND()'))->take(4)->get();
		return View::make('product-detail',['product' => $product, 'imagelist' => $product->productimagelarge, 'related' => $related]);  /* mengirimkan array product index 0, ke session product*/
	}
	
	public function product_view()
	{
		return View::make('product-view');
	}
	
	public function product_view_men()
	{
		$product = Product::where('product_gender','men')->orderBy('created_at', 'DESC')->paginate(9); 
		return View::make('product-view-list',['product' => $product]); //passing data user ke view users.show
	}
	
	public function auth_view()
	{
		return View::make('auth');
	}
	
	public function auth_view_post()
	{
		//masukan rules validasi input\\
		$rules = array(
			'email' 	=> 'required|email',
			'password'	=> 'required|min:4'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		
		if($validator->passes())
		{
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);	
			
			//mengecek apakah user menyalakan remember me atau tidak
			//Note: Make sure that ‘expire_on_close’ is set to true in ‘config/session.php’
			if(Input::get('persist') == 'on') $isAuth = Auth::users()->attempt($userdata, true);
			else $isAuth = Auth::users()->attempt($userdata);
			   
			if($isAuth)
			{
				//$user = Users::where('email',Input::get('email'))->get();
				//Session::put('user',$user[0]->first_name);
				return Redirect::to('');
			}
			else
			{ 
				return Redirect::to('auth')
					->with('message','Email or password is not valid, try to register or using facebook login.')
					->withInput(Input::except('password'));// Pesan ketika email password tidak cocok
			}
		}
		else
		{
			return Redirect::to('auth')->withErrors($validator)->withInput(Input::except('password'));
		}
	}
	
	public function auth_register_view()
	{
		return View::make('auth-register');
	}
	public function auth_logout()
	{
		Auth::users()->logout();
		return Redirect::to("/");
	}
	public function auth_register_view_post()
	{
		$validator = Validator::make(
			Input::all(),
			array(
				"first_name"			=> "required|min:4",
				"last_name"             => "required",
				"email"					=> "required|email|unique:users", //users disini yang dimaksud adalah nama table
				"gender"				=> "required",
				"password"              => "required|min:4",
				"password_confirm"		=> "required|same:password"
			)
		);
		
		if($validator->passes())
		{
			$user = new Users;
			$user->first_name    	= Input::get('first_name');
			$user->last_name	   	= Input::get('last_name');
			$user->email		   	= Input::get('email');
			$user->gender	   		= Input::get('gender');
			$user->password 		= Hash::make(Input::get('password'));
			$user->save();
			return Redirect::to("auth")
				->with('message','Thank you for registering!');
		}
		// 2b. jika tidak, kembali ke halaman form registrasi
		else
		{
			return Redirect::to('auth/register')
				->withErrors($validator)
				->withInput(Input::except(array('password','password_confirm')));
			//return Redirect::to('register')->withErrors(array("msg" => "tes"));
		}
	}
	
	public function Test()
	{	
		echo Users::where('first_name','tes')->get();
		return Redirect::to("auth")
				->with('message','Thank you for registering!');
	}
	
	public function adm_login()
	{
		return View::make('admin.login');
	}
	
	public function adm_logout()
	{
		Auth::admin()->logout();
		return Redirect::to('adm/login');
	}
	
	public function adm_login_post()
	{
		$rules = array(
			'username' 	=> 'required',
			'password'	=> 'required|min:4'
		);
		
		$validator = Validator::make(Input::all(),$rules);
		
		if($validator->passes())
		{
			$userdata = array(
				'username' 	=> Input::get('username'),
				'password' 	=> Input::get('password')
			);	
			   
			if( Auth::admin()->attempt($userdata))
			{
				//$user = Users::where('email',Input::get('email'))->get();
				//Session::put('user',$user[0]->first_name);
				return Redirect::to('adm/dashboard');
			}
			else
			{ 
				return Redirect::to('adm/login')
					->with('message','Oops sorry, something wrong!')
					->withInput(Input::except('password'));// Pesan ketika email password tidak cocok
			}
		}
		else
		{
			return Redirect::to('adm/login')->withErrors($validator)->withInput(Input::except('password'));
		}
	}
	
	public function adm_dashboard()
	{
		return View::make('admin.dashboard');
	}
	
	public function _Hash($word)
	{
		return Hash::make($word);
	}
	
}