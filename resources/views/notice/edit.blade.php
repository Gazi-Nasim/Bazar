@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <h4 class="text-center" style="padding-top: 15px;color: #729a02;font-weight: bold;font-size: 22px;"> খাগড়াছড়ি <a
            class="olivine-blink" style="color:red;font-weight: bold" href="javascript:void(0)">বাজার ফান্ড</a><br>
        নোটিশ </h4>
</div>
<div class="col-md-12" style="margin-top: 15px;">
    <div class="col-md-6 col-md-offset-3">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <strong>{{ $message }}</strong>
        </div>
        @endif
        <div class="panel panel-body">
            <form action="{{route('notice.update',$n->id)}}" method="post">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="lphone">শিরোনাম &nbsp;<span style="color: red">*</span></label>
                    <input type="text" name="title" class="form-control" value="{{$n->title}}">
                    
                </div>
                <div class="form-group">
                    <label for="lphone">বিস্তারিত &nbsp;<span style="color: red">*</span></label>
                    <textarea name="details" id="" cols="15" rows="5" class="form-control">{{$n->details}}</textarea>
                    
                </div>
                <button type="submit"  class="btn btnBKKB" style="float: left">
                    আপডেট করুন</button>
            </form>
        </div>
    </div>
</div>
<div class="col-md-12" style="margin-top: 15px;">
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
                        <th>SL</th>
                        <th>শিরোনাম</th>
                        <th>বিস্তারিত</th>
                        <th>প্রকাশের তারিখ</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($notice as $k=>$v)
                        <tr>
                            <td>{{++$k}}</td>
                            <td>{{$v->title}}</td>
                            <td>{{$v->details}}</td>
                            <td>{{$v->publish_date}}</td>
                            <td>
                                <a href="{{route('notice.edit',$v->id)}}" style="color: green" class="btn"><i class="fa-solid fa-pen-to-square"></i></a>
                                <a href="{{route('notice.destroy',$v->id)}}" style="color: red" class="btn" onclick="return confirm('are you sure?')"><i class="fa-solid fa-trash"></i></a>
                               
                            </td>
                        </tr>
                    @empty
                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection