<html>
<head>
	<title>Product</title>
	@include('layouts.css')    
</head>
<body>
	@include('layouts.navbar')

<div class="main-container">
	@include('layouts.menu-navbar')
    
    <div class="divider"></div>
    
    <div class="row pv-container">
    	<div class="col-md-4"><img src="<?php echo asset("image/image1.jpg");?>"><div class="pv-trans-img"><p>FEATURE</p></div></div>
        <div class="col-md-4"><img src="<?php echo asset("image/image2.jpg");?>"><div class="pv-trans-img"><p>PRODUCT</p></div></div>
        <div class="col-md-4"><img src="<?php echo asset("image/image8.jpg");?>"><div class="pv-trans-img"><p>GENTLEMAN</p></div></div>
        
        <div class="col-md-4"><img src="<?php echo asset("image/image4.jpg");?>"><div class="pv-trans-img"><p>FEATURE</p></div></div>
        <div class="col-md-4"><img src="<?php echo asset("image/image5.jpg");?>"><div class="pv-trans-img"><p>PRODUCT</p></div></div>
        <div class="col-md-4"><img src="<?php echo asset("image/image7.jpg");?>"><div class="pv-trans-img"><p>GENTLEMAN</p></div></div>
        
        <div class="col-md-4"><img src="<?php echo asset("image/image9.jpg");?>"><div class="pv-trans-img"><p>FEATURE</p></div></div>
        <div class="col-md-4"><img src="<?php echo asset("image/image6.jpg");?>"><div class="pv-trans-img"><p>PRODUCT</p></div></div>
        <div class="col-md-4"><img src="<?php echo asset("image/image3.jpg");?>"><div class="pv-trans-img"><p>GENTLEMAN</p></div></div>
    </div>
    
</div>

@include('layouts.footer')

</body>
@include('layouts.js')
</html>