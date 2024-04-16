@extends('layouts.app')
@section('content')

<div class="col-md-12">
    <h4 class="text-center" style="padding-top: 15px;color: #729a02;font-weight: bold;font-size: 22px;"> খাগড়াছড়ি <a
            class="olivine-blink" style="color:red;font-weight: bold" href="javascript:void(0)">বাজার ফান্ড </a>
        <br><span> {{Auth::user()->name}}</span>
    </h4>
</div>
<div class="col-md-12" style="margin-top: 15px;">
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 content-template" style="font-size: 18px" >
                <div class="col-md-4">
                    <p >বরাবর,<br>
                        বাজার ফাণ্ড প্রসাশক<br>
                        খাগড়াছড়ি পার্বত্য জেলা।<br></p>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div style="height: 150px; width: 162px; margin-top: -21px; position: sticky; ">
                        <img src="{{url('images/applicent-photo',$app->photo)}}" alt="{{$app->name}}" style="height: 150px;">
                    </div>
                </div>
                <div class="col-md-12">
                    <p>বিষয়: খাগড়াছড়ি বাজার ফাণ্ড সংস্থার অধীনে প্লট/ জায়গা বন্দোবস্তী/ পুনঃ বন্দোবস্তীর আবেদন। <br></p>
                    <p>প্লট/ জায়গার বিবরণঃ বাজার/ এলাকার নামঃ {{$app->bazar->name}} প্লট নং {{$app->plot_no}} <br> প্লট/ জায়গার ধরণ  {{$app->plot_type}} প্লট/ জায়গার পরিমাণ {{$app->plot_area}} <br>
                        চৌওহদ্দিঃ  উত্তরে  {{$app->north}} দক্ষিণে {{$app->south}} <br>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  পূর্বে {{$app->east}} পশ্চিমে {{$app->west}} <br><br>
                        জনাব <br> বিনীত নিবেদন এই যে, আমি উল্লিখিত এলাকার স্হায়ী বাসিন্দা।  খাগড়াছড়ি বাজার ফাণ্ড সংস্থার অধীনে আমি উল্লিখিত প্লট/ জায়গায় আমি {{$app->rights}} সূত্রে {{$app->time}} (সময়) পর্যন্ত নিস্কণ্টক অবস্থায় ভোগদখলে আছি। আমি উল্লিখিত প্লট/ জায়গায় আমি/ আমাদের নামে বাজার ফান্ড মোতাবেক {{$app->application_type}} পাওয়ার আবেদন করছি।<br><br>
                        অতএব,  মহোদয় কৃপা বিতরণে উল্লিখিত প্লট/ জায়গা {{$app->application_type}} প্রদানে বাধিত করতে মহোদয়ের সুমর্জি হয়।<br><br>
                        বিনীত নিবেদক- <br>
                        {{$app->name}} <br>
                        মোবাইল নং - {{$app->mobile}} <br>
                        পিতা/ স্বামী - {{$app->father_or_husband}} <br>
                        সাং - {{$app->shang}} <br>
                        ডাকঘর - {{$app->post}} <br>
                        উপজেলা - {{$app->upazilla->name}} জেলাঃ খাগড়াছড়ি পার্বত্য জেলা। <br>
                        এনআইডি নং - {{$app->nid_no}} <br><br> <br><br>
                        সংযুক্তঃ <br>
                       (১) পাসপোর্ট সাইজের ছবি (স্ক্যান কপি) ২ কপি<br>
                       (২) এনআইডি/ জন্ম নিবন্ধন সনদ (স্ক্যান কপি) ১ কপি<br>
                       (৩) প্লট/ জায়গার রেকর্ডপত্র/ ভোগদখলের প্রমাণক সমূহ ( স্ক্যান কপি)।<br><br>                    
                    </p>
                </div>                   
            </div>
            
            <div class="col-md-2">  </div>
            @if($app->status=='payment' && $app->payment_status=='pending')
            <button class="your-button-class" id="sslczPayBtn"
            		 token="if you have any token validation"
            		 postdata=""
            		 order="If you already have the transaction generated for current order"
            		 endpoint="{{route('pay')}}"> Pay Now
            </button>
            @endif
            {{-- <button class="cmd btn"  style="color: green">Generate PDF</button> --}}
        </div>
    </div>
  
    
</div>


@endsection
@section('jqury')
    <script>
        $(document).ready(function(){
            $('.cmd').click(function () {
            var pdf = new jsPDF();
            var specialElementHandlers = {
                '#editor': function (element, renderer) {
                    return true;
                }
            };
            // var $addr = $(this).closest('.res').find('.content');
            var $temp = $('.content-template');
            // $temp.find('p').text($addr.find('p').text());
            pdf.fromHTML($temp.html(), 15, 15, {
                    'width': 170,
                    'elementHandlers':specialElementHandlers
                    }
            );
            pdf.save('sample-file.pdf');
            });
            
            var obj = {};
            obj.id = {{$app->id}};
        
            $('#sslczPayBtn').prop('postdata', obj);
        })
    </script>
@endsection
