@extends('admin.layout.layout')
@section('title')
Notice List
@endsection
@section('body')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Notice</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Notice</li>
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
                @can('নোটিশ প্রকাশ করা')
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Notice Add</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('notice.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <th colspan="4">
                                            <textarea name="details" id="summernote" cols="30" rows="50" class=""></textarea>
                                            @error('details')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <th>
                                            <input type="text" name="title" class="form-control" value="{{old('title')}}">
                                            @error('title')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </th>
                                        <th><input type="file" class="form-control" name="file">
                                            @error('file')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </th>
                                        
                                        <th><input type="submit" value="Save" class="form-control btn btn-primary"></th>
                                    </tr>
                                    
                                </table>
                            </form>
                        </div>
                    </div><!-- /.container-fluid -->
                </div>
                @endcan
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Notice List</h3>
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
                                        <th>Date</th>
                                        <th>Title</th>
                                        <th>Attachment</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($list as $k=>$v)
                                    <tr>
                                        <td>{{++$k}}</td>
                                        <td>{{$v->publish_date}}</td>
                                        <td>{{$v->title}}</td>
                                        <td><a href="{{asset('notice/'.$v->file)}}" download class="btn btn-xs btn-info">Download Attachment</a></td>
                                        <td>
                                            <form action="{{route('notice.destroy',$v->id)}}" method="post">
                                                <a href="{{route('notice.edit',$v->id)}}" class="btn" style="color: green"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn" style="color: red"
                                                    onclick="return confirm('are you sure!')"><i
                                                        class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4">No Bazar Added Yet</td>
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
<script>
    $(document).ready(function() {
  $('#summernote').summernote({
  height: 200,
  focus: true
});
});
</script>
@endsection