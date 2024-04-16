<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\User;
use Illuminate\Http\Request;
use App\Libraries\Ssl;

class PaymentController extends Controller
{
    function pay(Request $r){
         $rd=json_decode($r->cart_json,true);
         $id=$rd['id'];
        $ssl=new Ssl();
        $app=Application::find($id);
        $trans_id = random_int(100000, 999999);
        $app->update(['trans_id'=>$id.''.$trans_id]);
        return $ssl->pay($app->payment_amount,auth()->user()->name,auth()->user()->email,'Khagrachori','Shapahar',auth()->user()->phone,'',$id.''.$trans_id);
    }
    function success(Request $r){
        $app=Application::where('trans_id',$r->tran_id)->first();
        $user=User::find($app->user_id);
        auth()->login($user);
        
        $app->payment_status='paid';
        $app->update();
        $ssl=new Ssl();
        $result=$ssl->validate($r->val_id);
        if($result==true){
            
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,'https://api2.onnorokomsms.com/HttpSendSms.ashx?op=OneToOne&type=TEXT&mobile='.$user->phone.'&smsText=আপনার%20পেমেন্টটি%20সফলভাবে%20গ্রহণ%20করা%20হয়েছে।কে%20এইচ%20ডি%20সি%20বাজার%20ফান্ড&username=01922110401&password=Morshed!132465%&maskName=&campaignName=');
        $response = curl_exec($ch);
        $result = json_decode($response);
        curl_close($ch);
        $msg="Payment received successfully!";
        return redirect()->route('applicant.show',$app->id)->with('paid',$msg);
    }
    function faild (Request $r){
        $app=Application::where('trans_id',$r->tran_id)->first();
        $user=User::find($app->user_id);
        auth()->login($user);
        $msg='Payment has been faild!';
        return redirect()->route('applicant.show',$app->id)->with('fail',$msg);
    }
    function cancel(Request $r){
        $app=Application::where('trans_id',$r->tran_id)->first();
        $user=User::find($app->user_id);
        auth()->login($user);
        $msg='Payment has been canceled!';
        return redirect()->route('applicant.show',$app->id)->with('fail',$msg);
    }
    
}
