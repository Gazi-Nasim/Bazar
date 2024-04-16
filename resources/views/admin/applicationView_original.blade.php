@extends('admin.layout.layout')
@section('body')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Application Details</li>
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
                <div class="col-md-1"></div>
                <div class="col-md-10 content-template" style="font-size: 18px">
                    <div class="row">
                        <div class="col-md-4">
                            <p>বরাবর,<br>
                                বাজার ফাণ্ড প্রসাশক<br>
                                খাগড়াছড়ি পার্বত্য জেলা।<br></p>
                        </div>
                        <div class="col-md-8 text-right">
                            <img src="{{url('images/applicent-photo',$app->photo)}}" alt="{{$app->name}}" style="height: 150px;">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <p>বিষয়: খাগড়াছড়ি বাজার ফাণ্ড সংস্থার অধীনে প্লট/ জায়গা বন্দোবস্তী/ পুনঃ বন্দোবস্তীর আবেদন। <br></p>
                        <p>প্লট/ জায়গার বিবরণঃ বাজার/ এলাকার নামঃ {{$app->bazar->name}} প্লট নং {{$app->plot_no}} <br> প্লট/ জায়গার ধরণ {{$app->plot_type}} প্লট/ জায়গার পরিমাণ {{$app->plot_area}} <br>
                            চৌওহদ্দিঃ উত্তরে {{$app->north}} দক্ষিণে {{$app->south}} <br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; পূর্বে {{$app->east}} পশ্চিমে {{$app->west}} <br><br>
                            জনাব <br> বিনীত নিবেদন এই যে, আমি উল্লিখিত এলাকার স্হায়ী বাসিন্দা। খাগড়াছড়ি বাজার ফাণ্ড সংস্থার অধীনে আমি উল্লিখিত প্লট/ জায়গায় আমি {{$app->rights}} সূত্রে {{$app->time}} (সময়) পর্যন্ত নিস্কণ্টক অবস্থায় ভোগদখলে আছি। আমি উল্লিখিত প্লট/ জায়গায় আমি/ আমাদের নামে বাজার ফান্ড মোতাবেক {{$app->application_type}} পাওয়ার আবেদন করছি।<br><br>
                            অতএব, মহোদয় কৃপা বিতরণে উল্লিখিত প্লট/ জায়গা {{$app->application_type}} প্রদানে বাধিত করতে মহোদয়ের সুমর্জি হয়।<br><br>
                            বিনীত নিবেদক- <br>
                            {{$app->name}} <br>
                            মোবাইল নং - {{$app->mobile}} <br>
                            পিতা/ স্বামী - {{$app->father_or_husband}} <br>
                            সাং - {{$app->shang}} <br>
                            ডাকঘর - {{$app->post}} <br>
                            উপজেলা - {{$app->upazilla->name}} জেলাঃ খাগড়াছড়ি পার্বত্য জেলা। <br>
                            এনআইডি নং - {{$app->nid_no}} <br><br> <br><br>
                            সংযুক্তঃ <br>
                            (১) পাসপোর্ট সাইজের ছবি (স্ক্যান কপি) ২ কপি <a href="{{url('images/applicent-photo',$app->photo)}}" download="">Download</a><br>
                            (২) এনআইডি/ জন্ম নিবন্ধন সনদ (স্ক্যান কপি) ১ কপি <a href="{{url('images/applicent-nid',$app->nid_photo)}}" download="">Download</a><br>
                            (৩) প্লট/ জায়গার রেকর্ডপত্র/ ভোগদখলের প্রমাণক সমূহ ( স্ক্যান কপি)।

                            <br><br><strong>রেকর্ডপত্র সমুহঃ</strong><br>
                        <table class="table table-bordered">
                            @foreach($app->papers as $p)
                            <tr>
                                <td>{{$p->title}}</td>
                                <td><a href="{{url('images/applicent-papers',$p->file_name)}}" download="">Download</a></td>
                            </tr>
                            @endforeach
                        </table>
                        <br><br>
                        </p>
                        <strong>Survey Report:</strong>
                        {!! $app->survey_report !!}
                    </div>
                </div>
                <div class="col-md-1"> </div>
                {{-- <button class="cmd btn"  style="color: green">Generate PDF</button> --}}
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection