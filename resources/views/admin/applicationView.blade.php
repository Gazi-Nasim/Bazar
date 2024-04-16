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
                        <li class="breadcrumb-item"><a href="#">Home</a></li>/
                        <button class="btn btn-primary" type="button" onclick="printJS('printJS-form', 'html')">
                            Print Form
                        </button>
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
                <form method="post" action="#" id="printJS-form">
                    <span id="applicationPrint" id="wrapper">
                        <div class="col-md-12">
                            <div class="card-header">
                                <h3 style="text-align: center; color: #6c757d ; " class="">খাগড়াছড়ি বাজার ফাণ্ড সংস্থা</h3>
                                <h4 style="text-align: center; color: #6c757d ; ">আবেদন ফর্ম</h4>
                            </div>
                        </div>
                        <div class="col-md-10 content-template" style="font-size: 18px;  ">
                            <div class="row" style="width: 100%; overflow:auto">
                                <div style="width: 50%; float:left;">
                                    <p>খাগড়াছড়ি ‍সদর <br>
                                        প্লট নং {{$app->plot_no}}<br>
                                        প্লট/ জায়গার পরিমাণঃ {{$app->plot_area}} <br>
                                    </p>
                                </div>
                                <div style="width: 50%; float: right;">
                                    <p style="float: right;">চৌহদ্দিঃ উত্তরে- {{$app->north}} দক্ষিণে- {{$app->south}} <br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; পূর্বে- {{$app->east}} পশ্চিমে- {{$app->west}}</p>
                                    <p style="float: right;">বাজার/ এলাকার নামঃ {{$app->bazar->name}} </p>
                                </div>
                                <div style="width: 50%; float: left;">
                                    <p>প্লট/ জায়গার ধরণঃ {{$app->plot_type}} <br>
                                        আবেদনের ধরণঃ {{$app->application_type}}
                                    </p>
                                </div>
                                <div style="width: 50%; float: left;">
                                    <img src="{{url('images/applicent-photo',$app->photo)}}" alt="{{$app->name}}" style="height: 150px; float: right;">
                                    <!-- <span>আবেদন কারীর ছবি</span> -->
                                </div>
                            </div>
                            <div class="col-md-12" style="width: 100%; overflow:auto ">
                                <p>প্লট/ জায়গার বিবরণঃ</p>
                                <div style="width: 50%; float:left; " class="col-md-6">
                                    <p>
                                        (ক) প্রার্থীত জায়গা বাজারফান্ডে কিনা?<br>
                                        {{$app->plot_bazar_woner}}<br>
                                        (গ) প্রার্থীত জায়গায় কি ধরনের স্থাপনা রয়েছে ?<br>
                                        {{$app->plot_establishment}}<br>
                                        (ঙ) প্রার্থীত জায়গার বিষয়ে কোন মামলা আছে কিনা ? <br>
                                        {{$app->plot_case}}<br>
                                        (ছ) প্লট/জায়গা নিয়ে কোন বিরোধ আছে কিনা ? <br>
                                        {{$app->plot_conflict}}<br>
                                        (ঝ) প্লট/জায়গা বন্দোবস্তী প্রাপ্ত সন কত ?<br>
                                        {{$app->contract_year}}<br>
                                        (ট) প্লট/জায়গার হালনাগাদ রাজস্ব/খাজনা/কর হালনাগাদ আছে কিনা ?<br>
                                        {{$app->tax_up_to_date}}<br>
                                        (ড) প্লট/জায়গা বরাদ্দপ্রাপ্ত ব্যক্তি মৃত হলে, বৈধ ওয়ারিশনের সনদপত্র আছে কিনা ?<br>
                                        {{$app->late_person_heir}}<br>
                                        (ণ) হস্তান্তরের প্রমানক সংযুক্ত করা হয়েছে কিনা ?<br>
                                        {{$app->handover_evidence}}<br>
                                    </p>
                                </div>
                                <div style="width: 50%; float:left;" class="col-md-6">
                                    <p>
                                        (খ) প্রার্থীত জায়গায় কোন স্থাপনা আছে কিনা?<br>
                                        {{$app->plot_bazar_woner}}<br>
                                        (ঘ) তৈরিকৃত স্থাপনা নির্মানের অনুমতি আছে কিনা?<br>
                                        {{$app->establishment_permission}}<br>
                                        (চ) মামলা থাকলে আদালতের কোন নিষেধাজ্ঞা আছে কিনা ? <br>
                                        {{$app->case_prohibition}}<br>
                                        (জ) মুল দলিল/কবুলিয়ত আছে কিনা ?<br>
                                        {{$app->main_deed}}<br>
                                        (ঞ) প্লট/জায়গা কোন ব্যাংক/অর্থলগিè প্রতিষ্ঠানে বন্ধক আছে কিনা ?<br>
                                        {{$app->plot_mortgate}}<br>
                                        (ঠ) বরাদ্দকৃত প্লট/জায়গার কবুলিয়ত/পাট্টার শর্তাদি পালন করা হয়েছে কিনা ?<br>
                                        {{$app->condition_maintained}}<br>
                                        (ঢ) এনআইডি অনুযায়ী প্লট/জায়গা ব্যক্তির নাম-ঠিকানা সঠিক রয়েছে কিনা ?<br>
                                        {{$app->address_as_nid}}<br>
                                        (ত) বরাদ্দ প্রাপ্তির পূর্বে প্লট/জায়গা কে ছিলেন ?<br>
                                        {{$app->previous_owner}}<br>
                                    </p>
                                </div>
                                <div style="width: 100%; overflow:auto;">
                                    <p>নিবেদকের বিবরণঃ</p>
                                    <div style="width: 50%; float:left; " class="col-md-6">
                                        <p>
                                            বিনীত নিবেদক- {{$app->name}} <br>
                                            জন্ম নিবন্ধন নং- {{$app->father_or_husband}} <br>
                                            পিতা/ স্বামী - {{$app->father_or_husband}} <br>
                                            ডাকঘর - {{$app->post}} <br>
                                            উপজেলা - {{$app->upazilla->name}} <br>
                                        </p>
                                    </div>
                                    <div style="width: 50%; float:left; " class="col-md-6">
                                        <p>
                                            মোবাইল নং - {{$app->mobile}} <br>
                                            এনআইডি নং - {{$app->nid_no}} <br>
                                            পিতা - {{$app->h_father}} <br>
                                            সাং - {{$app->shang}} <br>
                                            জেলাঃ খাগড়াছড়ি পার্বত্য জেলা। <br>
                                        </p>
                                    </div>
                                </div>
                                <div style="width: 100%; overflow:auto; ">
                                    <p>হস্তান্তরকারীর বিবরণঃ</p>
                                    <div style="width: 50%; float:left; " class="col-md-6">
                                        <p>
                                            হস্তান্তরকারীর নাম- {{$app->h_name}} <br>
                                            জন্ম নিবন্ধন নং- {{$app->h_birth}} <br>
                                            স্বামী/স্ত্রীর নামঃ - {{$app->h_spouse}} <br>
                                            ডাকঘর - {{$app->h_post}} <br>
                                            উপজেলা - {{$app->h_up}} <br>
                                        </p>
                                    </div>
                                    <div style="width: 50%; float:left; " class="col-md-6">
                                        <p>
                                            মোবাইল নং - {{$app->h_phone}} <br>
                                            এনআইডি নং - {{$app->h_nid}} <br>
                                            সাং - {{$app->shang}} <br>
                                            জেলাঃ খাগড়াছড়ি পার্বত্য জেলা।
                                        </p><br><br><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span>
                </form>
                <div class="col-md-10 content-template" style="font-size: 18px">
                    <div class="col-md-12">
                        <div class="col-12" style="width: 100%; float:left; ">
                            সংযুক্তঃ <br>
                            (১) পাসপোর্ট সাইজের ছবি (স্ক্যান কপি) ২ কপি <a href="{{url('images/applicent-photo',$app->photo)}}" download="" class="btn btn-primary">Download</a><br>
                            (২) এনআইডি/ জন্ম নিবন্ধন সনদ (স্ক্যান কপি) ১ কপি <a href="{{url('images/applicent-nid',$app->nid_photo)}}" download="" class="btn btn-primary">Download</a><br>
                            (৩) প্লট/ জায়গার রেকর্ডপত্র/ ভোগদখলের প্রমাণক সমূহ ( স্ক্যান কপি)।

                            <br><br><strong>রেকর্ডপত্র সমুহঃ</strong><br>
                        </div>

                        <table class="table table-bordered">
                            @foreach($app->papers as $p)
                            <tr>
                                <td>{{$p->title}}</td>
                                <td><a href="{{url('images/applicent-papers',$p->file_name)}}" download="" class="btn btn-primary">Download</a></td>
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
@push('footer_script')
<!-- <script src="{{asset('front_asset/Print.js-1.6.0/src/js/print.js')}}"></script> -->
<script src="https://printjs-4de6.kxcdn.com/print.min.js"></script>
@endpush
@endsection