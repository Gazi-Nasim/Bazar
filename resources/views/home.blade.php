@extends('layouts.app')
@section('content')
<div class="container">
    <div class="carousel-col">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="margin-top:15px;">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            </ol>
            <div class="carousel-inner " style="margin-top: 1%;">
                <div class="item active">
                    <img class="sliderImage" src="front_asset/image/05ce17e277fc918728804247005d7bed.jpg" alt="banner1">
                </div>
                <div class="item ">
                    <img class="sliderImage" src="front_asset/image/b435390b13187b6c703bd3a62d1d6c0e.jpg" alt="banner1">
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <h4 class="text-center" style="padding-top: 15px;color: #729a02;font-weight: bold;font-size: 22px;"> খাগড়াছড়ি <a
            class="olivine-blink" style="color:red;font-weight: bold" href="javascript:void(0)">বাজার ফান্ড</a> </h4>
</div>
<div class="col-md-12" style="margin-top: 15px;min-height:43vh">
    <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-body">
            <div class="col-md-3 col-sm-3" style="margin-top: 1%;">
                <img src="front_asset/image/image2.jpg" class="img img-responsive" />
            </div>
            <div class="col-md-9 col-sm-9" style="margin-top: 1%;">
                <p style="text-align: justify; font-size: 16px"> খাগড়াছড়ি বাজার ফান্ড সংস্থার নিয়ন্ত্রণাধীন  হাট-বাজারের
                    মালিকানা হস্তান্তর অথবা প্লট বরাদ্দ নিতে হলে লগইন করুন ।
                    <!-- <br> ( কেবলমাত্র কেএইচডিসির অফিসের
                    ব্যবহারের জন্য প্রজয্য ) </p>-->

                @if (Auth::check())
                <a href="{{route('applicant.create')}}" >
                    <button class="btn btn-default btn-sm"
                        style="margin-top: 52px;background-color: #683091;border-color: #683091;color: white; font-size: 20px">
                        আবেদন ফর্ম </button>
                </a>

                @else
                <a href="javascript:void(0);" data-toggle="modal" data-target="#loginModal">
                    <button class="btn btn-default btn-sm"
                        style="margin-top: 52px;background-color: #683091;border-color: #683091;color: white; font-size: 20px">
                        তথ্য প্রদান ফর্ম </button> </a>
                @endif

            </div>
        </div>
    </div>
</div>


@endsection
