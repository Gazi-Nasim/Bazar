<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use App\Models\Upazilla;
use App\Models\Bazar;
use App\Models\Application;
use App\Models\Paper;
use App\Models\Plotrecord;
use PDF;

class ApplicantController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $app = Application::where('user_id', Auth::user()->id)->get();
        return view('applicantProfile', compact('app'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $upazilla = Upazilla::get();
        return view('applicantForm', compact('upazilla'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'upazilla_id' => 'required',
            'plot_no' => 'required',
            'bazar_id' => 'required',
            'plot_area' => 'required',
            'plot_type' => 'required',
            'application_type' => 'required',
            'north' => 'required',
            'west' => 'required',
            'south' => 'required',
            'east' => 'required',
            'name' => 'required',
            'mobile' => 'required',
            'father_or_husband' => 'required',
            'shang' => 'required',
            'post' => 'required',
            'file' => 'required',
            'nid_no' => 'required',
            // 'photo'=>'required',            
            // 'nid_photo'=>'required',
            // 'photo'=>'required|mimes:jpeg,png,jpg',
            // 'record_papers'=>'required|mimes:pdf',
            // 'remarks'=>'required',
        ], [
            'upazilla_id.required' => 'উপজেলার নাম  আবশ্যই পূর্ণ করতে হবে',
            'plot_no.required' => 'প্লট নং নাম আবশ্যই পূর্ণ করতে হবে',
            'bazar_id.required' => 'বাজারের নাম আবশ্যই পূর্ণ করতে হবে',
            'plot_area.required' => 'জায়গার পরিমান আবশ্যই পূর্ণ করতে হবে',
            'plot_type.required' => 'জায়গার ধরণ আবশ্যই পূর্ণ করতে হবে',
            'application_type.required' => 'আবেদনের ধরণ আবশ্যই পূর্ণ করতে হবে',
            'north.required' => 'চৌহদ্দি উত্তরে আবশ্যই পূর্ণ করতে হবে',
            'west.required' => 'চৌহদ্দি পশ্চিমে আবশ্যই পূর্ণ করতে হবে',
            'south.required' => 'চৌহদ্দি দক্ষিণ আবশ্যই পূর্ণ করতে হবে',
            'east.required' => 'চৌহদ্দি পূর্বে আবশ্যই পূর্ণ করতে হবে',
            'name.required' => 'নাম  আবশ্যই পূর্ণ করতে হবে',
            'mobile.required' => 'মোবাইল আবশ্যই পূর্ণ করতে হবে',
            'father_or_husband.required' => 'স্বামী/স্ত্রীর নাম আবশ্যই পূর্ণ করতে হবে',
            'shang.required' => 'সাং আবশ্যই পূর্ণ করতে হবে',
            'post.required' => 'ডাকঘরের নাম  আবশ্যই পূর্ণ করতে হবে',
            'file.required' => 'ফাইল আবশ্যই পূর্ণ করতে হবে',
            'nid_no.required' => 'এনআইডি নং আবশ্যই পূর্ণ করতে হবে',
        ]);

        $data = [
            'user_id' => Auth::user()->id,
            'upazilla_id' => $request->upazilla_id,
            'bazar_id' => $request->bazar_id,
            'plot_no' => $request->plot_no,
            'plot_area' => $request->plot_area,
            'plot_type' => $request->plot_type,
            'application_type' => $request->application_type,
            'north' => $request->north,
            'south' => $request->south,
            'west' => $request->west,
            'east' => $request->east,
            'name' => $request->name,
            'birth_id' => $request->birth_id,
            'mobile' => $request->mobile,
            'father_or_husband' => $request->father_or_husband,
            'address' => $request->address,
            'spouse' => $request->spouse,
            'shang' => $request->shang,
            'h_name' => $request->h_name,
            'h_birth' => $request->h_birth,
            'h_phone' => $request->h_phone,
            'h_nid' => $request->h_nid,
            'h_father' => $request->h_father,
            'h_address' => $request->h_address,
            'h_spouse' => $request->h_spouse,
            'h_up' => $request->h_up,
            'h_post' => $request->h_post,
            'h_shang' => $request->h_shang,
            'post' => $request->post,
            // 'photo' => $request->photo,
            'nid_no' => $request->nid_no,
            'plot_bazar_woner' => $request->plot_bazar_woner,
            'establishment_type' => $request->establishment_type,
            'plot_establishment' => $request->plot_establishment,
            'establishment_permission' => $request->establishment_permission,
            'plot_case' => $request->plot_case,
            'plot_conflict' => $request->plot_conflict,
            'case_prohibition' => $request->case_prohibition,
            'main_deed' => $request->main_deed,
            'contract_year' => $request->contract_year,
            'tax_up_to_date' => $request->tax_up_to_date,
            'plot_mortgate' => $request->plot_mortgate,
            'condition_maintained' => $request->condition_maintained,
            'late_person_heir' => $request->late_person_heir,
            'address_as_nid' => $request->address_as_nid,
            'handover_evidence' => $request->handover_evidence,
            'previous_owner' => $request->previous_owner,
            // 'remarks'=>$request->remarks,
        ];

        // if ($request->file('photo')) {
        //     $photo = $request->file('photo');
        //     $path = 'images/applicent-photo/';
        //     // dd($request->file('photo')->getClientOriginalExtension());
        //     $photoName = $request->name . '-' . date('YmdHis') . '.' . $photo->getClientOriginalExtension();
        //     $photo->move($path, $photoName);
        //     $data['photo'] = $photoName;
        // }

        // if ($request->file('nid_photo')) {
        //     $nid_photo = $request->file('nid_photo');
        //     $path = 'images/applicent-nid/';
        //     $photoName = $request->name . '-' . date('YmdHis') . '.' . $nid_photo->getClientOriginalExtension();
        //     $nid_photo->move($path, $photoName);
        //     $data['nid_photo'] = $photoName;
        // }
        // dd($data);
        $r = Application::create($data);

        if ($request->file('file')) {
            // dd($request->file('file'));
            $photo = $request->file('file');
            $path = 'images/applicent-papers/';
            foreach ($photo as $k => $p) {
                // dd($p);
                $photoName = $request->name . '-' . $k . '-' . date('YmdHis') . '.' . $p->getClientOriginalExtension();
                $p->move($path, $photoName);
                $da['application_id'] = $r->id;
                $da['type'] = $request->type[$k];
                $da['file_name'] = $photoName;
                $da['title'] = $request->title[$k];
                // dd($da);
                Paper::create($da);
            }
        }
        if ($r) {
            return back()->with('success', 'আপনার আবেদন সফলভাবে জমা দেওয়া হয়েছে');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd("Yamini Tabassum Tahi");
        $app = Application::find($id);
        return view('applicationView', compact('app'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    function applicationList()
    {
        if (is_null($this->user) || !$this->user->can('আবেদনপত্র দেখা')) {
            abort(403, 'Sorry !! You are Unauthorized to view any application!');
        }
        $app = Application::latest()->get();
        $users = User::role('সার্ভেয়ার')->get();
        return view('applicationList', compact('app', 'users'));
    }

    function application($id)
    {
        if (is_null($this->user) || !$this->user->can('আবেদনপত্র দেখা')) {
            abort(403, 'Sorry !! You are Unauthorized to view any application!');
        }
        $app = Application::find($id);
        return view('admin/applicationView', compact('app'));
    }
    
    function pdf($id)
    {
        $app = Application::find($id);
        echo $pdf = PDF::loadView('admin/applicationPdf', ['app' => $app]);
        // return $pdf->download('shipping_advise.pdf');
        // return view('admin/applicationPdf',compact('app'));
    }
    function statusChange(Request $request)
    {
        dd($request);
    }
    public function status(Request $r, $id)
    {
        $app = Application::find($id);
        if (isset($r->surveyor_id)) {
            $app->update(['status' => $r->status, 'serveyor_id' => $r->surveyor_id]);
            $msg = "আপনার%20আবেদনের%20প্রেক্ষিতে%20একজন%20সার্ভেয়ার%20নিয়োগ%20করা%20হয়েছে।";
        } else {
            $app->update(['status' => $r->status]);
        }
        if (isset($r->payment_amount)) {
            $app->update(['payment_amount' => $r->payment_amount]);
        }
        if (isset($r->from_date)) {
            $app->update(['status' => $r->status]);
            Plotrecord::create(['bazar_id' => $app->bazar_id, 'plot_no' => $app->plot_no, 'user_id' => $app->user_id, 'from_date' => $r->from_date, 'to_date' => $r->to_date, 'type' => $app->application_type]);
        }

        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL,'https://api2.onnorokomsms.com/HttpSendSms.ashx?op=OneToOne&type=TEXT&mobile='.$app->user->phone.'&smsText='.$msg.'&username=01922110401&password=Morshed!132465%&maskName=&campaignName=');
        // $response = curl_exec($ch);
        // $result = json_decode($response);
        // curl_close($ch);
        return back();
    }
}
