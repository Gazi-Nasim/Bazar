<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upazilla;
use App\Models\Bazar;
use Auth;

class BazarController extends Controller
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
        if (is_null($this->user) || !$this->user->can('বাজার দেখা')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Bazar!');
        }
        $upozila = Upazilla::get();
        $bazar = Bazar::latest()->get();
        return view('admin.bazar.bazar',compact('upozila','bazar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'upazilla_id'=>'required',
            'name'=>'required',
        ]);

        $r = Bazar::create($request->all());
        if($r){
            return back()->with('success','Bazar Addedd Successfully');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (is_null($this->user) || !$this->user->can('বাজার হালনাগাদ')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Bazar!');
        }
        $b = Bazar::find($id);
        $upozila = Upazilla::get();
        $user = Auth::user();
        $bazar = Bazar::latest()->get();
        return view('admin.bazar.editBazar',compact('b','upozila','user','bazar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $b = Bazar::find($id);
        $data = [
            'upazilla_id'=>$request->upazilla_id,
            'name'=>$request->name,
        ];
        $r = $b->update($data);
        if($r){
            return redirect()->route('bazar.index')->with('success','Update has been successfull');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (is_null($this->user) || !$this->user->can('বাজার মুছে ফেলা')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any Bazar!');
        }
        $b = Bazar::find($id);
        $r = $b->delete();
        if($r){
            return back()->with('success','Bazar has been deleted succussfully!');
        }
    }
}
