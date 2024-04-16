@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <h4 class="text-center" style="padding-top: 15px;color: #729a02;font-weight: bold;font-size: 22px;"> খাগড়াছড়ি <a
            class="olivine-blink" style="color:red;font-weight: bold" href="javascript:void(0)">বাজার ফান্ড</a><br>
        নোটিশ </h4>
</div>

<div class="col-md-12" style="margin-top: 15px;">
    <div class="col-md-12">
        @php
        $bn=new lemonpatwari\BanglaNumber\NumberToBangla();
     @endphp
      @php
      $d=explode('-',$list->publish_date);
  @endphp
        <div class="panel panel-body">
            <h4>{{$list->title}}</h4>
            <em>প্রকাশের তারিখঃ {{$bn->bnNum($d[2])}} {{$bn->bnMonth($d[1])}}, {{$bn->bnNum($d[0])}}</em><br>
            <a href="{{asset('notice/'.$list->file)}}" download>ডাউনলোড</a>
            <hr>
            <p>{!!$list->details!!}</p>
        </div>
    </div>
</div>


@endsection