<?php 
use Facebook\FacebookSession;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookRequest;
use Facebook\FacebookAuthorizationException;
use Facebook\FacebookRequestException;

session_start();


class FacebookController extends BaseController{
	public function fb_login(){
		FacebookSession::setDefaultApplication('351977924999513', '62f7e4f454b61a6ca98b374f823ff55d');

		$helper = new FacebookRedirectLoginHelper('http://keiven.ml/login/fb/callback');
	
		$loginUrl = $helper->getLoginUrl();
	
		return "<a href='$loginUrl'>facebook</a>";
	}
	
	public function fb_callback2(){
		// A FacebookResponse is returned from an executed FacebookRequest
			FacebookSession::setDefaultApplication('351977924999513', '62f7e4f454b61a6ca98b374f823ff55d');
			// If you already have a valid access token:
			$session = new FacebookSession('access-token');
			
			// If you're making app-level requests:
			$session = FacebookSession::newAppSession();
			
			// To validate the session:
			try {
			  $session->validate();
			} catch (FacebookRequestException $ex) {
			  // Session not valid, Graph API returned an exception with the reason.
			  echo $ex->getMessage();
			} catch (\Exception $ex) {
			  // Graph API returned info, but it may mismatch the current app or have expired.
			  echo $ex->getMessage();
			}
		
		
	}
	
	public function fb_login2(){
		$helper = $facebook->getRedirectLoginHelper();

		$permissions = ['email', 'user_likes']; // optional
		$loginUrl = $helper->getLoginUrl('http://keiven.dnset.com:7070/index/login/fb/callback', $permissions);
		
		echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
	}
	
	public function fb_callback(){
		FacebookSession::setDefaultApplication('351977924999513', '62f7e4f454b61a6ca98b374f823ff55d');

		// login helper with redirect_uri
		$helper = new FacebookRedirectLoginHelper( 'http://keiven.ml/login/fb/callback' );
		
		// see if a existing session exists
		if ( isset( $_SESSION ) && isset( $_SESSION['fb_token'] ) ) {
		  // create new session from saved access_token
		  $session = new FacebookSession( $_SESSION['fb_token'] );
		  
		  // validate the access_token to make sure it's still valid
		  try {
			if ( !$session->validate() ) {
			  $session = null;
			}
		  } catch ( Exception $e ) {
			// catch any exceptions
			$session = null;
		  }
		}  
		
		if ( !isset( $session ) || $session === null ) {
		  // no session exists
		  
		  try {
			$session = $helper->getSessionFromRedirect();
		  } catch( FacebookRequestException $ex ) {
			// When Facebook returns an error
			// handle this better in production code
			print_r( $ex );
		  } catch( Exception $ex ) {
			// When validation fails or other local issues
			// handle this better in production code
			print_r( $ex );
		  }
		  
		}
		
		// see if we have a session
		if ( isset( $session ) ) {
		  
		  // save the session
		  $_SESSION['fb_token'] = $session->getToken();
		  // create a session using saved token or the new one we generated at login
		  $session = new FacebookSession( $session->getToken() );
		  
		  // graph api request for user data
		  $request = new FacebookRequest( $session, 'GET', '/me' );
		  $response = $request->execute();
		  // get response
		  $graphObject = $response->getGraphObject()->asArray();
		  
		  // print profile data
		  echo '<pre>' . print_r( $graphObject, 1 ) . '</pre>';
		  
		  // print logout url using session and redirect_uri (logout.php page should destroy the session)
		  echo '<a href="' . $helper->getLogoutUrl( $session, 'http://yourwebsite.com/app/logout.php' ) . '">Logout</a>';
		  
		} else {
		  // show login url
		  echo '<a href="' . $helper->getLoginUrl( array( 'email', 'user_friends' ) ) . '">Login</a>';
		}
	}
	
	
	
	
	public function myCurl(){
		/*
		function auto($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
		$konten = curl_exec($ch);
		curl_close($ch);
		if($konten)
			return $konten;
		else
			return FALSE;
		}
		
		$me=json_decode(auto('https://graph.facebook.com/kei.ven.L' ) ,true);
		print_r($me);*/
		
	}
	
	public function myCurl2()
	{
		$ch = curl_init("http://google.com");    // initialize curl handle
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		$data = curl_exec($ch);
		print($data);
	}
}