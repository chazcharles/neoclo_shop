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
    
    <div class="row pvl-container">
   	@foreach($product as $_product)
    	<div class="col-md-4">
            <img src="<?php echo asset($_product['image_link']);?>">
            <div class="pvl-text">
                <p class="pvl-name">{{$_product['product_name']}}</p>
                <p class="pvl-price">IDR {{$_product['price']}}</p>
            </div>
            <div class="pvl-link-container">
                <div class="txt-center">
                    <a href=""><p>ADD TO WISHLIST</p><br></a>
                    <a href="<?php echo asset('product/men/detail/index='.Crypt::encrypt($_product['product_id'])) ?>"><p>VIEW DETAIL</p><br></a>
                </div>
            </div>
        </div>
    @endforeach
    
    </div>
    <?php echo $product->links(); ?>
</div>
@include('layouts.footer')
</body>
@include('layouts.js')
</html>