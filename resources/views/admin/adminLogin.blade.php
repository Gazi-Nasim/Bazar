<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KHDC Bazar Fund | @yield('title')</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminAsset/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('adminAsset/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('adminAsset/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('adminAsset/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminAsset/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('adminAsset/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('adminAsset/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('adminAsset/plugins/summernote/summernote-bs4.min.css')}}">
</head>

<body>
  

   
<div class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b></a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Admin Login</p>

                <form action="{{ route('login') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>
            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
</div>


   
</body>

</html>
 <!-- jQuery -->
 <script src="{{asset('adminAsset/plugins/jquery/jquery.min.js')}}"></script>
 <!-- jQuery UI 1.11.4 -->
 <script src="{{asset('adminAsset/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
 <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
 <script>
     $.widget.bridge('uibutton', $.ui.button)
 </script>
 <!-- Bootstrap 4 -->
 <script src="{{asset('adminAsset/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
 <!-- ChartJS -->
 <script src="{{asset('adminAsset//plugins/chart.js/Chart.min.js')}}"></script>
 <!-- Sparkline -->
 <script src="{{asset('adminAsset/plugins/sparklines/sparkline.js')}}"></script>
 <!-- JQVMap -->
 <script src="{{asset('adminAsset/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
 <script src="{{asset('adminAsset/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
 <!-- jQuery Knob Chart -->
 <script src="{{asset('adminAsset/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
 <!-- daterangepicker -->
 <script src="{{asset('adminAsset/plugins/moment/moment.min.js')}}"></script>
 <script src="{{asset('adminAsset/plugins/daterangepicker/daterangepicker.js')}}"></script>
 <!-- Tempusdominus Bootstrap 4 -->
 <script src="{{asset('adminAsset/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
 <!-- Summernote -->
 <script src="{{asset('adminAsset/plugins/summernote/summernote-bs4.min.js')}}"></script>
 <!-- overlayScrollbars -->
 <script src="{{asset('adminAsset/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
 <!-- AdminLTE App -->
 <script src="{{asset('adminAsset/adminlte.js')}}"></script>
 <!-- AdminLTE for demo purposes -->
 <script src="{{asset('adminAsset/demo.js')}}"></script>
 <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
 <script src="{{asset('adminAsset/dashboard.js')}}"></script>

