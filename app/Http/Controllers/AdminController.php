<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upazilla;
use App\Models\Bazar;
use Auth;

class AdminController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('web')->user();
            return $next($request);
        });
    }
    function adminLogin(){
        if($this->user){
            return redirect()->route('dashboard');
        }
        return view('admin/adminLogin');
    }
    function dashboard(){
        return view('admin.dashboard');
    }
   
}
