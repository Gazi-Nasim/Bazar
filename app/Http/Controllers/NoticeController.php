<?php

namespace App\Http\Controllers;
use lemonpatwari\BanglaNumber\NumberToBangla;
use Illuminate\Http\Request;
use App\Models\Notice;
use Auth;

class NoticeController extends Controller
{
    public $user;

    public function __construct()
    {
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
        if (is_null($this->user) || !$this->user->can('আবেদনপত্র দেখা')) {
            abort(403, 'Sorry !! You are Unauthorized to view any notice!');
        }
        $list = Notice::latest()->get();
        return view('admin.notice.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'details'=>'required',
            'file'=>'required|mimes:pdf,jpeg,png,jpg',
        ]);
        $data = [
            'title'=>$request->title,
            'details'=>$request->details,
            'publish_date'=>date('Y-m-d'),
        ];
        if($request->file('file')) {
            $fileName = time().'_'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('notice'), $fileName);
            $data['file'] = $fileName;
        }
        $r = Notice::create($data);
        if($r){
            return back()->with('success','আপনার বিজ্ঞপ্তি সফলভাবে জমা দেওয়া হয়েছে');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (is_null($this->user) || !$this->user->can('আবেদনপত্র দেখা')) {
            abort(403, 'Sorry !! You are Unauthorized to view any notice!');
        }
        $edit = Notice::find($id);
        return view('admin.notice.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $n = Notice::find($id);
        $data = [
            'title'=>$request->title,
            'details'=>$request->details,
            'publish_date'=>date('Y-m-d'),
        ];
        if($request->file('file')) {
            $fileName = time().'_'.$request->file('file')->getClientOriginalName();
            $request->file('file')->move(public_path('notice'), $fileName);
            $data['file'] = $fileName;
        }
        $r = $n->update($data);
        if($r){
            return redirect()->route('notice.index')->with('success','আপনার বিজ্ঞপ্তি সফলভাবে আপডেট দেওয়া হয়েছে');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (is_null($this->user) || !$this->user->can('আবেদনপত্র দেখা')) {
            abort(403, 'Sorry !! You are Unauthorized to view any notice!');
        }
        Notice::find($id)->delete();
        return redirect()->route('notice.index')->with('success','আপনার বিজ্ঞপ্তি সফলভাবে মুছে ফেলা হয়েছে');
    }
    public function list()
    {
        $list = Notice::latest()->get();
        return view('notice.index',compact('list'));
    }
    public function details($id)
    {
        $list = Notice::find($id);
        return view('notice.details',compact('list'));
    }
}
