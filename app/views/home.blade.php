<html>
<head>
	<title>Home</title>
	@include('layouts.css')    
</head>
<body>
	@include('layouts.navbar')

<div class="main-container">
	@include('layouts.menu-navbar')
    
    <div class="divider"></div>
    
    @include('layouts.home-image')
    
</div>
@include('layouts.footer')
</body>
@include('layouts.js')
</html>