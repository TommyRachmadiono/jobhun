<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.7
Version: 4.7.1
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Jobhun | User Login </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
    <meta content="" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/global/plugins/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/global/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="{{ asset('admin/assets/global/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/global/plugins/select2/css/select2-bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="{{ asset('admin/assets/global/css/components.min.css') }}" rel="stylesheet" id="style_components" type="text/css" />
    <link href="{{ asset('admin/assets/global/css/plugins.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="{{ asset('admin/assets/pages/css/login.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href=" {{ url('/') }}">
                <img src="{{ asset('logo.png') }}" height="100" alt="" /> </a>
            </div>
            <!-- END LOGO -->
            <!-- BEGIN LOGIN -->
            <div class="content">
                <!-- BEGIN LOGIN FORM -->
                <form class="login-form" action="{{ route('loginCek') }}" method="post">
                    {{ csrf_field() }}
                    <h3 class="form-title font-green">Masuk</h3>
                    <div class="alert alert-danger display-hide">
                        <button class="close" data-close="alert"></button>
                        <span> Masukkan email / kata kunci. </span>
                    </div>

                    @if (isset($message))
                    <div class="alert alert-warning">
                        {{ $message }}
                    </div>
                    @endif
                    <div class="form-group">
                        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->

                        <label class="control-label visible-ie8 visible-ie9">Email / Nama Pengguna</label>
                        <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Email / Nama Pengguna" name="email" /> </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Kata Kunci</label>
                            <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="Kata Kunci" name="password" /> </div>
                            <div class="form-actions">
                                <button type="submit" class="btn green uppercase">Masuk</button>
                                <a href="javascript:;" id="forget-password" class="forget-password">Lupa Kata Sandi?</a>
                            </div>

                {{-- <div class="login-options">
                    <h4>Or login with</h4>
                    <ul class="social-icons">
                        <li>
                            <a class="social-icon-color facebook" data-original-title="facebook" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color googleplus" data-original-title="Goole Plus" href="javascript:;"></a>
                        </li>
                        <li>
                            <a class="social-icon-color linkedin" data-original-title="Linkedin" href="javascript:;"></a>
                        </li>
                    </ul>
                </div> --}}
                <div class="create-account">
                    <p>
                        <a href="javascript:;" id="register-btn" class="uppercase">Buat Akun Baru</a>
                    </p>
                </div>
            </form>
            <!-- END LOGIN FORM -->

            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="forget-form" action="{{ route('forgot_password') }}" method="POST">
                {{ csrf_field() }}
                @if (Session::has('message'))
                <div class="alert alert-danger">{{ Session::get('message') }}</div>
                @endif
                <h3 class="font-green">Lupa Kata Sandi ?</h3>
                <p> Masukkan e-mail anda untuk mendapatkan kata sandi baru. </p>

                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" required=""> 
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn green btn-outline">Kembali</button>
                    <input type="submit" class="btn btn-success uppercase pull-right" value="Kirim">
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
            <!-- BEGIN REGISTRATION FORM -->
            <form id="form-register" class="register-form" action="{{ route('register') }}" method="POST">
                {{ csrf_field() }}

                <h3 class="font-green">Sign Up</h3>

                @if ($errors->any())
                
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li id="error">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                
                <p class="hint"> Isikan detail akun anda: </p>
                <div class="form-group">
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username" /> </div>
                    <div class="form-group">
                        <label class="control-label visible-ie8 visible-ie9">Kata Sandi</label>
                        <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="register_password" placeholder="Kata sandi" name="password" /> </div>
                        <div class="form-group">
                            <label class="control-label visible-ie8 visible-ie9">Re-type Your Password</label>
                            <input class="form-control placeholder-no-fix" type="password" autocomplete="off" id="password_confirmation" placeholder="Ketik ulang kata sandi anda" name="password_confirmation" /> </div>
                            <div class="form-group">
                                <label class="control-label visible-ie8 visible-ie9">Email</label>
                                <input class="form-control placeholder-no-fix" type="email" autocomplete="off" placeholder="Masukkan email anda" name="email" /> </div>
                                <div class="form-group">
                                    <div class="row">
                                        <span class="col-md-4 cptc-img">
                                            {!! captcha_img() !!}
                                        </span>
                                        <span class="col-md-3">
                                            <a class="btn btn-info cptc-btn" ><i class="fa fa-refresh"></i> Refresh Kode</a>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label visible-ie8 visible-ie9">Masukkan kode di atas</label>
                                    <input class="form-control placeholder-no-fix" type="text" id="captcha" autocomplete="off" placeholder="Masukkan kode captcha diatas" name="captcha" /> </div>
                {{-- <div class="form-group margin-top-20 margin-bottom-20">
                    <label class="mt-checkbox mt-checkbox-outline">
                        <input type="checkbox" name="tnc" /> I agree to the
                        <a href="javascript:;">Terms of Service </a> &
                        <a href="javascript:;">Privacy Policy </a>
                        <span></span>
                    </label>
                    <div id="register_tnc_error"> </div>
                </div> --}}
                <div class="form-actions">
                    <button type="button" id="register-back-btn" class="btn green btn-outline">Kembali</button>
                    <input type="submit" id="daftar" class="btn btn-success uppercase pull-right" value="Daftar">
                </div>
            </form>
            <!-- END REGISTRATION FORM -->
        </div>
        <div class="copyright"> 2019 © Jobhun Indonesia. </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="{{ asset('admin/assets/global/plugins/jquery.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/js.cookie.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/jquery.blockui.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="{{ asset('admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/jquery-validation/js/additional-methods.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('admin/assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="{{ asset('admin/assets/global/scripts/app.min.js') }}" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{ asset('admin/assets/pages/scripts/login.min.js') }}" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->

<script type="text/javascript">
    $(".cptc-btn").click(function(){
        $.ajax({
            type: 'GET',
            url: '{{ route('refresh.captcha') }}',
            success:function(data){
                $(".cptc-img").html(data.captcha);
            }
        });
    });
</script>

<script type="text/javascript">
    $( document ).ready(function() {
        var mode = "{{ session('mode') }}";
        if(mode == "regis")
            $( "#register-btn" ).trigger( "click" );
        else if(mode == "forgot_pass")
            $( "#forget-password" ).trigger("click");
        
        $('#register-back-btn').click(function(){
            alert("kembali ke login");
            $.ajax({
                type: 'GET',
                url: "{{ env('APP_URL').'/destroy_session/mode' }}",
                success:function(){
                }
            });                
        });

        $('#back-btn').click(function(){
            alert("kembali ke login");
            $.ajax({
                type: 'GET',
                url: "{{ env('APP_URL').'/destroy_session/mode' }}",
                success:function(){
                }
            });                
        });
        
    });
</script>
</body>

</html>