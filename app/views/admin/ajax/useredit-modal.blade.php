<div class="modal-content">
    <form method="get" action="{{asset('/adm/user/edit/12')}}">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">User Edit Form</h4>
        </div>
        <div class="modal-body" style="text-align:center">
            <div class="usredit-row">
                <div class="col-xs-4"><p>First Name :</p></div>
                <div class="col-xs-8"><input type="text" class="usredit-txt-input" name="firstname" id="email" placeholder="First Name"></div>
            </div>
            <div class="usredit-row">
                <div class="col-xs-4"><p>Last Name :</p></div>
                <div class="col-xs-8"><input type="text" class="usredit-txt-input" name="lastname" id="email" placeholder="Last Name"></div>
            </div>
            <div class="usredit-row">
                <div class="col-xs-4"><p>Email Name :</p></div>
                <div class="col-xs-8"><input type="text" class="usredit-txt-input" name="email" id="email" placeholder="Email"></div>
            </div>
            <div class="usredit-row">
                <div class="col-xs-4"><p>Gender :</p></div>
                <div class="col-xs-8">
                    <!-- gender dropdown start here-->
                    <span class="btn-group">
                        <a class="btn" data-toggle="dropdown">Select Gender<span class="caret"></span> </a>
                        <ul class="dropdown-menu usr-edt-dropdown">
                            <li><a>Male</a></li>
                            <li><a>Female</a></li>
                        </ul>
                        <input name="gender" value="" class="usr-edt-combo-input">
                    </span>
                    <!-- dropdown end here -->
                </div>
            </div>
        </div>  
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary usredtclass">Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
        </div>
    </form>
</div>

<script>
    //Notes: script harus diletakan disini karena ajax tidak merefresh DOM\\
    //////////// GENDER DROPDOWN SELECT SCRIPT \\\\\\\\\\\\
    $(".usredit-row .dropdown-menu li a").click(function(){
      var selText = $(this).text();
      $(this).parents('.btn-group').find('.btn').html(selText+' <span class="caret"></span>');
      $(this).parents('.btn-group').find('.usr-edt-combo-input').val(selText);
    });
    ///////////|END|GENDER DROPDOWN SELECT SCRIPT\\\\\\\\\\\\

    $(".usredtclass").click(function(){
        $('.preloader').load("{{asset('/adm/user/edit/12')}}");
    });
</script>