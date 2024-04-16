@extends('admin.layout.layout')
@section('title')
Admin User List
@endsection
@section('body')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Admin User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Admin User</li>
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
                @can('ব্যবহারকারী তৈরী')
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Admin Add</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{route('adminUser.store')}}" method="post">
                                @csrf
                                <table class="table table-bordered">
                                    <tr>
                                        <th>Name</th>
                                        <th>
                                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                                            @error('name')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </th>
                                        <th>Email</th>
                                        <th>
                                            <input type="email" name="email" class="form-control" value="{{old('email')}}">
                                            @error('email')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </th>
                                        
                                    </tr>
                                    <tr>
                                        <th>Phone</th>
                                        <th>
                                            <input type="text" name="phone" class="form-control" value="{{old('phone')}}">
                                            @error('phone')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </th>
                                        <th>Password</th>
                                        <th>
                                            <input type="password" name="password" class="form-control" value="{{old('password')}}">
                                            @error('password')
                                            <span style="color:red">{{$message}}</span>
                                            @enderror
                                        </th>
                                    </tr>
                                    <tr>
                                        <th>Role</th>
                                        <td>
                                            <select name="role" id="" class="form-control">
                                                <option value="">Select Role</option>
                                                @foreach ($role as $r)
                                                    <option value="{{$r->id}}">{{$r->name}}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <th colspan="2"><input type="submit" value="Save" class="form-control btn btn-primary"></th>
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
                            <h3 class="card-title">Admin List</h3>
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
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Role</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($user as $k=>$v)
                                    <tr>
                                        <td>{{++$k}}</td>
                                        <td>{{$v->name}}</td>
                                        <td>{{$v->email}}</td>
                                        <td>{{$v->phone}}</td>
                                        <td>{{$v->getRoleNames()->first()}}</td>
                                        <td>
                                            <form action="{{route('adminUser.destroy',$v->id)}}" method="post">
                                            <a href="{{route('adminUser.edit',$v->id)}}" class="btn" style="color: green"><i
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
                                        <td colspan="4">No Admin added Yet</td>

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