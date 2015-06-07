<html>
<head>
	<title>Login</title>
	@include('layouts.css')    
</head>
<body>
	@include('layouts.navbar')

<div class="main-container">
	@include('layouts.menu-navbar')
    
    <div class="divider"></div>
    
    <div class="row auth-container">
    	<div class="col-md-12 auth-head"><p>HELLO</p></div>
    	<div class="col-md-5 col-md-offset-1 auth-login">
        	<form method="post">
        	<div class="col-md-12"><p class="login-head">LOGIN</p></div>
            <div class="col-md-12">
            	<input type="text" name="email" id="email" class="form-control" placeholder="Email" value="">
                @if($errors->first('email')!='')
                <div class="al-input-dialog"><p>{{$errors->first('email')}}</p><span class="arrow-up"></span></div>
                @endif
            </div>
            <div class="col-md-12">
            	<input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                @if($errors->first('password')!='')
                <div class="al-input-dialog"><p>{{$errors->first('password')}}</p><span class="arrow-up"></span></div>
                @endif
            </div>
            <div class="col-md-12"><input type="checkbox" class="login-rmmber" name="persist" id="remember"> <label for="remember"> Remember Me</label></div>
            <div class="col-md-12 al-button"><input type="submit" id="login-submit" tabindex="4" class="btn btn-login" value="LOGIN"></div>
            </form>
        </div>
        <div class="col-md-5 auth-register">
        	<div class="col-md-12"><p class="reg-head">COME JOIN US !</p></div>
            <div class="col-md-12">Connect with Facebook or register your email to get special deals, the latest news updates and an experience unlike any other.</div>
            <div class="col-md-12 ar-button">
            	<input type="button" class="btn btn-login ar-btn-reg" value="REGISTER" onClick="location.href='/auth/register'">
            	<input type="button" class="btn btn-login ar-btn-fb" value="FB CONNECT" ONCLICK="fbLogin()">
            </div>
        </div>
    </div>
</div>



@if(Session::has('message'))
<div id="myModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">INFO</h4>
            </div>
            <div class="modal-body">
                <p>{{Session::get('message')}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endif

@include('layouts.footer')
</body>
@include('layouts.js')
</html>