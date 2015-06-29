<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="col-xs-12 t-head">
            	<div class="col-xs-1">No.</div>
            	<div class="col-xs-2">First Name</div>
            	<div class="col-xs-2">Last Name</div>
            	<div class="col-xs-3">Email</div>
            	<div class="col-xs-2">Gender</div>
                <div class="col-xs-2">Delete</div>
            </div>
            <?php $i=1; ?>
            @foreach($usrlist as $_usrlist)
            <div class="col-xs-12 @if($i%2 == 0) {{"t-content-even"}} @else {{"t-content-odd"}} @endif ">
            	<div class="col-xs-1">{{$i++}}</div>
            	<div class="col-xs-2">{{$_usrlist['first_name']}}</div>
            	<div class="col-xs-2">{{$_usrlist['last_name']}}</div>
            	<div class="col-xs-3">{{$_usrlist['email']}}</div>
            	<div class="col-xs-2">{{$_usrlist['gender']}}</div>
                <div class="col-xs-2">
                    <a class="ajxBtn-usrEdit" value="user/edit/{{Crypt::encrypt($_usrlist['usrid'])}}"><button>Edit</button></a>
                    <a class="ajxBtn-usrDel" value="user/delete/{{Crypt::encrypt($_usrlist['usrid'])}}"><button>Delete</button></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

<div id="myModal2" class="modal fade">
    <div class="modal-dialog">
        <div class="userlist-modal">
            <img src="<?php echo asset("image/getdata.gif");?>" class="" alt="preloader"/>
        </div>
        </div>
    </div>
</div>   

<script type="text/javascript">
    var page = '';

    //ketika user delete diklik maka modal akan keluar
    $(".ajxBtn-usrDel").click(function(e){
        page = $(this).attr('value'); //ambil url lokasi userdelete untuk dimasukan ajax preloader
        $('.userlist-modal').load('{{asset('adm/ajax/modal/delete');}}') //karena modal cuma 1 maka content dari modal menggunakan ajax untuk memanggil modal content delete
        $("#myModal2").modal('show'); //tampilkan modal
    });

    //ketika user edit diklik maka modal akan keluar
    $(".ajxBtn-usrEdit").click(function(e){
        page = $(this).attr('value'); 
        $('.userlist-modal').load('{{asset('adm/ajax/modal/edit');}}') //memanggil modal edit ke modal content
        $("#myModal2").modal('show');
    });

    //ketika modal user delete diklik yes
    $(".usrdelclass").click(function(e){
        e.preventDefault();
        setTimeout(function(){ //harus menggunakan delay supaya modal dihilangkan dulu lalu ajax beraksi.
          $('.preloader').load(page);
        }, 100); 
    });

</script>