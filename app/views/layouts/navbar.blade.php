<!--NAVBAR START HERE -->
<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <!--nav bar header -->
    <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/">
        	NeClo
        </a>
         <p class="navbar-text">@if(Auth::users()->check()) Welcome, {{Auth::users()->user()->first_name}} @endif</p>
    </div>
    
    
    <!--nav text -->
   
    
    <!-- nav tab -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
        <!-- navbar search dropdown-->
        <ul class="nav navbar-nav navbar-right">
        	<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Search </a>
              <ul class="dropdown-menu" role="menu">
                <li>
                    <form class="navbar-form" role="search" method="get" action="<?php echo asset('/product/search/');?>">
                        <div class="input-group">
                            <input type="text" class="form-control search-custom" placeholder="ex: Baju, Celana" name="param" id="srch-term">
                            <div class="input-group-btn">
                                <button class="btn btn-default search-custom" type="submit"><i class="glyphicon glyphicon-search white"></i></button>
                            </div>
                        </div>
                    </form>
                </li>
              </ul>
          	</li>
         </ul>
        
        
        
        
        
        <ul class="nav navbar-nav navbar-right">
            <li class="hidden">
                <a href="#page-top"></a>
            </li>
            <li>
                <a class="page-scroll" href="#portfolio"><i class="glyphicon glyphicon-shopping-cart"></i> Cart: 0</a>
            </li>
            <li class="divider-vertical" id="divider1"></li>
            <li>
            	@if(Auth::users()->check()) 
                <a class="page-scroll" href="/auth/logout">Logout</a>
                @else
                <a class="page-scroll" href="/auth">Login</a>
                @endif
                
            </li>
        </ul>
        
    	
  	</div>
    <!-- end nav tab -->
    
</nav>
<!--NAVBAR END HERE -->