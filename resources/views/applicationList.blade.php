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
                            <table class="table table-bordered datatable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>আবেদন কারির নাম</th>
                                        <th>উপজেলা</th>
                                        <th>বাজার</th>
                                        <th>প্লট নং</th>
                                        <th>জয়াইগার পরিমান</th>
                                        <th>জয়াইগার ধরণ</th>
                                        <th>অবস্থা</th>
                                        <th>পরিশোধ যোগ্য টাকা</th>
                                        <th>পরিশোধের অবস্থা</th>
                                        <th>পরবর্তী</th>
                                        <th>#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($app as $k=>$v)
                                        <tr>
                                            <td>{{++$k}}</td>
                                            <td>{{$v->user->name}}</td>
                                            <td>{{$v->upazilla->name}}</td>
                                            <td>{{$v->bazar->name}}</td>
                                            <td>{{$v->plot_no}}</td>
                                            <td>{{$v->plot_area}}</td>
                                            <td>{{$v->plot_type}}</td>
                                            <td style="text-transform: uppercase">{{$v->status}}</td>
                                            <td>{{$v->payment_amount}}</td>
                                            <td>{{$v->payment_status}}</td>
                                            <td>
                                                @if ($v->status=='pending')
                                                <form action="{{route('status',$v->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="approved">
                                                      <button type="submit" class="btn btn-xs btn-primary">Approve</button>
                                                </form>
                                                @elseif($v->status=='approved')
                                                    
                                                         <!-- Modal -->
                                                <div class="modal fade" id="exampleModal_{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <form action="{{route('status',$v->id)}}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Select Surveyer</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="status" value="survey">
                                                            <select name="surveyor_id" id="" class="form-control">
                                                                @foreach ($users as $u)
                                                                <option value="{{$u->id}}">{{$u->name}}</option>    
                                                                @endforeach
                                                                
                                                            </select>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                                  

                                                        
                                                <button type="submit" data-toggle="modal" data-target="#exampleModal_{{$v->id}}" class="btn btn-xs btn-primary">Suervey</button>
                                                    
                                                @elseif($v->status=='survey')
                                                <form action="{{route('status',$v->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="survey_completed">
                                                    <button type="submit" class="btn btn-xs btn-primary">Survey Completed</button>
                                                </form>
                                                @elseif($v->status=='survey_completed')
                                                <!--<form action="{{route('status',$v->id)}}" method="post">-->
                                                <!--    @csrf-->
                                                <!--    @method('PUT')-->
                                                <!--    <input type="hidden" name="status" value="payment">-->
                                                <!--    <button type="submit" class="btn btn-primary">Payment Request</button>-->
                                                <!--</form>-->
                                                <div class="modal fade" id="paymentModal_{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <form action="{{route('status',$v->id)}}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Payment Amount</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="status" value="payment">
                                                            <input type="text" name="payment_amount" placeholder="Enter payment amount" class="form-control">
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                                <button type="submit" data-toggle="modal" data-target="#paymentModal_{{$v->id}}" class="btn btn-xs btn-primary">Payment Request</button>
                                                @elseif($v->status=='payment' )
                                                <!--<form action="{{route('status',$v->id)}}" method="post">-->
                                                <!--    @csrf-->
                                                <!--    @method('PUT')-->
                                                <!--    <input type="hidden" name="status" value="final">-->
                                                <!--    <button type="submit" class="btn btn-primary">Close</button>-->
                                                <!--</form>-->
                                                <div class="modal fade" id="recordModal_{{$v->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <form action="{{route('status',$v->id)}}" method="post">
                                                            @csrf
                                                            @method('PUT')
                                                        <div class="modal-header">
                                                          <h5 class="modal-title" id="exampleModalLabel">Add to record</h5>
                                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                          </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="status" value="final">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <th>From Date</th>
                                                                    <td><input type="date" name="from_date" placeholder="Enter date" class="form-control"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>To Date</th>
                                                                    <td><input type="date" name="to_date" placeholder="Enter date" class="form-control"></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                          <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                    </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                                <button type="submit" data-toggle="modal" data-target="#recordModal_{{$v->id}}" class="btn btn-xs btn-primary">Add to record</button>
                                                @endif
                                                
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
<script src="{{asset('adminAsset/plugins/jquery/jquery.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $(document).on('click','.approved',function(){
            let status = $(this).val();
            console.log(status);
            // .ajax({
            //     url: "{{route('statusChange')}}"
            //     , type: "POST"
            //     , data: {
            //         status: status
            //         , _token: '{{csrf_token()}}'
            //     }
            //     , dataType: 'json',
            //     // success: function(res){
                    
            //     //     console.log(res);
            //     // }
                
            // });
        })
      
        $(document).on('click','.survey',function(){
            let status = $(this).val();
            
        })
        $(document).on('click','.survey_completed',function(){
            let status = $(this).val();
            
        })
        $(document).on('click','.payment',function(){
            let status = $(this).val();
            
        })
     })
</script>
@endsection
@section('jqury')

@endsection