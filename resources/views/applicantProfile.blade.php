@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <h4 class="text-center" style="padding-top: 15px;color: #729a02;font-weight: bold;font-size: 22px;"> খাগড়াছড়ি <a
            class="olivine-blink" style="color:red;font-weight: bold" href="javascript:void(0)">বাজার ফান্ড </a>
        <br><span> {{Auth::user()->name}}</span>
    </h4>
</div>
<div class="col-md-12" style="margin-top: 15px;min-height:70vh;">
    <h4>আপনার আবেদনের তালিকা</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>SL</th>
                <th>উপজেলা</th>
                <th>বাজার</th>
                <th>প্লট নং</th>
                <th>জয়াইগার পরিমান</th>
                <th>জয়াইগার ধরণ</th>
                <th>অবস্থা</th>
                <th>পরিশোধ যোগ্য টাকা</th>
                <th>পরিশোধের অবস্থা</th>
                <th>#</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($app as $k=>$v)
                <tr>
                    <td>{{++$k}}</td>
                    <td>{{$v->upazilla->name}}</td>
                    <td>{{$v->bazar->name}}</td>
                    <td>{{$v->plot_no}}</td>
                    <td>{{$v->plot_area}}</td>
                    <td>{{$v->plot_type}}</td>
                    <td style="text-transform: uppercase">{{$v->status}}</td>
                    <td>{{$v->payment_amount}}</td>
                    <td>{{$v->payment_status}}</td>
                    <td>
                        <a href="{{route('applicant.show',$v->id)}}" class="btn" style="color: green" ><i class="fa-solid fa-eye"></i></a>
                        
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">আপনি কোনো আবেদন করেন নি</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>


@endsection
