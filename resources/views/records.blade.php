@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <h4 class="text-center" style="padding-top: 15px;color: #729a02;font-weight: bold;font-size: 22px;"> খাগড়াছড়ি <a
            class="olivine-blink" style="color:red;font-weight: bold" href="javascript:void(0)">বাজার ফান্ড </a>
        
    </h4>
</div>
<div class="col-md-12" style="margin-top: 15px;min-height:70vh;">
    <h4> প্লট বরাদ্দ  তালিকা</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <!--<th>উপজেলা</th>-->
                <th>বাজার</th>
                <th>প্লট নং</th>
                <th>বন্দ্যবস্তির ধরণ</th>
                <th>মালিকানা</th>
                <th>শুরু তারিখ</th>
                <th>শেষ তারিখ</th>
            </tr>
        </thead>
        <tbody>
            @php $ii=0;@endphp
            @forelse ($bazar as $k=>$v)
            @php
                $plots=App\Models\Plotrecord::where('bazar_id',$v->id)->groupBy('plot_no')->get();
            @endphp
            @if($plots->count()>0)
                <tr>
                    <td>{{++$ii}}</td>
                    <td>{{$v->name}}</td>
                    <td colspan="5">
                        <table class="table table-bordered">
                        @foreach($plots as $p)
                        @php 
                        $plot=App\Models\Plotrecord::where(['bazar_id'=>$v->id,'plot_no'=>$p->plot_no])->orderBy('id','desc')->first();@endphp
                        <tr>
                            <td>{{$p->plot_no}}</td>
                            <td>{{$plot->type}}</td>
                            <td>{{$plot->user->name}}</td>
                            <td>{{$plot->from_date}}</td>
                            <td>{{$plot->to_date}}</td>
                        </tr>
                        @endforeach
                        </table>
                    </td>
                    
                </tr>
                @endif
            @empty
                <tr>
                    <td colspan="6">আপনি কোনো আবেদন করেন নি</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


@endsection
