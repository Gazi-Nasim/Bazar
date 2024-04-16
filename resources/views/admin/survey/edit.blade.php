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
                            <h3 class="modal-title regModalHeading">জরিপ রিপোর্ট যোগ করুন</h3>
                        </div>


                        <div class="card-body">
                            <form action="{{route('survey.update',$application->id)}}" method="post">
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
                    </div><!-- /.container-fluid -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>

@endsection

@section('js')

<script>
    $(document).ready(function() {
  $('#summernote').summernote({
  height: 200,
  focus: true
});
});
</script>
@endsection