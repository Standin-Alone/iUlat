<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title> <?php echo $__env->yieldContent('title', 'IUlat'); ?></title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />

    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/jquery-ui/jquery-ui.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/plugins/animate/animate.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/default/style.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/default/style-responsive.min.css')); ?>" rel="stylesheet" />
    <link href="<?php echo e(asset('assets/css/default/theme/default.css')); ?>" rel="stylesheet" id="theme" />
    <link rel='shortcut icon' type='image/x-icon' href="<?php echo e(asset('eyeulat_logo.png')); ?>" />
    <!-- ================== END BASE CSS STYLE ================== -->

    <?php $__env->startSection('page-css'); ?>
    <?php echo $__env->yieldSection(); ?>
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="<?php echo e(asset('assets/plugins/pace/pace.min.js')); ?>"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body>

    <!--        CHAT START HERE-->
    <script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '37038893-ec48-4ba3-8612-b2ebc4dbe4f6', f: true }); done = true; } }; })();</script>


    <!--        END OF CHAT-->


    <!-- begin #page-loader -->

    <!-- end #page-loader -->

    <!-- begin #page-container -->
    <div id="page-container" class="page-container  "  >
        <!-- begin #header -->
        <div id="header" class="header navbar-default" style="background-color: maroon;">
            <!-- begin navbar-header -->

            
            <div class="navbar-header">
                <a href="#" class="navbar-brand"> <img src="<?php echo e(asset('eyeulat_logo.png')); ?>" width="40" height="40" style="display: inline-block; "  /> <b style="color:#FFFFFF;">iULAT</b></a>
                <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- end navbar-header -->

            <!-- begin header-nav -->
            <ul class="navbar-nav navbar-right">
                
                    
                        
                            
                            
                        
                    `
                

                <li class="dropdown navbar-user">
                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo e(asset('assets/img/user/user-12.jpg')); ?>" alt="" />
                        <span class="d-none d-md-inline" style="color:white;"> <?php echo e(session('session_first_name')); ?> <?php echo e(session('session_middle_name')); ?> <?php echo e(session('session_last_name')); ?></span> <b class="caret"></b>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a href="javascript:;" class="dropdown-item"  data-toggle='modal' data-target='#AccountModal'>Edit Account</a>
                        
                        <div class="dropdown-divider"></div>
                        <a href="<?php echo e(route('SignOut')); ?>" class="dropdown-item">Log Out</a>
                    </div>
                </li>
            </ul>
            <!-- end header navigation right -->
        </div>
        <!-- end #header -->


        <!-- #modal-EDIT ACCOUNT -->
        <div class="modal fade" id="AccountModal">
            <div class="modal-dialog" style="max-width: 30%">
                <form id="AccountForm" method="POST" >
                    <?php echo csrf_field(); ?>

                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #f59c1a">
                            <h4 class="modal-title" style="color: white">Your Account</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white">×</button>
                        </div>
                        <div class="modal-body">
                            
                            <input type="text" name="user_id_txt" value="<?php echo e(session('session_userid')); ?>" hidden >
                            <div class="col-lg-12">
                              <div class="form-group">
                                <h3>   <label>Name</label> <span id='ReqBarangaySealEdit'></span></h3>
                                <input type="text" id="" name="first_name_txt" class="form-control" required="true" placeholder="First Name"  value="<?php echo e(session('session_first_name')); ?>" >
                                <br>
                                <input type="text" id="" name="middle_name_txt" class="form-control" required="true" placeholder="Middle Name"  value="<?php echo e(session('session_middle_name')); ?>" >
                                <br>
                                <input type="text" id="" name="last_name_txt" class="form-control" required="true" placeholder="Last Name"  value="<?php echo e(session('session_last_name')); ?>" >
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <h3>   <label>Position</label>  <span id='ReqEmail'></span> </h3>
                                <input type="email" name="" id="" placeholder="position" class="form-control" data-parsley-group="step-2" data-parsley-required="true"   value="<?php echo e(session('session_position')); ?>" disabled="" />
                            </div>
                        </div>


                         <div class="col-lg-12">
                            <div class="form-group">
                                <h3>   <label>Contact Number</label>  <span id='ReqEmail'></span> </h3>
                                <input type="text" name="contact_txt" id="contact_txt" placeholder="your contact number" class="form-control" data-parsley-group="step-2" data-parsley-required="true"   value="<?php echo e(session('session_contact')); ?>" />
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-group">
                                <h3>   <label>Email</label>  <span id='ReqEmail'></span> </h3>
                                <input type="email" name="email_main_txt" id="email_main_txt" placeholder="e.g:example@gmail.com" class="form-control" data-parsley-group="step-2" data-parsley-required="true"   value="<?php echo e(session('session_email')); ?>" />
                            </div>
                        </div>

                           <div class="col-lg-12">
                            <div class="form-group">
                                <h3>   <label>Password</label>  <span id='ReqNewPassTxt'></span> </h3>
                                <input type="password"
                                id="new_password_txt"
                                name="new_password_txt" placeholder="Your new password" class="form-control" data-parsley-group="step-2" data-parsley-required="true"

                                data-parsley-equalto="#NewPasswordTxt" />
                            </div>
                        </div>

                        
                    </div>
                    <div class="modal-footer">
                        <a href="javascript:;" class="btn btn-white" data-dismiss="modal">Close</a>

                        <a id="UpdateBtn"  class="btn btn-warning" style="color:white;">Update</a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- #modal-EDIT ACCOUNT END -->


























    <div id="sidebar" class="sidebar sidebar-transparent gradient-enabled" >
        <!-- begin sidebar scrollbar -->
        <div data-scrollbar="true" data-height="100%">
            <!-- begin sidebar user -->
            <ul class="nav">
                
                <li class="nav-profile active ">
                    <a href="javascript:;" data-toggle="nav-profile">
                        <div class="cover with-shadow"></div>
                        <div class="image">
                            <img src="<?php echo e(asset('assets/img/user/user-12.jpg')); ?>" alt="" />
                        </div>
                        <div class="info">
                            <b class="caret pull-right"></b>
                            Position
                            <small><?php echo e(session('session_position')); ?></small>
                        </div>
                    </a>
                </li>
                <li>


                </ul>
            </li>
        </ul>
    </li>
</ul>
<!-- end sidebar user -->


<!-- begin sidebar nav -->
<ul class="nav" >
    <li class="nav-header">Menu </li>

    <li class=" <?php echo e(Route::currentRouteName()=='Dashboard' ? 'active' : ''); ?>"><a href="<?php echo e(route('Dashboard')); ?>"><i class="fa fa-th-large"></i>
        <span>Dashboard</span></a>
    </li>

    <li class="<?php echo e(Route::currentRouteName()=='Validate' ? 'active' : ''); ?> <?php echo e(session('session_position')=='Middleman' ? '' : 'hide'); ?>"><a href="<?php echo e(route('Validate')); ?>"><i class="fa fa-file"></i>
        <span>Report Validation</span></a>
    </li>


    <li class="<?php echo e(Route::currentRouteName()=='Verify' ? 'active' : ''); ?> <?php echo e(session('session_position')=='Office of Student Affairs and Services' ? '' : 'hide'); ?>"><a href="<?php echo e(route('Verify')); ?>"><i class="fa fa-file"></i>
        <span>Report Verification</span></a>
    </li>




    <li class="has-sub <?php echo e(Route::currentRouteName()=='List_Of_Validated_Reports' || Route::currentRouteName()=='List_Of_Invalid_Reports'  ? 'active' : ''); ?>">
        <a href="javascript:;">
            <b class="caret"></b>
            <i class="fas fa-search"></i>
            <span>Queries/Reports</span>
        </a>
        <ul class="sub-menu">
            <li class="<?php echo e(Route::currentRouteName()=='List_Of_Validated_Reports' ? 'active' : ''); ?>" ><a href="<?php echo e(route('List_Of_Validated_Reports')); ?>">List of Validated Reports</a></li>
            <li class="<?php echo e(Route::currentRouteName()=='List_Of_Invalid_Reports' ? 'active' : ''); ?>" ><a href="<?php echo e(route('List_Of_Invalid_Reports')); ?>">List of Invalid Reports</a></li>

        </ul>
    </li>



    <!-- begin sidebar minify button -->
    <li><a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
    <!-- end sidebar minify button -->
</ul>
<!-- end sidebar nav -->
</div>
<!-- end sidebar scrollbar -->
</div>
<!-- begin #sidebar  CHANGE BG HERE!!-->
<div class="sidebar-bg" style="background-image: url(<?php echo e(asset('assets/img/side_nav/new_cover_sidenav.jpg)')); ?>"></div>
<!-- end #sidebar -->

<!-- begin #content -->
<?php echo $__env->yieldContent('content'); ?>



<!-- end #content -->




<!-- begin scroll to top btn -->
<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top fade" data-click="scroll-top"><i class="fa fa-angle-up"></i></a>
<!-- end scroll to top btn -->
</div>
<!-- end page container -->

<!-- ================== BEGIN BASE JS ================== -->
<script src="<?php echo e(asset('assets/plugins/jquery/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')); ?>"></script>





<script src="<?php echo e(asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/js-cookie/js.cookie.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/theme/default.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/apps.min.js')); ?>"></script>
<!-- ================== END BASE JS ================== -->

<script src="<?php echo e(asset('assets/plugins/gritter/js/jquery.gritter.js')); ?>"></script>
<script src="<?php echo e(asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/demo/ui-modal-notification.demo.min.js')); ?>"></script>

<?php $__env->startSection('page-js'); ?>
<?php echo $__env->yieldSection(); ?>
<script type="text/javascript">
    $.ajax({url:'<?php echo e(route("OnHold")); ?>',
            type:'get'
            })

</script>



<script>
    var Accountform = document.getElementById("AccountForm");
     $("#contact_txt").keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    $(document).ready(function(){

        $("a[id='UpdateBtn']").on('click',function () {

        var first_name = $('#first_name_txt').val()
        var middle_name = $('#middle_name_txt').val()
        var last_name = $('#last_name_txt').val()
        
        var contact = $('#contact_txt').val()
        var email = $('#email_main_txt').val()

        var password = $('#password_txt').val()

        


        if(email == "" || first_name == "" || last_name == ""  || contact == ""  || email == "")
        {
            
            swal({
                title: 'Ooops!',
                text: 'Please fill out the necessary fields!',
                icon: 'error',
                buttons: {
                    confirm: {
                        visible: true,
                        className: 'btn btn-danger',
                        closeModal: true,
                    }
                }

            });
        }
        else
        {
            swal({
                title: "Wait!",
                text: "Are you sure you want to edit this?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Data have been successfully updated!", {
                        icon: "success",

                    });
                    setTimeout(function(){ 
                        $.ajax({
                            url:'<?php echo e(route("EditAccount")); ?>',
                            type:'post',

                            cache:false,
                            data:$("#AccountForm").serialize(),
                            success:function()
                            {


                                location.reload();
                            }


                        })
                    }, 1000);
                } else {
                    swal("Operation Cancelled.", {
                        icon: "error",
                    });
                }
            });

        }

    });






        
    })

    




</script>

</body>
</html>
<?php /**PATH C:\xampp\htdocs\IUlat\resources\views/main/base.blade.php ENDPATH**/ ?>