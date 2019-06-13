<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <title>iUlat | Login Page</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
    <!-- ================== BEGIN BASE CSS STYLE ================== -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="{{asset('assets/plugins/jquery-ui/jquery-ui.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/bootstrap/4.0.0/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/font-awesome/5.0/css/fontawesome-all.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/plugins/animate/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/default/style.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/default/style-responsive.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/default/theme/default.css')}}" rel="stylesheet" id="theme" />
    <link rel='shortcut icon' type='image/x-icon' href="{{asset('eyeulat_logo.png')}}" />
    <!-- ================== END BASE CSS STYLE ================== -->
    <link href="{{asset('assets/plugins/parsley/src/parsley.css')}}" rel="stylesheet" />
    <!-- ================== BEGIN BASE JS ================== -->    
    <script src="{{asset('assets/plugins/pace/pace.min.js')}}"></script>
    <!-- ================== END BASE JS ================== -->
</head>
<body class="pace-top bg-white">
    <!-- begin #page-loader -->
    <div id="page-loader" class="fade show"><span class="spinner"></span></div>
    <!-- end #page-loader -->
    
    <!-- begin #page-container -->
    <div id="page-container" class="fade">
        <!-- begin login -->
        <div class="login login-with-news-feed">
            <!-- begin news-feed -->
            <div class="news-feed">
                <div class="news-image" style="background-image: url(../public/assets/img/login-bg/pup-bg.jpg)"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>i</b>Ulat</h4>
                    <p>
                        
                    </p>
                </div>
            </div>
            <!-- end news-feed -->
            <!-- begin right-content -->
            <div class="right-content">
                <!-- begin login-header -->
                <div class="login-header">
                    <div class="brand">
                        <span class="logo" ></span> <b>i</b> Ulat
                        <small></small>
                    </div>
                    <div class="icon">
                        <i class="fa fa-sign-in"></i>
                    </div>
                </div>
                <!-- end login-header -->
                <!-- begin login-content -->
                <div class="login-content">
                    <form method="POST" class="margin-bottom-0" data-parsley-validate="true">
                        @csrf
                        <div class="form-group m-b-15">
                            <input type="text" class="form-control form-control-lg" id="user_name_txt" name="user_name_txt" placeholder="Username" data-parsley-required="true" />
                        </div>
                        <div class="form-group m-b-15">
                            <input type="password" class="form-control form-control-lg"  id="password_txt" name="password_txt"  placeholder="Password" data-parsley-required="true" />
                        </div>
                    
                        <div class="login-buttons">
                            <a type="submit" class="btn btn-danger btn-block btn-lg" id="SigninBtn" style="color: white;">Sign me in</a>
                        </div>
                        <div class="m-t-20 m-b-40 p-b-40 text-inverse">
                            Not a member yet? Click <a href="register_v3.html" class="text-success">here</a> to register.
                        </div>
                        <hr />
                       
                    </form>
                </div>
                <!-- end login-content -->
            </div>
            <!-- end right-container -->
        </div>
        <!-- end login -->
        
       
    </div>
    <!-- end page container -->
    
    <!-- ================== BEGIN BASE JS ================== -->
    <script src="{{asset('assets/plugins/jquery/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/4.0.0/js/bootstrap.bundle.min.js')}}"></script>
    <!--[if lt IE 9]>
        <script src="../assets/crossbrowserjs/html5shiv.js"></script>
        <script src="../assets/crossbrowserjs/respond.min.js"></script>
        <script src="../assets/crossbrowserjs/excanvas.min.js"></script>
    <![endif]-->
    <script src="{{asset('assets/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/plugins/js-cookie/js.cookie.js')}}"></script>
    <script src="{{asset('assets/js/theme/default.min.js')}}"></script>
    <script src="{{asset('assets/js/apps.min.js')}}"></script>
    <!-- ================== END BASE JS ================== -->
    <script src="{{asset('assets/plugins/parsley/dist/parsley.js')}}"></script>
    <script src="{{asset('assets/plugins/gritter/js/jquery.gritter.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('assets/js/demo/ui-modal-notification.demo.min.js')}}"></script>


    <script>
        $(document).ready(function() {
            App.init();
           
        });
    </script>

  <script>
        $(document).ready(function()
        {

$("#SigninBtn").click(function()
        {
        $("form").parsley().validate();
            $.ajax({
                url:'SignIn',
                type:'post',
        
            
                data:
                 {'UsernameTxt':$("#user_name_txt").val(),'PasswordTxt':$("#password_txt").val(),'_token':'{{csrf_token()}}'},
                 dataType:'json',
                success:function(data)
                {     
                    
                    if(data==0)
                    {

                        $('input').val('');
                              swal({
                    title: 'Ooops!',
                    text: 'Incorrect username and password!',
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
                    else{
                          
                         location.href='{{route("Dashboard")}}';
                        

                        }


        
                }

            })


        })
        })
           


    </script>
</body>
</html>
