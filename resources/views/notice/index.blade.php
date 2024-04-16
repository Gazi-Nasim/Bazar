@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <h4 class="text-center" style="padding-top: 15px;color: #729a02;font-weight: bold;font-size: 22px;"> খাগড়াছড়ি <a
            class="olivine-blink" style="color:red;font-weight: bold" href="javascript:void(0)">বাজার ফান্ড</a><br>
        নোটিশ </h4>
</div>

<div class="col-md-12" style="margin-top: 15px;min-height:70vh;">
    <div class="col-md-12">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="panel panel-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ক্রমিক নং</th>
                        <th>প্রকাশের তারিখ</th>
                        <th>শিরোনাম</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @php
                       $bn=new lemonpatwari\BanglaNumber\NumberToBangla();
                    @endphp
                    @forelse ($list as $k=>$v)
                    @php
                        $d=explode('-',$v->publish_date);
                    @endphp
                        <tr>
                            <td>{{$bn->bnNum(++$k)}}</td>
                            <td>{{$bn->bnNum($d[2])}} {{$bn->bnMonth($d[1])}}, {{$bn->bnNum($d[0])}}</td>
                            <td><a href="{{route('home.notice.details',$v->id)}}">{{$v->title}}</a></td>
                            <td><a href="{{route('home.notice.details',$v->id)}}" style="background:#729a02;color:aliceblue;padding:5px;">বিস্তারিত</a></td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection