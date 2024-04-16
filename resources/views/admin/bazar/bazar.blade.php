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
                @can('বাজার তৈরী')
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Bazar Add</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('bazar.store')}}" method="post">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Upzila Name</th>
                                        <th>
                                            <select name="upazilla_id" id="" class="form-control">
                                                <option value="">Select Upozila</option>
                                                @foreach ($upozila as $v)
                                                <option value="{{$v->id}}">{{$v->name}}</option>
                                                @endforeach
                                            </select>
                                            @error('upazilla_id')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </th>
                                        <th>Name</th>
                                        <th>
                                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                            @error('name')
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
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Bazar List</h3>
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
                                        <th>Upazilla Name</th>
                                        <th>Bazar Name</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($bazar as $k=>$v)
                                    <tr>
                                        <td>{{++$k}}</td>
                                        <td>{{$v->upazilla->name}}</td>
                                        <td>{{$v->name}}</td>
                                        <td>
                                            <a href="{{route('bazar.edit',$v->id)}}" class="btn" style="color: green"><i
                                                    class="fa-solid fa-pen-to-square"></i></a>
                                            <form action="{{route('bazar.destroy',$v->id)}}" method="post">
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