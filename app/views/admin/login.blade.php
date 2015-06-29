<html>
<head>
	<title>Admin Login</title>   
    <link rel="stylesheet" href="{{asset('style/css/bootstrap.min.css');}}"/>
    <link rel="stylesheet" href="{{asset('style/css/login.css');}}"/>
</head>
<body>

<div class="login-container">
    
    
    <div class="row auth-container">
    	<div class="col-md-12 auth-head"><p>ADMIN LOGIN</p></div>
    	<div class="col-md-12 auth-login">
        	<form method="post">
                <div class="col-md-12"><p class="login-head">LOGIN</p></div>
                <div class="col-md-12">
                    <input type="text" name="username" id="email" class="form-control" placeholder="Username" value="{{Form::old('username')}}">
                    @if($errors->first('username')!='')
                    <span class="al-input-dialog"><p>{{$errors->first('username')}}</p><span class="arrow-up"></span></span>
                    @endif
                </div>
                <div class="col-md-12">
                    <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password">
                    @if($errors->first('password')!='')
                    <span class="al-input-dialog"><p>{{$errors->first('password')}}</p><span class="arrow-up"></span></span>
                    @endif
                    
                </div>
                <div class="col-md-12 al-button"><input type="submit" id="login-submit" tabindex="4" class="btn btn-login" value="LOGIN"/></span>
            </form>
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
            <div class="modal-body" style="text-align:center">
                <p>{{Session::get('message')}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>                                                                             
@endif 
</body>
@include('layouts.js')
</html>