<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Auth;

class AdminUserController extends Controller
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
        if (is_null($this->user) || !$this->user->can('ব্যবহারকারী দেখা')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin!');
        }
        $user = User::latest()->get();
        $role=Role::get();
        return view('admin.adminUser.index',compact('user','role'));
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
            'name'=>'required',
            'phone'=>['required', 'min:11', 'unique:users'],
            'email'=>'required',
            'password'=>['required', 'min:8']
        ]);
        $data = [
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'type'=>'admin'
        ];
        $r = User::create($data);
        $role=Role::find($request->role);
        $r->assignRole($role);
        if($r){
            return back()->with('success','Admin Has been created successfully');
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
        if (is_null($this->user) || !$this->user->can('ব্যবহারকারী হালনাগাদ')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin!');
        }
        $r = User::find($id);
        $user = User::latest()->get();
        $role=Role::get();
        return view('admin.adminUser.edit',compact('r','user','role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $r = User::find($id);
        $data = [
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'type'=>'admin'
        ];
        if(isset($request->password)){
            $data['password']=Hash::make($request->password);
        }
        $rr = $r->update($data);
        $role=Role::find($request->role);
        $r->assignRole($role);
        if($rr){
            return redirect()->route('adminUser.index')->with('success','Admin has been updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (is_null($this->user) || !$this->user->can('ব্যবহারকারী মুছে ফেলা')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin!');
        }
        $r = User::find($id);
         $rr = $r->delete();
         if($rr){
            return back()->with('success','Admin Has beed deleted successfully!');
         }
    }
}
