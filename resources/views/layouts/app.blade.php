<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'খাগড়াছড়ি বাজার ফান্ড') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('front_asset/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{asset('front_asset/css/datePicker.css')}}" />
    <link rel="stylesheet" href="{{asset('front_asset/css/alert.css')}}" />
    <link href="https://bpmcbd.com/maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.html" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('front_asset/css/styleBkkb.css')}}" />
    <link href="image/favicon.html" rel="icon" type="image/x-icon" />

</head>

<body>
    <style>
        .regModalHeading {
            text-align: center;
            font-weight: bold;
            color: #662D91;
        }

        h3,
        .h3 {
            font-size: 24px;
        }

        .modal-header {
            border-bottom: 3px solid #0D5E35;
            border-image: url(pagenotfound.html) 30;
        }
    </style>
    <style type="text/css">
        .nav-pills>li {
            width: 33.33%;
            text-align: center;
        }

        .nav-pills>li+li {
            margin-left: 0;
        }

        .nav-pills>li>a,
        .progress {
            border-radius: 0;
        }

        .progress {
            height: 10px;
            margin: 10px 0;
        }

        label {
            font-weight: normal;
        }

        .form-group {
            margin-bottom: 10px;
        }
    </style>

    <div class="container">
        <div class="row">
            <nav class="navbar navbar-default">
                <div class="container" style="padding-bottom: 4px; padding-top: 4px;">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a style="float: left" class="hidden-xs" href="{{route('home')}}">
                            <img src="http://khdc.gov.bd/images/img0005.png" class="img img-responsive" style="height: 50px;" />
                        </a>
                        <a style="color: white" class="navbar-brand hidden-sm hidden-xs" href="#">
                            খাগড়াছড়ি পার্বত্য জেলা পরিষদ (কেএইচডিসি) </a>
                        <a style="color: white" class="navbar-brand hidden-lg hidden-md" href="#">
                            (কেএইচডিসি) </a>
                    </div>
                    <div class="collapse navbar-collapse" id="myNavbar">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="{{route('home')}}">হোম</a></li>

                            <li><a href="{{route('records')}}">রেকর্ড সমূহ</a></li>
                            <li><a href="{{route('home.notice')}}">নোটিশ</a></li>
                            @if (Auth::check())
                            <li><a href="{{route('applicant.index')}}" data-toggle="modal">{{Auth::user()->name}}</a> </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <i class="fas fa">লগ আউট</i>
                                </a>
                            </li>
                            @else
                            <li><a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal">লগইন</a>
                            </li>
                            @endif

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Logout Modal Start -->
    <div class="modal fade logout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="color: black">আপনি কি নিশ্চিৎভাবে লগআউট করতে চান ?
                    </h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">না, নিশ্চিত নয়</button>
                    <a type="button" class="btn btn-primary" href="Front/logout.html" style="background-color: #683091">হ্যাঁ, আমি নিশ্চিত</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Logout Modal Start -->
    <div class="modal fade" tabindex="-1" role="dialog" id="msg" aria-labelledby="mySmallModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel" style="color: black"></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal" style="background-color: #683091">পুনরায় চেষ্টা করুন</button>

                </div>
            </div>
        </div>
    </div>
    <!-- Login Modal Start -->
    <div class="modal fade" id="loginModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title regModalHeading">লগইন কর্ণার</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="loginErrorMessage hide" style="font-weight: 600;background-color:#f2dede;border-color:#ebccd1;color:#a94442;margin-bottom: 10px">
                            </div>
                            <div class="col-md-12" id="">
                                <div class="col-md-8 col-md-offset-2">
                                    <form action="{{route('userLogin')}}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="lphone">মোবাইল নং &nbsp;<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="lphone" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="lpassword">পাসওয়ার্ড &nbsp;<span style="color: red">*</span></label>
                                            <input type="password" maxlength="15" class="form-control" id="lpassword" name="password">
                                        </div>
                                        <button type="submit" id="btnLogin" class="btn btnBKKB" style="float: left">
                                            লগইন</button>
                                        &nbsp;&nbsp; <a href="javascript:void(0)" data-toggle="modal" data-dismiss="modal" data-target="#registerModal">রেজিস্ট্রেশন করুন</a>

                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Modal Start -->
    <div class="modal fade" id="registerModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title regModalHeading">রেজিস্ট্রেশন কর্ণার</h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="loginErrorMessage hide" style="font-weight: 600;background-color:#f2dede;border-color:#ebccd1;color:#a94442;margin-bottom: 10px">
                            </div>
                            <form action="{{route('userRegistration')}}" method="post">
                                @csrf
                                <div class="col-md-12" id="">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lphone">নাম &nbsp;<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="lphone" name="name" value="{{old('name')}}">
                                            @error('name')
                                            <span style="color: red">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="lpassword">মোবাইল নং &nbsp;<span style="color: red">*</span></label>
                                            <input type="text" maxlength="15" class="form-control" id="lpassword" name="phone" value="{{old('phone')}}">
                                            @error('phone')
                                            <span style="color: red">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <button type="submit" id="btnLogin" class="btn btnBKKB" style="float: left">
                                            রেজিস্টার</button>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lphone">ই-মেইল &nbsp;<span style="color: red">*</span></label>
                                            <input type="email" class="form-control" id="lphone" name="email" value="{{old('email')}}">
                                            @error('email')
                                            <span style="color: red">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="lpassword">পাসওয়ার্ড &nbsp;<span style="color: red">*</span></label>
                                            <input type="password" maxlength="15" class="form-control" id="lpassword" name="password" value="{{old('password')}}">
                                            @error('password')
                                            <span style="color: red">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!--Phone number verification modal start-->
    <div class="modal fade" id="verifyModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title regModalHeading"></h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="loginErrorMessage hide" style="font-weight: 600;background-color:#f2dede;border-color:#ebccd1;color:#a94442;margin-bottom: 10px">
                            </div>
                            <div class="col-md-12" id="">
                                <div class="col-md-8 col-md-offset-2">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="lphone">মোবাইল ফোন নম্বর &nbsp;<span style="color: red">*</span></label>
                                            <input type="text" maxlength="11" class="form-control" id="lphone" name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="lpassword">কোড &nbsp;<span style="color: red">*</span></label>
                                            <input type="text" maxlength="15" class="form-control" id="lpassword" name="code">
                                        </div>
                                        <button type="submit" id="btnLogin" class="btn btnBKKB" style="float: left">
                                            ভেরিফাই করুন</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Phone number verification modal start-->
    <div class="modal fade" id="resendModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title regModalHeading">নতুন কোড পাঠান </h3>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="loginErrorMessage hide" style="font-weight: 600;background-color:#f2dede;border-color:#ebccd1;color:#a94442;margin-bottom: 10px">
                            </div>
                            <div class="col-md-12" id="">
                                <div class="col-md-8 col-md-offset-2">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label for="lphone">মোবাইল ফোন নম্বর &nbsp;<span style="color: red">*</span></label>
                                            <input type="text" maxlength="11" class="form-control" id="lphone" name="phone">
                                        </div>
                                        <button type="submit" id="btnLogin" class="btn btnBKKB" style="float: left"> কোড
                                            পাঠান</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- registration successful --}}
    <div class="modal fade" id="regSuccessModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-md-12" id="">
                                <div class="col-md-8 col-md-offset-2">
                                    @if ($message = Session::get('success'))
                                    <div class="alert alert-success">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Payemnt successful --}}
    <div class="modal fade" id="paidModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-md-12" id="">
                                <div class="col-md-8 col-md-offset-2">
                                    @if ($message = Session::get('paid'))
                                    <div class="alert alert-success">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Payemnt failed --}}
    <div class="modal fade" id="failModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="col-md-12" id="">
                                <div class="col-md-8 col-md-offset-2">
                                    @if ($message = Session::get('fail'))
                                    <div class="alert alert-danger">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        function redirect() {
            window.location.assign('index')
        }
    </script>
    <div class="container bg">
        <div style="margin-top: 10px;">
        </div>
        <div class="row">
            @yield('content')
        </div>
    </div>
    <div id="redAlertModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">মোজিলা ফায়ারফক্স ব্রাউজার (Mozilla Firefox) সাময়িকভাবে ব্যবহার করবেন না
                    </h4>
                </div>
                <div class="modal-body text-center" style="color: #729a02">
                    <img src="front_asset/image/firefox.png" alt="" />
                    <h3>সফটওয়্যার এবং মজিলা ফায়ারফক্স (Mozilla Firefox) ব্রাউজার আপডেট এর কারণে সফটওয়্যার এর কিছু জিনিস
                        মজিলা (Firefox) ব্রাউজার সঠিকভাবে কাজ করছে না। তাই সাময়িকভাবে মজিলা ফায়ারফক্স ব্রাউজার ছাড়া
                        অন্যান্য সকল ব্রাউজার ব্যবহার করে সকল কর্মচারিকে আবেদন করার জন্য অনুরোধ করা হল।</h3>

                    <h4>সাময়িক এ অসুবিধার জন্য আমরা দুঃখিত !!!</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="container footer-bottom">
        <div class="row">
            <div class="">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div class="copyright" style="color: #222222;">
                        © ২০১৯ ,খাগড়াছড়ি পার্বত্য জেলা পরিষদ (কেএইচডিসি), স্বত্বাধিকার সংরক্ষিত
                    </div>
                </div>
                <div class="col-md-2 col-sm-12 col-xs-12">
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="copyright powered">
                        <a style="color: #222222;text-decoration: none;">উন্নয়ন, রক্ষনাবেক্ষন ও পরিসেবায় : </a> - <a style="color: #222222;" target="_blank" href="http://www.shaptakbd.com/">সপ্তক (আইটি)
                            লিমিটেড <img src="front_asset/image/Shaptak%20Logo.png" style="height: 25px; margin-left: 3px;" /></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('front_asset/js/jquery.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
    <script src="{{asset('front_asset/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('front_asset/js/datePicker.js')}}"></script>
    <script src="{{asset('front_asset/js/alert.js')}}"></script>
    <script src="{{asset('front_asset/js/alertFunction.js')}}"></script>
    <script src="{{asset('front_asset/js/bkkbScript.js')}}"></script>
    @yield('jqury')
    <script type="text/javascript">
        $(document).ready(function() {
            @if(Session::get('success') != '')
            $("#regSuccessModal").modal("show");
            @endif
            @if(Auth::check())
            @else
            @if($errors -> any())
            $("#registerModal").modal("show");
            @endif
            @endif

            @if(Session::get('paid') != '')
            $("#paidModal").modal("show");
            @endif

            @if(Session::get('fail') != '')
            $("#failModal").modal("show");
            @endif
        });
    </script>
    <script>
        (function(window, document) {
            var loader = function() {
                var script = document.createElement("script"),
                    tag = document.getElementsByTagName("script")[0];
                script.src = "https://sandbox.sslcommerz.com/embed.min.js?" + Math.random().toString(36).substring(7);
                tag.parentNode.insertBefore(script, tag);
            };

            window.addEventListener ? window.addEventListener("load", loader, false) : window.attachEvent("onload", loader);
        })(window, document);
    </script>    
</body>



</html>