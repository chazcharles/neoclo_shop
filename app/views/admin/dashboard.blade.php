<html>
<head>
	<title>Admin Dashboard</title>   
    <link rel="stylesheet" href="{{asset('style/css/bootstrap.min.css');}}"/>
    <link rel="stylesheet" href="{{asset('style/css/dashboard.css');}}"/>
</head>
<body>

<div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <span class="sidebar-brand">
                        Admin Panel 
                </span>
                <a href="{{asset("ajax/dashboard2.html")}}">
                <li class="parent">
                    Dashboard
                </li>
                </a>
                <li class="parent">
                    Content
                     <ul class="tree">
                     	<a href="{{asset("ajax/dashboard.html")}}">
                        <li class="child">
                        	assdf
                        </li>
                        </a>
                        <a href="{{asset("ajax/dashboard2.html")}}">
                        <li class="child">
                        	assdf a
                        </li>
                        </a>
                    </ul>
                </li>
                <li class="parent">
                    User
                     <ul class="tree">
                     	<a href="{{asset("adm/ajax/userlist")}}">
                        <li class="child">
                        	User List
                        </li>
                        </a>
                        <a href="{{asset("ajax/dashboard2.html")}}">
                        <li class="child">
                        	assdf a
                        </li>
                        </a>
                    </ul>
                </li>
                <li class="parent">
                    Settings
                     <ul class="tree">
                        <a href="{{asset("ajax/dashboard.html")}}">
                        <li class="child">
                        	assdf
                        </li>
                        </a>
                        <a href="{{asset("ajax/dashboard2.html")}}">
                        <li class="child">
                        	assdf a
                        </li>
                        </a>
                    </ul>
                </li>
                <li class="parent">
                    Admin
                    <ul class="tree">
                        <a href="{{asset("ajax/dashboard.html")}}">
                        <li class="child">
                        	Settings
                        </li>
                        </a>
                        <a onClick="location.href='logout';">
                        <li class="child">
                        	Logout
                        </li>
                        </a>
                    </ul>
                </li>
            </ul>
            
        </div>
        <!-- /#sidebar-wrapper -->
        
        

        <!-- Page Content -->
        <div class="nav">
        	<div class="toggle-btn">
            	<span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </div>
            <div class="divider-vertical"></div>
        </div>
        <div id="page-content-wrapper">
            <div class="preloader">
				<img src="<?php echo asset("image/getdata.gif");?>" class="getdata" alt="preloader"/>
			</div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

   



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
<script type="text/javascript" src="<?php echo asset('style/js/jquery.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo asset('style/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo asset('style/js/main2.js') ?>"></script>

</html>