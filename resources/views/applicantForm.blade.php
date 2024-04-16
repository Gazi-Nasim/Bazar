@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <h4 class="text-center" style="padding-top: 15px;color: #729a02;font-weight: bold;font-size: 22px;"> খাগড়াছড়ি <a class="olivine-blink" style="color:red;font-weight: bold" href="javascript:void(0)">বাজার ফান্ড </a>
        <br><span> আবেদন ফর্ম</span>
    </h4>
</div>
<div class="col-md-12" style="margin-top: 15px;">
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <strong>{{ $message }}</strong>
    </div>
    @endif
    <form id="form_id" action="{{route('applicant.store')}}" onSubmit="return submitForm()" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-12" id="">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="lphone">উপজেলা &nbsp;<span style="color: red">*</span></label>
                    <select name="upazilla_id" id="upazilla_id" class="form-control">
                        <option value="">উপজেলা নির্বাচন করুন</option>
                        @foreach ($upazilla as $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                    @error('upazilla_id')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="plot_no">প্লট নং &nbsp;<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="lpassword" name="plot_no" value="{{old('plot_no')}}">
                    @error('plot_no')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>

            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="bazar_id">বাজার &nbsp;<span style="color: red">*</span></label>
                    <span id="ba">
                        <select name="bazar_id" id="bazar" class="form-control">
                            <option value="">বাজার নির্বাচন করুন</option>
                        </select>
                    </span>
                    @error('bazar_id')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="plot_area">জায়গার পরিমান &nbsp;<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="plot_area" name="plot_area" value="{{old('plot_area')}}">
                    @error('plot_area')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="plot_type">জায়গার ধরণ &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" name="plot_type" value="বানিজ্যিক" checked> বানিজ্যিক
                        <input type="radio" name="plot_type" value="আবাসিক"> আবাসিক
                        <input type="radio" name="plot_type" value="অন্যান্য"> অন্যান্য <br>
                        <span id="other_plot"></span>
                        <span id="other_plot_msg" style="color: red;"></span>
                        @error('plot_type')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="hidden" class="form-control" id="rights" name="rights" value="">
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="application_type">আবেদনের ধরণ &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" name="application_type" value="বন্দোবস্তী" checked> বন্দোবস্তী
                        <input type="radio" name="application_type" value="পূনঃবন্দোবস্তী(হস্তান্তর)"> পূনঃবন্দোবস্তী(হস্তান্তর)
                        <input type="radio" name="application_type" value="নামজারী/রর্কেডসংশোধন"> নামজারী/রর্কেডসংশোধন
                        <input type="radio" name="application_type" value="রের্কডপুন:সরবরাহ"> রের্কডপুন:সরবরাহ
                        <input type="radio" name="application_type" value="বিবিধ"> বিবিধ <br>
                        <span id="bibidho_type"> </span>
                        <span id="bibidho_type_msg" style="color: red;"></span>
                        @error('application_type')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <input type="hidden" class="form-control" id="time" name="time" value="">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="north">চৌহদ্দি উত্তরে &nbsp;<span style="color: red">*</span></label><br>
                    <input type="text" name="north" class="form-control" value="{{old('north')}}">
                    @error('north')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="west">চৌহদ্দি পশ্চিমে &nbsp;<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="lpassword" name="west" value="{{old('west')}}">
                    @error('west')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>

            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="south">চৌহদ্দি দক্ষিণে &nbsp;<span style="color: red">*</span></label><br>
                    <input type="text" name="south" class="form-control" value="{{old('south')}}">
                    @error('south')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="east">চৌহদ্দি পূর্বে &nbsp;<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="lpassword" name="east" value="{{old('east')}}">
                    @error('east')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>

            </div>

            <div class="col-md-6">

                <div class="form-group">
                    <label for="name">নাম &nbsp;<span style="color: red">*</span></label><br>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    @error('name')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="birth_id"> জন্ম নিবন্ধন নং &nbsp;<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="lpassword" name="birth_id" value="{{old('birth_id')}}">
                    @error('birth_id')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="mobile">মোবাইল নং &nbsp;<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{old('mobile')}}">
                    @error('mobile')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="nid_no">এনআইডি নং &nbsp;<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="lpassword" name="nid_no" value="{{old('nid_no')}}">
                    @error('nid_no')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="father_or_husband"> পিতার নামঃ &nbsp;<span style="color: red">*</span></label><br>
                    <input type="text" name="father_or_husband" class="form-control" value="{{old('father_or_husband')}}">
                    @error('father_or_husband')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="address"> ঠিকানাঃ &nbsp;<span style="color: red">*</span></label><br>
                    <input type="text" name="address" class="form-control" value="{{old('address')}}">
                    @error('address')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="spouse"> স্বামী/স্ত্রীর নামঃ &nbsp;<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="lpassword" name="spouse" value="{{old('spouse')}}">
                    @error('spouse')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>

                <!-- <div class="form-group">
                    <label for="lphone">উপজেলা &nbsp;<span style="color: red">*</span></label>
                    <select name="upazilla_id" id="upazilla_id" class="form-control">
                        <option value="">উপজেলা নির্বাচন করুন</option>
                        @foreach ($upazilla as $v)
                        <option value="{{$v->id}}">{{$v->name}}</option>
                        @endforeach
                    </select>
                    @error('upazilla_id')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div> -->
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="post">ডাকঘর &nbsp;<span style="color: red">*</span></label><br>
                    <input type="text" name="post" class="form-control" value="{{old('post')}}">
                    @error('post')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shang"> সাং * &nbsp;<span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="lpassword" name="shang" value="{{old('shang')}}">
                    @error('shang')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <span>
                <div id="handover" class="col-md-12" style="border: 1px solid red">
                    <div class="row">
                        <label for="plot_handover"> হস্তান্তরের ক্ষেত্রেঃ &nbsp;<span style="color: red">*</span></label> <br>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="h_name"> হস্তান্তরকারীর নাম ঃ &nbsp;<span style="color: red">*</span></label><br>
                                <input type="text" name="h_name" id="" class="form-control h_name" value="{{old('h_name')}}">
                                <span style="color: red" id="h_name_msg"></span>
                            </div>

                            <div class="form-group">
                                <label for="h_birth"> জন্ম নিবন্ধন নং &nbsp;<span style="color: red">*</span></label>
                                <input type="text" class="form-control h_birth" id="lpassword " name="h_birth" value="{{old('h_birth')}}">
                                <span style="color: red" id="h_birth_msg"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="h_phone">মোবাইল নং &nbsp;<span style="color: red">*</span></label>
                                <input type="text" class="form-control h_phone" id="h_phone" name="h_phone" value="{{old('h_phone')}}">
                                <span style="color: red" id="h_phone_msg"></span>
                            </div>

                            <div class="form-group">
                                <label for="h_nid">এনআইডি নং &nbsp;<span style="color: red">*</span></label>
                                <input type="text" class="form-control h_nid" id="lpassword " name="h_nid" value="{{old('h_nid')}}">
                                <span style="color: red" id="h_nid_msg"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="h_father"> পিতার নামঃ &nbsp;<span style="color: red">*</span></label><br>
                                <input type="text" name="h_father" id='h_father' class="form-control h_father" value="{{old('h_father')}}">
                                <span style="color: red" id="h_father_msg"></span>
                            </div>

                            <div class="form-group">
                                <label for="h_address"> ঠিকানাঃ &nbsp;<span style="color: red">*</span></label><br>
                                <input type="text" name="h_address" id="" class="form-control h_address" value="{{old('h_address')}}">
                                <span style="color: red" id="h_address_msg"></span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="h_spouse"> স্বামী/স্ত্রীর নামঃ &nbsp;<span style="color: red">*</span></label>
                                <input type="text" class="form-control h_spouse" id="lpassword" name="h_spouse" value="{{old('h_spouse')}}">
                                <span style="color: red" id="h_spouse_msg"></span>
                            </div>

                            <div class="form-group">
                                <label for="h_up">উপজেলা &nbsp;<span style="color: red">*</span></label>
                                <select name="h_up" id="upazilla_id " class="form-control h_up">
                                    <option value="">উপজেলা নির্বাচন করুন</option>
                                    @foreach ($upazilla as $v)
                                    <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endforeach
                                </select>
                                <span style="color: red" id="h_up_msg"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="h_post">ডাকঘর &nbsp;<span style="color: red">*</span></label><br>
                                <input type="text" name="h_post" id="" class="form-control h_post" value="{{old('h_post')}}">
                                <span style="color: red" id="h_post_msg"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="h_shang"> সাং * &nbsp;<span style="color: red">*</span></label>
                                <input type="text" class="form-control h_shang" id="lpassword " name="h_shang" value="{{old('h_shang')}}">
                                <span id="h_shang_msg" style="color: red;"></span>
                            </div>
                        </div>
                    </div>
                </div>

            </span>

            <label for="plot_type"> প্লটসম্পর্কিত তথ্যঃ &nbsp;<span style="color: red">*</span></label> <br>
            <div class="row col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="plot_bazar_woner"> (ক) প্রার্থীত জায়গা বাজারফান্ডে কিনা? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="plot_bazar_woner" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="plot_bazar_woner" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('plot_bazar_woner')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="establishment_type"> (গ) প্রার্থীত জায়গায় কি ধরনের স্থাপনা রয়েছে ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="text" name="establishment_type" id="establishment_type" class="form-control" value="{{old('establishment_type')}}">
                        @error('establishment_type')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="plot_establishment"> (খ) প্রার্থীত জায়গায় কোন স্থাপনা আছে কিনা? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="plot_establishment" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="plot_establishment" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('plot_establishment')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="establishment_permission"> (ঘ) তৈরিকৃত স্থাপনা নির্মানের অনুমতি আছে কিনা ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="establishment_permission" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="establishment_permission" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('establishment_permission')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="plot_case"> (ঙ) প্রার্থীত জায়গার বিষয়ে কোন মামলা আছে কিনা ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="plot_case" name="plot_case" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="plot_case" name="plot_case" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('plot_case')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="plot_conflict"> (ছ) প্লট/জায়গা নিয়ে কোন বিরোধ আছে কিনা ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="plot_conflict" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="plot_conflict" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('plot_conflict')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="case_prohibition"> (চ) মামলা থাকলে আদালতের কোন নিষেধাজ্ঞা আছে কিনা ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="case_prohibition" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="case_prohibition" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('case_prohibition')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="main_deed"> (জ) মুল দলিল/কবুলিয়ত আছে কিনা ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="main_deed" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="main_deed" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('main_deed')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="contract_year"> (ঝ) প্লট/জায়গা বন্দোবস্তী প্রাপ্ত সন কত ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="text" id="contract_year" name="contract_year" class="form-control" value="{{old('contract_year')}}">
                        @error('contract_year')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tax_up_to_date"> (ট) প্লট/জায়গার হালনাগাদ রাজস্ব/খাজনা/কর হালনাগাদ আছে কিনা ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="tax_up_to_date" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="tax_up_to_date" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('tax_up_to_date')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="plot_mortgate"> (ঞ) প্লট/জায়গা কোন ব্যাংক/অর্থলগিè প্রতিষ্ঠানে বন্ধক আছে কিনা ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="plot_mortgate" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="plot_mortgate" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('plot_mortgate')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="condition_maintained"> (ঠ) বরাদ্দকৃত প্লট/জায়গার কবুলিয়ত/পাট্টার শর্তাদি পালন করা হয়েছে কিনা ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="condition_maintained" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="condition_maintained" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('condition_maintained')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="late_person_heir"> (ড) প্লট/জায়গা বরাদ্দপ্রাপ্ত ব্যক্তি মৃত হলে, বৈধ ওয়ারিশনের সনদপত্র আছে কিনা ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="late_person_heir" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="late_person_heir" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('late_person_heir')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address_as_nid"> (ঢ) এনআইডি অনুযায়ী প্লট/জায়গা ব্যক্তির নাম-ঠিকানা সঠিক রয়েছে কিনা ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="address_as_nid" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="address_as_nid" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('address_as_nid')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="handover_evidence"> (ণ) হস্তান্তরের প্রমানক সংযুক্ত করা হয়েছে কিনা ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="radio" id="" name="handover_evidence" value="হ্যাঁ" checked>
                        <label for="বানিজ্যিক"> হ্যাঁ </label>
                        <input type="radio" id="" name="handover_evidence" value="না">
                        <label for="বানিজ্যিক"> না </label>
                        @error('handover_evidence')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="previous_owner"> (ত) বরাদ্দ প্রাপ্তির পূর্বে প্লট/জায়গা কে ছিলেন ? &nbsp;<span style="color: red">*</span></label> <br>
                        <input type="text" id="previous_owner" name="previous_owner" class="form-control" value="{{old('previous_owner')}}">
                        @error('previous_owner')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row col-md-12" style="border: 1px solid black; margin-bottom: 10px">
                <label for="plot_type"> সংযুক্তি (বন্দোবস্তী/নামজারী/রেকর্ড সংশোধন/রেকর্ড পুনঃসরবরাহ ক্ষেত্রে) ঃ &nbsp;<span style="color: red">*</span></label> <br>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo"> আবেদনকারীর ছবি &nbsp;<span style="color: red">*</span></label>
                        <input type="hidden" name="type[]" value="general">
                        <input type="hidden" name="title[]" value="আবেদনকারীর ছবি ">
                        <input type="file" class="form-control" id="lpassword" name="file[]" value="{{old('file')}}">
                        @error('file')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo"> আবেদনকারীর জন্ম নিবন্ধন সনদ কপি &nbsp;<span style="color: red">*</span></label>
                        <input type="hidden" name="type[]" value="general">
                        <input type="hidden" name="title[]" value="আবেদনকারীর জন্ম নিবন্ধন সনদ কপি">
                        <input type="file" class="form-control" id="lpassword" name="file[]" value="{{old('file')}}">
                        @error('file')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>

                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo">আবেদনকারীর এনআইডি কপি &nbsp;<span style="color: red">*</span></label>
                        <input type="hidden" name="type[]" value="general">
                        <input type="hidden" name="title[]" value="আবেদনকারীর এনআইডি কপি">
                        <input type="file" class="form-control" id="lpassword" name="file[]" value="{{old('file')}}">
                        @error('file')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo"> কবুলিয়ত/পাট্টার কপি &nbsp;<span style="color: red">*</span></label>
                        <input type="hidden" name="type[]" value="general">
                        <input type="hidden" name="title[]" value="কবুলিয়ত/পাট্টার কপি">
                        <input type="file" class="form-control" id="lpassword" name="file[]" value="{{old('file')}}">
                        @error('file')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <!--<div class="row col-md-12">-->
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo"> খালসন খাজনা পরিশোধের কপি &nbsp;<span style="color: red">*</span></label>
                        <input type="hidden" name="type[]" value="general">
                        <input type="hidden" name="title[]" value="খালসন খাজনা পরিশোধের কপি  ">
                        <input type="file" class="form-control" id="lpassword" name="file[]" value="{{old('file')}}">
                        @error('file')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo"> বাজার চৌধুরীর প্রতিবেদন/সুপারিশ &nbsp;<span style="color: red">*</span></label>
                        <input type="hidden" name="type[]" value="general">
                        <input type="hidden" name="title[]" value="বাজার চৌধুরীর প্রতিবেদন/সুপারিশ">
                        <input type="file" class="form-control" id="lpassword" name="file[]" value="{{old('file')}}">
                        @error('file')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-12">
                    <!--<div class="form-group">-->
                    <label for="record_papers"> অন্যান্ &nbsp;
                        <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="add_more()">+</a></label>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>পেপারের নাম</th>
                                <th>ফাইল</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="records">
                            <tr id="tr_1">
                                <td>
                                    <input type="hidden" name="type[]" value="general">
                                    <input type="text" name="title[]" class="form-control">
                                </td>
                                <td><input type="file" name="file[]" class="form-control"></td>
                                <td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove(1)">-</a></td>
                            </tr>
                        </tbody>
                    </table>
                    <!--<input type="file" class="form-control" id="record_papers" name="record_papers" value="{{old('record_papers')}}">-->
                    @error('record_papers')
                    <span style="color: red">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="row col-md-12" style="border: 1px solid red" id="handover_papers">
                <label for="plot_type"> সংযুক্তি (পুনঃ বন্দোবস্তী/হস্তান্তর ক্ষেত্রে) ঃ &nbsp;<span style="color: red">*</span></label> <br>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo"> হস্তান্তরকারীর ছবি &nbsp;<span style="color: red">*</span></label>
                        <input type="hidden" name="type[]" value="handover">
                        <input type="hidden" name="title[]" value="হস্তান্তরকারীর ছবি">
                        <input type="file" class="form-control h_photo" id="lpassword" name="file[]" value="{{old('file')}}">
                        <span id="h_photo_msg" style="color: red"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo"> হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি &nbsp;<span style="color: red">*</span></label>
                        <input type="hidden" name="type[]" value="handover">
                        <input type="hidden" name="title[]" value="হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি">
                        <input type="file" class="form-control h_birthFile" id="lpassword" name="file[]" value="{{old('file')}}">
                        <span id="h_birthFile_msg" style="color: red"></span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="photo"> হস্তান্তরকারীর এনআইডি কপি &nbsp;<span style="color: red">*</span></label>
                        <input type="hidden" name="type[]" value="handover">
                        <input type="hidden" name="title[]" value="হস্তান্তরকারীর এনআইডি কপি">
                        <input type="file" class="form-control h_nidFile" id="lpassword" name="file[]" value="{{old('file')}}">
                        <span id="h_nidFile_msg" style="color: red"></span>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="record_papers"> অন্যান্ &nbsp;
                            <a href="javascript:void(0)" class="btn btn-sm btn-primary" onclick="add_more_1()">+</a></label>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>পেপারের নাম</th>
                                    <th>ফাইল</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="records_1">
                                <tr id="tr_1">
                                    <td>
                                        <input type="hidden" name="type[]" value="handover">
                                        <input type="text" name="title[]" class="form-control">
                                    </td>
                                    <td><input type="file" name="file[]" class="form-control"></td>
                                    <td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove(1)">-</a></td>
                                </tr>
                            </tbody>
                        </table>
                        <!--<input type="file" class="form-control" id="record_papers" name="record_papers" value="{{old('record_papers')}}">-->
                        @error('record_papers')
                        <span style="color: red">{{$message}}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            <div class="col-md-12">
                {{-- <div class="form-group">
                    <label for="remarks">মন্তব্য &nbsp;<span style="color: red">*</span></label>
                    <textarea name="remarks" id="" cols="10" rows="3" class="form-control">{{old('remarks')}}</textarea>

                @error('remarks')
                <span style="color: red">{{$message}}</span>
                @enderror
            </div> --}}

            <button type="submit" id="submitButton" fromPart='' class="btn btnBKKB">জমা দিন</button>


        </div>


    </form>
</div>
{{-- application modal --}}
<div class="modal fade" id="application" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title regModalHeading">আবেদন ফর্ম</h3>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="loginErrorMessage hide" style="font-weight: 600;background-color:#f2dede;border-color:#ebccd1;color:#a94442;margin-bottom: 10px">
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('jqury')
<script>
    let i = 1;

    function add_more() {
        i += 1
        let ht = `<tr id="tr_${i}">
                <td><input type="hidden" name="type[]" value="general"><input type="text" name="title[]" class="form-control"></td>
                <td><input type="file" name="file[]" class="form-control"></td>
                <td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove(${i})">-</a></td>
            </tr>`
        $('#records').append(ht)
    }

    function add_more_1() {
        i += 1
        let ht = `<tr id="tr_${i}">
                <td><input type="hidden" name="type[]" value="handover"><input type="text" name="title[]" class="form-control"></td>
                <td><input type="file" name="file[]" class="form-control"></td>
                <td><a href="javascript:void(0)" class="btn btn-sm btn-danger" onclick="remove(${i})">-</a></td>
            </tr>`
        $('#records_1').append(ht)
    }

    function remove(id) {
        $('#tr_' + id).remove()
    }
    $(document).ready(function() {
        $('#upazilla_id').on('change', function() {
            let id = $(this).val();
            // console.log(id);
            $.ajax({
                url: "{{route('findBazar')}}",
                type: "POST",
                data: {
                    id: id,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function(res) {
                    let status = res.status
                    if (status == 'success') {
                        let bazar = res.bazar
                        let op = '<select name="bazar_id" id="bazar" class="form-control">'
                        op += '<option value=""> বাজার নির্বাচন করুন </option>'
                        bazar.map((v, i) => {
                            op += `<option value="${v.id}">${v.name}</option>`
                        })
                        op += '</select>'
                        $('#ba').html(op)

                    } else {
                        let op = '<select name="bazar_id" id="bazar" class="form-control">'
                        op += '<option value=""> বাজার পাওয়া যাইনি </option>'
                        op += '</select>'
                        $('#ba').html(op)
                    }
                }

            });
        })
    })
</script>

<script>
    $(document).ready(function() {
        $('#other_plot').hide()
        $('#application_type').hide()
        $('#handover').hide();
        $('#handover_papers').hide()

        $('input[name="plot_type"]').change(function() {
            const submitButton = document.getElementById('submitButton');
            let appliType = $('input[name="application_type"]:checked').val();
            let plotType = $('input[name="plot_type"]:checked').val();

            if ($(this).val() == 'অন্যান্য') {
                let inp = '<input type="text" id="onnoInput" name="plot_type" class="form-control" required>';
                $('#other_plot').html(inp);
                $('#other_plot').show()

                if (appliType == 'বিবিধ') {
                    submitButton.setAttribute('fromPart', 'BibidhoAndOnnanno');
                } else if (appliType == 'পূনঃবন্দোবস্তী(হস্তান্তর)') {
                    submitButton.setAttribute('fromPart', 'OnnannoAndPuno');
                } else {
                    submitButton.setAttribute('fromPart', 'forOnnanno');
                }

            } else {
                $('#other_plot_msg').html('');
                if (appliType == 'বিবিধ') {
                    submitButton.setAttribute('fromPart', 'forBibidho');
                } else if (appliType == 'পূনঃবন্দোবস্তী(হস্তান্তর)') {
                    submitButton.setAttribute('fromPart', 'Puno');
                } else {
                    submitButton.setAttribute('fromPart', '');
                }
                $('#other_plot').html('')
            }
        });

        $('input[name="application_type"]').change(function() {
            let plotType = $('input[name="plot_type"]:checked').val();
            let appliType = $('input[name="application_type"]:checked').val();
            const form_id = document.getElementById('form_id');
            const submitButton = document.getElementById('submitButton');

            if ($(this).val() == 'বিবিধ') {
                // $('#application_type').show()
                let inpu = '<input type="text" name="application_type" class="form-control" id="bibidhoInp" >';
                $('#bibidho_type').html(inpu)
                if (plotType == 'অন্যান্য') {
                    submitButton.setAttribute('fromPart', 'BibidhoAndOnnanno');
                } else {
                    submitButton.setAttribute('fromPart', 'forBibidho');
                }
            } else {
                $('#bibidho_type_msg').html('')
                $('#bibidho_type').html('')
                if (plotType == 'অন্যান্য') {
                    submitButton.setAttribute('fromPart', 'forOnnanno');
                } else {
                    submitButton.setAttribute('fromPart', '');
                }
            }

            if ($(this).val() == 'পূনঃবন্দোবস্তী(হস্তান্তর)') {

                if (plotType == 'অন্যান্য') {
                    submitButton.setAttribute('fromPart', 'OnnannoAndPuno');
                } else {
                    submitButton.setAttribute('fromPart', 'Puno');
                }
                $('#handover').show()
                $('#handover_papers').show()
            } else {
                $('#handover').hide()
                $('#handover_papers').hide()
            }
        });

    });

    function submitForm() {
        let fromPart = $('#submitButton').attr('fromPart')
        if (fromPart == 'BibidhoAndOnnanno') {
            let onnoInput = $('#onnoInput').val();
            let bibidhoInp = $('#bibidhoInp').val();
            if (onnoInput == '' || bibidhoInp == '') {
                if (onnoInput == '') {
                    $('#other_plot_msg').html('অন্যান্য খালি ঘর আবশ্যই পূর্ণ করতে হবে');
                } else {
                    $('#other_plot_msg').html('');
                }
                if (bibidhoInp == '') {
                    $('#bibidho_type_msg').html('বিবিধ খালি ঘর আবশ্যই পূর্ণ করতে হবে');
                } else {
                    $('#bibidho_type_msg').html('');
                }
                $('#submitButton').removeAttr('disabled')
                return false;

            } else {
                return true;
            }

        } else if (fromPart == 'OnnannoAndPuno') {
            let onnoInput = $('#onnoInput').val();
            let h_name = $('.h_name').val();
            let h_birth = $('.h_birth').val();
            let h_phone = $('.h_phone').val();
            let h_nid = $('.h_nid').val();
            let h_father = $('.h_father').val();
            let h_address = $('.h_address').val();
            let h_spouse = $('.h_spouse').val();
            let h_up = $('.h_up').val();
            let h_post = $('.h_post').val();
            let h_shang = $('.h_shang').val();
            let h_photo = $('.h_photo').val();
            let h_birthFile = $('.h_birthFile').val();
            let h_nidFile = $('.h_nidFile').val();

            if (h_name == "" || h_birth == "" || h_phone == "" || h_nid == "" || h_father == "" || h_address == "" || h_spouse == " " || h_up == "" || h_post == "" || h_shang == "" || h_photo == '' || h_birthFile == " " || h_nidFile == " " || onnoInput == '') {

                if (onnoInput == '') {
                    $('#other_plot_msg').html('অন্যান্য খালি ঘর আবশ্যই পূর্ণ করতে হবে');
                } else {
                    $('#other_plot_msg').html('');
                }

                if (h_name == '') {
                    $('#h_name_msg').html('হস্তান্তরকারীর নাম  আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_name_msg').html('');
                }

                if (h_birth == '') {
                    $('#h_birth_msg').html('জন্ম নিবন্ধন নং আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_birth_msg').html('');
                }

                if (h_phone == '') {
                    $('#h_phone_msg').html('মোবাইল নং আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_phone_msg').html('');
                }

                if (h_nid == '') {
                    $('#h_nid_msg').html('এনআইডি নং আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_nid_msg').html('');
                }

                if (h_father == '') {
                    $('#h_father_msg').html('পিতার নাম আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_father_msg').html('');
                }

                if (h_address == '') {
                    $('#h_address_msg').html('ঠিকানা আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_address_msg').html('');
                }

                if (h_spouse == '') {
                    $('#h_spouse_msg').html('স্বামী/স্ত্রীর নাম আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_spouse_msg').html('');
                }

                if (h_up == '') {
                    $('#h_up_msg').html('উপজেলা আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_up_msg').html('');
                }

                if (h_post == '') {
                    $('#h_post_msg').html('ডাকঘর আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_post_msg').html('');
                }

                if (h_shang == '') {
                    $('#h_shang_msg').html('সাং আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_shang_msg').html('');
                }

                if (h_photo == '') {
                    $('#h_photo_msg').html('হস্তান্তরকারীর ছবি আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_photo_msg').html('');
                }

                if (h_birthFile == '') {
                    $('#h_birthFile_msg').html('হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_birthFile_msg').html('');
                }

                if (h_nidFile == '') {
                    $('#h_nidFile_msg').html('হস্তান্তরকারীর এনআইডি কপি আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_nidFile_msg').html('');
                }
                // alert("হস্তান্তরের ক্ষেত্রে সব ফাকা ঘর আবশ্যই পূর্ণ করতে হবে");
                $('#submitButton').removeAttr('disabled')
                return false;
            } else {
                // action = "{{route('applicant.store')}}"
                return true;
            }

        } else if (fromPart == 'forOnnanno') {
            let onnoInput = $('#onnoInput').val();
            if (onnoInput == '') {
                $('#other_plot_msg').html('অন্যান্য খালি ঘর আবশ্যই পূর্ণ করতে হবে');
                $('#submitButton').removeAttr('disabled')
                return false;
            } else {
                return true;
            }
        } else if (fromPart == 'forBibidho') {
            let bibidhoInp = $('#bibidhoInp').val();
            if (bibidhoInp == '') {
                $('#bibidho_type_msg').html('বিবিধ খালি ঘর আবশ্যই পূর্ণ করতে হবে');
                $('#submitButton').removeAttr('disabled')
                return false;
            } else {
                $('#bibidho_type_msg').html('');
                return true;
            }
        } else if (fromPart == 'Puno') {
            let h_name = $('.h_name').val();
            let h_birth = $('.h_birth').val();
            let h_phone = $('.h_phone').val();
            let h_nid = $('.h_nid').val();
            let h_father = $('.h_father').val();
            let h_address = $('.h_address').val();
            let h_spouse = $('.h_spouse').val();
            let h_up = $('.h_up').val();
            let h_post = $('.h_post').val();
            let h_shang = $('.h_shang').val();
            let h_photo = $('.h_photo').val();
            let h_birthFile = $('.h_birthFile').val();
            let h_nidFile = $('.h_nidFile').val();

            if (h_name == "" || h_birth == "" || h_phone == "" || h_nid == "" || h_father == "" || h_address == "" || h_spouse == " " || h_up == "" || h_post == "" || h_shang == "" || h_photo == '' || h_birthFile == " " || h_nidFile == " ") {

                if (h_name == '') {
                    $('#h_name_msg').html('হস্তান্তরকারীর নাম  আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_name_msg').html();
                }
                if (h_birth == '') {
                    $('#h_birth_msg').html('জন্ম নিবন্ধন নং আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_birth_msg').html();
                }
                if (h_phone == '') {
                    $('#h_phone_msg').html('মোবাইল নং আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_phone_msg').html();
                }
                if (h_nid == '') {
                    $('#h_nid_msg').html('এনআইডি নং আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_nid_msg').html();
                }
                if (h_father == '') {
                    $('#h_father_msg').html('পিতার নাম আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_father_msg').html();
                }
                if (h_address == '') {
                    $('#h_address_msg').html('ঠিকানা আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_address_msg').html();
                }
                if (h_spouse == '') {
                    $('#h_spouse_msg').html('স্বামী/স্ত্রীর নাম আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_spouse_msg').html();
                }
                if (h_up == '') {
                    $('#h_up_msg').html('উপজেলা আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_up_msg').html();
                }
                if (h_post == '') {
                    $('#h_post_msg').html('ডাকঘর আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_post_msg').html();
                }
                if (h_shang == '') {
                    $('#h_shang_msg').html('সাং আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_shang_msg').html();
                }

                if (h_photo == '') {
                    $('#h_photo_msg').html('হস্তান্তরকারীর ছবি আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_photo_msg').html();
                }
                if (h_birthFile == '') {
                    $('#h_birthFile_msg').html('হস্তান্তরকারীর জন্ম নিবন্ধন সনদ কপি আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_birthFile_msg').html();
                }
                if (h_nidFile == '') {
                    $('#h_nidFile_msg').html('হস্তান্তরকারীর এনআইডি কপি আবশ্যই পূর্ণ করতে হবে');

                } else {
                    $('#h_nidFile_msg').html();
                }
                // alert("হস্তান্তরের ক্ষেত্রে সব ফাকা ঘর আবশ্যই পূর্ণ করতে হবে");
                $('#submitButton').removeAttr('disabled')
                return false;
            } else {
                // action = "{{route('applicant.store')}}"
                return true;
            }
        }
    }
</script>
@endsection