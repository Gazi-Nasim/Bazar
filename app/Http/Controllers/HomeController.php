<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Upazilla;
use App\Models\Bazar;
use App\Models\Application;
use App\Models\Plotrecord;

use Illuminate\Support\Facades\Auth as FacadesAuth;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $upazilla = Upazilla::get();
        return view('home',compact('upazilla'));
    }
    public function userRegistration(Request $request){
        // dd($request);
        $request->validate([
            'name'=>'required',
            'phone'=>['required', 'min:11', 'unique:users'],
            'email'=>'required',
            'password'=>['required', 'min:8']
        ]);
        $data = [
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password)
        ];
        $r = User::create($data);
        Auth::login($r);
        if($r){
            return back()->with('success','আপনার নিবন্ধন সফলভাবে সম্পন্ন হয়েছে');
        }
    }
    public function records(){
        $bazar=Bazar::all();
        return view('records',compact('bazar'));
    }
    public function userLogin(Request $request){
        $credentials = $request->only('phone', 'password');
 
        if (Auth::attempt($credentials)) {
            return back()->with('success','আপনার লগইন সফলভাবে সম্পন্ন হয়েছে');
        }else{
            return back()->with('success','অনুগ্রহ করে আবার চেষ্টা করুন');
        }

       
    }
    public function findBazar(Request $request){
        $id = $request->id;
        $bazar = Bazar::where('upazilla_id',$id)->get();
        if($bazar->isEmpty()){
            return response()->json([
                'status'=>'no bazar'
            ]);
        }
        return response()->json([
            'status'=>'success',
            'bazar'=>$bazar
        ]);
    }
    public function applicantForm(){
        $upazilla = Upazilla::get();
        return view('applicantForm',compact('upazilla')); 
    }
    public function submitApplication(Request $request){
        // dd($request);
        $request->validate([
            'upazilla_id'=>'required',
            'plot_no'=>'required',
            'bazar_id'=>'required',
            'plot_area'=>'required',
            'plot_type'=>'required',
            'rights'=>'required',
            'application_type'=>'required',
            'time'=>'required',
            'north'=>'required',
            'west'=>'required',
            'south'=>'required',
            'east'=>'required',
            'name'=>'required',
            'mobile'=>'required',
            'father_or_husband'=>'required',
            'shang'=>'required',
            'post'=>'required',
            'photo'=>'required|mimes:jpeg,png,jpg',
            'nid_no'=>'required',
            'nid_photo'=>'required|mimes:jpeg,png,jpg',
            'record_papers'=>'required|mimes:pdf',
            'remarks'=>'required',
        ]);
        $data =[
            'upazilla_id'=>$request->upazilla_id,
            'bazar_id'=>$request->bazar_id,
            'plot_no'=>$request->plot_no,
            'plot_area'=>$request->plot_area,
            'plot_type'=>$request->plot_type,
            'rights'=>$request->rights,
            'application_type'=>$request->application_type,
            'time'=>$request->time,
            'north'=>$request->north,
            'south'=>$request->south,
            'west'=>$request->west,
            'east'=>$request->east,
            'name'=>$request->name,
            'mobile'=>$request->mobile,
            'father_or_husband'=>$request->father_or_husband,
            'shang'=>$request->shang,
            'post'=>$request->post,
            'photo'=>$request->photo,
            'nid_no'=>$request->nid_no,
            'remarks'=>$request->remarks,
        ];
        if($request->file('photo')){
            $photo = $request->file('photo');
            $path = 'images/applicent-photo/';
            $photoName = $request->name.'-'.date('YmdHis').'.'.$photo->getClientOriginalExtension();
            $photo->move($path,$photoName);
            $data['photo'] = $photoName;
        }
        if($request->file('nid_photo')){
            $photo = $request->file('nid_photo');
            $path = 'images/applicent-nid/';
            $photoName = $request->name.'-'.date('YmdHis').'.'.$photo->getClientOriginalExtension();
            $photo->move($path,$photoName);
            $data['nid_photo'] = $photoName;
        }
        if($request->file('record_papers')){
            $photo = $request->file('record_papers');
            $path = 'images/applicent-papers/';
            $photoName = $request->name.'-'.date('YmdHis').'.'.$photo->getClientOriginalExtension();
            $photo->move($path,$photoName);
            $data['record_papers'] = $photoName;
        }
        $r = Application::create($data);
        if($r){
            return back()->with('success','আপনার আবেদন সফলভাবে জমা দেওয়া হয়েছে');
        }
    }
}
