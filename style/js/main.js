$(".pd-description-container").on('click', '.pd-tree-btn', function (event) {
	event.preventDefault();
	var currentClass = $(this).next().prop('class');
	if (currentClass == "pd-tree expanded") {
		$(this).next().removeClass("expanded");
		$(this).next().addClass("collapsed");
		$(this).next().slideUp();
	} else {
		$(".expanded").slideUp().addClass("collapsed").removeClass("expanded");
		$(this).next().removeClass("collapsed");
		$(this).next().addClass("expanded");
		$(this).next().slideDown();
	}
});
$('.footer-btn').click(function () {
    $(this).parent().children('.tree').slideToggle();
	//$('tree').slideToggle();
});

$(".pd-tree-btn").next().addClass("collapsed").slideUp(0);//setiap tree akan diberi class collapsed sebagai penanda awal
function dpMenuExpandOnOpen(){ //pd-description akan terbuka secara default
	$('.expanded').slideDown(0);
}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////
function zoomEffect() {/*=====ZOOM Image Effect====*/	
	$('.item img').wrap('<span style="display:inline-block"></span>').css('display', 'block').parent().zoom();
};
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*$( ".pv-container .pv-trans-img" ).mouseover(function() {
  $(this).parent().children(':first-child').addClass("pv-blur-img");
});
$( ".pv-container .pv-trans-img" ).mouseleave(function() {
  $(this).parent().children(':first-child').removeClass("pv-blur-img" );
});*/
function FooterMenuHideOnMobileView(){
	if($(window).width() <= 750) $('.tree').slideUp(0);else $('.tree').slideDown(0);
}

function setView()
{
	/*===Home Image View==*/
	var view_width = $('.container').width()/4;
	
	$(".thumb_r1").height(view_width*3);
	$(".thumb_r2").height(view_width);
	$(".thumb_r1_c1_r1").height(view_width*2);
	$(".thumb_r1_c1_r2").height(view_width);
	$(".thumb_r1_c2_r1").height(view_width);
	$(".thumb_r1_c2_r2").height(view_width*2);
	/*|END| Home Image View*/
	
  	/*
	if($(window).width() > 1133)
	{
		jQuery('#menu-col-left').addClass('col-md-4').removeClass('col-md-12');
		jQuery('#menu-col-right').addClass('col-md-8').removeClass('col-md-12');
	}
	else
	{
		jQuery('#menu-col-left').addClass('col-md-12').removeClass('col-md-4');
		jQuery('#menu-col-right').addClass('col-md-12').removeClass('col-md-8');
	}*/
}

////////////// RUN ON RESIZE \\\\\\\\\\\\\\
$(window).resize(function() {
	setView();	
	FooterMenuHideOnMobileView();
});



////////////// RUN ON START \\\\\\\\\\\\\\
$(document).ready(function(){
	setView();
	FooterMenuHideOnMobileView();
	dpMenuExpandOnOpen();
	zoomEffect();
	blurEffect();
});
// alert($(".pd-image").height());


////////////FACEBOOK SCRIPT\\\\\\\\\\\\
window.fbAsyncInit = function() {
	FB.init({
	  appId      : '351977924999513',
	  xfbml      : true,
	  version    : 'v2.3'
	});
};

(function(d, s, id){
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) {return;}
	js = d.createElement(s); js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));


function fbLogin() {
FB.login(function(response) {
		if (response.authResponse) {
		 console.log('Welcome!  Fetching your information.... ');
		 FB.api('/me', function(response) {
			alert('Good to see you, ' + response.id + '. email = ' + response.email + ' Gender = '+ response.gender);
			$("#profileImage").attr("src","http://graph.facebook.com/" + response.id + "/picture?type=large");
		 });
		}else {
		 console.log('User cancelled login or did not fully authorize.');
		}
	}, {perms:'public_profile,email,user_about_me'});
}
////////////|END| FACEBOOK SCRIPT\\\\\\\\\\\\

//////////// AUTH REGISTER DROPDOWN SELECT SCRIPT\\\\\\\\\\\\
$(".auth-register-view .dropdown-menu li a").click(function(){
  var selText = $(this).text();
  $(this).parents('.btn-group').find('.btn').html(selText+' <span class="caret"></span>');
  $(this).parents('.btn-group').find('.arv-combo-input').val(selText);
});
///////////|END|AUTH REGISTER DROPDOWN SELECT SCRIPT\\\\\\\\\\\\

$(".auth-register-view .arv-input-dialog").mouseover(function(){
	$(this).fadeOut();
});
$(".al-input-dialog").mouseover(function(){
	$(this).fadeOut();
});

// menampilkan modal
$("#myModal").modal('show');

//dashboard toggle menu
$("#menu-toggle").click(function(e) {
	e.preventDefault();
	$("#wrapper").toggleClass("toggled");
});