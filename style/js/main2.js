// RUNNING ON START \\
$('.child').toggle(); //secara default menu tree tertutup


// KEIVEN MENU TREE SCRIPT \\
$('.parent').click(function (e){
	e.preventDefault();
	
	if($(this).hasClass("active")){ 
		$(this).addClass("active");
		
	}
	else{
		$(".active").children().children().children().slideUp();
		$(".active").removeClass("active");
		$(this).addClass("active");
	}
	/*ketika dirinya sendiri diklik maka hanya bisa slide down supaya tidak akan menutup lagi*/
	$(this).children().children().children().slideDown(); //fungsi menampilkan menu tree ketika diklik
	
});	

$(".toggle-btn").click(function(e){
	e.preventDefault();
	$("#wrapper").toggleClass("toggled"); 
});


/* AJAX START HERE*/
$(".parent").click(function(e){
	e.preventDefault();
	var page = $(this).parent().attr('href');
	$('.preloader').load(page);
});

$(".child").click(function(e){
	e.preventDefault();
	var page = $(this).parent().attr('href');
	$('.preloader').load(page);
});

/* AJAX DEFAULT PAGE IN OPEN PAGE */
$('.preloader').load('http://keiven.dev/ajax/dashboard.html');
