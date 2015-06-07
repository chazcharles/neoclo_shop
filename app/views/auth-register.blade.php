<html>
<head>
	<title>Register</title>
	@include('layouts.css')    
</head>
<body>
	@include('layouts.navbar')

<div class="main-container">
	@include('layouts.menu-navbar')
    
    <div class="divider"></div>
    <form method="post">
    <div class="row auth-container">
    	<div class="col-md-12 auth-head"><p>REGISTER</p></div>
    	<div class="col-md-10 col-md-offset-1 auth-register-view">
        	<div class="col-md-12  arv-head"><p>CREATE AN ACCOUNT</p></div>
            <div class="col-md-12">
            	{{-- proses tampilan error laravel --}}
                <span class="btn-group @if($errors->first('gender')!=''){{"input-error"}}@endif">
                    <a class="btn" data-toggle="dropdown"> @if(Form::old('gender')!='') {{Form::old('gender')}} @else {{'Select Gender'}} @endif<span class="caret"></span> </a>
                    <ul class="dropdown-menu arv-dropdown">
                        <li><a>Male</a></li>
                        <li><a>Female</a></li>
                    </ul>
                    <input name="gender" value="" class="arv-combo-input">
                </span>
                @if($errors->first('gender')!='')
                <div class="arv-input-dialog"><p>{{$errors->first('gender')}}</p><span class="arrow-up"></span></div>
                @endif
            	
            </div>
            <div class="col-md-12">
            	<input type="text" name="first_name" tabindex="1" class="form-control @if($errors->first('first_name')!=''){{"input-error"}}@endif" placeholder="First Name" value="{{Form::old('first_name')}}">
            	<input type="text" name="last_name" tabindex="1" class="form-control @if($errors->first('last_name')!=''){{"input-error"}}@endif arv-float-right" placeholder="Last Name" value="{{Form::old('last_name')}}">
                @if($errors->first('first_name')!='')
                <div class="arv-input-dialog"><p>{{$errors->first('first_name')}}</p><span class="arrow-up"></span></div>
                @endif
                @if($errors->first('last_name')!='')
                <div class="arv-input-dialog dialog-right"><p>{{$errors->first('last_name')}}</p><span class="arrow-up"></span></div>
                @endif
                
            </div>
            <div class="col-md-12">
            	<input type="text" name="email" tabindex="1" class="form-control @if($errors->first('email')!=''){{"input-error"}}@endif" placeholder="Email" value="{{Form::old('email')}}">
                @if($errors->first('email')!='')
                <div class="arv-input-dialog"><p>{{$errors->first('email')}}</p><span class="arrow-up"></span></div>
                @endif
            </div>
            <div class="col-md-12">
            	<input type="password" name="password" id="password" tabindex="2" class="form-control @if($errors->first('password')!=''){{"input-error"}}@endif" placeholder="Password">
                <input type="password" name="password_confirm" id="password" tabindex="2" class="form-control @if($errors->first('password_confirm')!=''){{"input-error"}}@endif arv-float-right" placeholder="Confirm Password">
                @if($errors->first('password')!='')
                <div class="arv-input-dialog"><p>{{$errors->first('password')}}</p><span class="arrow-up"></span></div>
                @endif
                @if($errors->first('password_confirm')!='')
                <div class="arv-input-dialog dialog-right"><p>{{$errors->first('password_confirm')}}</p><span class="arrow-up"></span></div>
                @endif
            </div>
            <div class="col-md-12">
            	<input type="submit" name="login-submit" id="login-submit" tabindex="4" class="btn btn-reg" value="REGISTER">
            </div>
        </div>
    </div>
	</form>
</div>

@include('layouts.footer')
</body>
@include('layouts.js')
</html>