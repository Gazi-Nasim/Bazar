@extends('admin.layout.layout')
@section('title')
Bazar List
@endsection
@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Bazar</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Bazar</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
              
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Application List</h3>
                        </div>


                        <div class="card-body">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <strong>{{ $message }}</strong>
                            </div>
                            @endif
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>আবেদন কারির নাম</th>
                                        <th>জরিপ কারির নাম</th>
                                        <th>উপজেলা</th>
                                        <th>বাজার</th>
                                        <th>প্লট নং</th>
                                        <th>জয়াইগার পরিমান</th>
                                        <th>জয়াইগার ধরণ</th>
                                        <th>অবস্থা</th>
                                        <th>পরবর্তী</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($application as $k=>$v)
                                        <tr>
                                            <td>{{++$k}}</td>
                                            <td>{{$v->user->name}}</td>
                                            <td>{{$v->serveyor->name}}</td>
                                            <td>{{$v->upazilla->name}}</td>
                                            <td>{{$v->bazar->name}}</td>
                                            <td>{{$v->plot_no}}</td>
                                            <td>{{$v->plot_area}}</td>
                                            <td>{{$v->plot_type}}</td>
                                            <td style="text-transform: uppercase">{{$v->status}}</td>
                                            <td>
                                            <a href="{{route('survey.show',$v->id)}}" class="btn btn-primary">Add Report</a>
                                                
                                            </td>
                                            <td>
                                                <a href="{{route('application',$v->id)}}" class="btn" style="color: green" ><i class="fa-solid fa-eye"></i></a>
                                                
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">কোনো আবেদন নাই</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection

@section('js')
{{-- <div class="modal fade" id="report" role="dialog" >
    <div class="modal-dialog">
        <div class="modal-content" style="width: 188%;
        height: 500px;
        margin-left: -153px;">
            <div class="modal-header">
                <h3 class="modal-title regModalHeading">জরিপ রিপোর্ট যোগ করুন</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
               
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="loginErrorMessage hide"
                            style="font-weight: 600;background-color:#f2dede;border-color:#ebccd1;color:#a94442;margin-bottom: 10px">
                        </div>
                       
                        <form action="{{route('survey.update',)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="col-md-12" id="">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="lphone">জরিপ প্রতিবেদন &nbsp;<span style="color: red">*</span></label>
                                        <textarea name="survey_report" id="summernote" cols="30" rows="50"></textarea>
                                        @error('survey_report')
                                        <span style="color: red">{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                    <button type="submit" id="btnLogin" class="btn btn-primary" style="float: left">
                                        যোগ করুন</button>
                                </div>
                                
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<script>
    $(document).ready(function() {
  $('#summernote').summernote({
  height: 200,
  focus: true
});
});
</script>
@endsection