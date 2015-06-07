<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/




Route::get('/','SiteController@home'); 

///////////////  AUTH VIEW \\\\\\\\\\\\\\\\\
Route::get('/auth/','SiteController@auth_view');    
Route::post('/auth/','SiteController@auth_view_post');  
Route::get('/auth/logout','SiteController@auth_logout'); 
/////////////  END AUTH VIEW  \\\\\\\\\\\\\\\\\

///////////////  AUTH REGISTER VIEW \\\\\\\\\\\\\\\\\
Route::get('/auth/register/','SiteController@auth_register_view');    
Route::post('/auth/register','SiteController@auth_register_view_post');
/////////////  END AUTH REGISTER VIEW  \\\\\\\\\\\\\\\\\

///////////////  PRODUCT VIEW \\\\\\\\\\\\\\\\\
Route::get('/product/','SiteController@product_view');    
/////////////  END PRODUCT VIEW  \\\\\\\\\\\\\\\\\

///////////////  PRODUCT GALLERY VIEW \\\\\\\\\\\\\\\\\
Route::get('/product/men/','SiteController@product_view_men');    
Route::get('/product/women/','SiteController@product_view_men');    
/////////////  PRODUCT GALLERY VIEW  \\\\\\\\\\\\\\\\\

///////////////  PRODUCT VIEW DETAIL\\\\\\\\\\\\\\\\\
Route::get('/product/men/detail/index={id}','SiteController@product_detail_view');
/////////////  END PRODUCT VIEW DETAIL\\\\\\\\\\\\\\\\\

///////////////  SEARCH PRODUCT  \\\\\\\\\\\\\\\\\
Route::get('/product/search','SiteController@product_search');
/////////////  END SEARCH PRODUCT  \\\\\\\\\\\\\\\\\

///////////////  ADMIN PAGE  \\\\\\\\\\\\\\\\\
Route::get('/adm/login','SiteController@adm_login');
Route::get('/adm/logout','SiteController@adm_logout');
Route::post('/adm/login','SiteController@adm_login_post');
Route::get('/adm/dashboard', array('before' => 'auth', 'uses' => 'SiteController@adm_dashboard'));/*filter untuk url /admin/dashboard akan dieksekusi oleh filter auth*/
Route::group(array('before' => 'auth'), function() /*semua yang ada digrup ini akan difilter oleh fungsi auth*/
{
	Route::get('/adm/ajax/userlist', function()
	{
		return View::make('admin.ajax.userlist');
	});
});


/////////////  END ADMIN PAGE  \\\\\\\\\\\\\\\\\

Route::get('curl','SiteController@myCurl');
Route::get('curl2','SiteController@myCurl2');
Route::get('login/fb','FacebookController@fb_login');

Route::get('login/fb/callback', 'FacebookController@fb_callback');

Route::get('/hitung',function(){
	
	$angka = array(1,3,5,7,9,11,13,15);
	
	foreach($angka as $a)
	{
		foreach($angka as $b)
		{
			foreach($angka as $c)
			{
				if(($a+$b+$c)<=31 && ($a+$b+$c)>27)echo $a. '+'. $b . '+'.$c.' = '. ($a+$b+$c) .'<br>';
			}
		}
		
	}
});





//////////////////////////////////////////////
Route::get('/user','SiteController@UserList');

Route::get('/user/{username}','SiteController@User');

Route::get('/nav',function(){return View::make('master.navbar');});

Route::get('/logout','SiteController@Logout');

Route::get('/login','SiteController@Login');

Route::post('/login','SiteController@Login_post');

Route::get('/home','SiteController@Home');

Route::get('/hash/{word}','SiteController@_Hash');
//////////////////////////////////////////////

Route::get('/error', 'SiteController@Error');

Route::get('/tes','SiteController@Test');

Route::get('/register', 'SiteController@Register');

Route::post('/register','SiteController@Register_Post');

Route::get('/error','SiteController@Err');