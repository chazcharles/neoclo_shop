<html>
<head>
	<title>Detail</title>
	@include('layouts.css')    
</head>
<body>
	@include('layouts.navbar')

<div class="main-container">
	@include('layouts.menu-navbar')
    
    <div class="divider"></div>
    
    
    
    <div class="container">
    	<div class="col-md-12 pd-main">
            <div class="col-md-7  pd-image-container">
            
                <div class="col-md-12 pd-image">
                    <div id="myCarousel" class="carousel carousel-fade slide" data-interval="3000" data-ride="carousel">
                       <!-- Carousel items -->
                        <div class="carousel-inner">
                            <?php $i=1;?>
                            @foreach($imagelist as $image) 
                            <div class="<?php if($i==1)echo 'active';?> item">
                                <img src="<?php echo asset($image['link']);?>">
                            </div><?php $i++;?>
                            @endforeach
                        </div>
                    </div><!-- End myCarousel -->
                </div>
                
                <div class="col-md-12 pd-image-list">
                    <div class="img-center"><!-- WRAP IMAGE TO CENTER POSITION -->
                    	<?php $j=1;?>
                        @foreach($imagelist as $image) 
                        <img src="<?php echo asset('75x75/'.$image['link']);?>" data-target="#myCarousel" data-slide-to="{{$j-1}}" <?php if($j==1)echo 'class="active"';?> >
                        <?php $j++;?>
                        @endforeach
                    </div>
                </div>
            </div>
            
            <div class="col-md-5 pd-description-container">
            	<div class="col-md-12 pd-name"> <!-- nama produk -->
                	<p>{{$product['product_name']}}</p>
                </div>
                <div class="col-md-12 pd-price"> <!-- harga produk -->
                    <p>PRICE</p>
                    <p>IDR {{$product['price']}}</p>
                </div>
                <div class="col-md-12 pd-description"> <!-- deskripsi produk -->
                	<p class="pd-tree-btn"> DESCRIPTION <span class="glyphicon glyphicon-menu-down pd-icon"></span></p>
                    <ul class="pd-tree expanded">
                        <li><p></p>{{$product['description']}}</li>
                    </ul>
                </div>
                <div class="col-md-12 pd-size"> <!-- ukuran produk -->
                    <p  class="pd-tree-btn"> SIZE <span class="glyphicon glyphicon-menu-down pd-icon"></span></p>
                    <ul class="pd-tree ">
                        <li>
                        	<ul>
                            </ul>
                            Sizing Measurement:
                            <ul>
                                <li>{{$product['size']}}</li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="col-md-12 pd-color"> <!-- warna produk -->
					<p  class="pd-tree-btn"> COLOR <span class="glyphicon glyphicon-menu-down pd-icon"></span></p>
                    <ul class="pd-tree ">
                        <li><p>{{$product['color']}}</p></li>
                    </ul>
                </div>
                <div class="col-md-12 pd-qty"> <!-- jumlah produk -->
                	<p>QUANTITY</p>
                </div>
                <div class="col-md-12 pd-total"> <!-- total produk -->
                	<p>TOTAL</p>
                </div>
                <div class="col-md-12 pd-submit"> <!-- submit produk -->
                	<p>SUBMIT</p>
                </div>
            </div>
        </div>
        <div class="col-md-12 pd-footer">
        	<p class="col-md-12">RELATED ITEMS</p>
            @foreach($related as $_related)
            <div class="col-xs-3">
            	<img src="<?php echo asset($_related['image_link']);?>">
                <div class="col-xs-12">{{$_related['product_name']}}<br>
				<p style="color:#FF3300; border-bottom:none;">IDR {{$_related['price']}}</p></div>
            </div>
            @endforeach
        </div>
    </div>
    
</div>

@include('layouts.footer')
</body>
@include('layouts.js')
</html>