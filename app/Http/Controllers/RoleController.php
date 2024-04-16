<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;


class RoleController extends Controller
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
        if (is_null($this->user) || !$this->user->can('রোল দেখা')) {
            abort(403, 'Sorry !! You are Unauthorized to view any Role!');
        }
        $list=Role::all();
        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('role.index', compact('list','all_permissions','permission_groups'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $all_permissions  = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('role.create', compact('all_permissions','permission_groups'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:roles'
        ], [
            'name.requried' => 'Please give a role name'
        ]);
        // Process Data
        $role = Role::create(['name' => $request->name, 'guard_name' => 'web']);
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->syncPermissions($permissions);
        }
        session()->flash('success', 'Role has been created !!');
        return back();
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
    public function edit($id)
    {
        if (is_null($this->user) || !$this->user->can('রোল হালনাগাদ')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any role !');
        }
        $list=Role::all();
        $role = Role::findById($id, 'web');
        $all_permissions = Permission::all();
        $permission_groups = User::getpermissionGroups();
        return view('role.edit', compact('role', 'all_permissions', 'permission_groups','list'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (is_null($this->user) || !$this->user->can('রোল হালনাগাদ')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any role !');
        }
        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to edit this role !');
            return back();
        }

        // Validation Data
        $request->validate([
            'name' => 'required|max:100|unique:roles,name,' . $id
        ], [
            'name.requried' => 'Please give a role name'
        ]);

        $role = Role::findById($id, 'web');
        $permissions = $request->input('permissions');

        if (!empty($permissions)) {
            $role->name = $request->name;
            $role->save();
            $role->syncPermissions($permissions);
        }

        session()->flash('success', 'Role has been updated !!');
        return redirect()->route('role.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (is_null($this->user) || !$this->user->can('রোল মুছে ফেলা')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any role !');
        }

        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to delete this role !');
            return back();
        }

        $role = Role::findById($id, 'web');
        if (!is_null($role)) {
            $role->delete();
        }

        session()->flash('success', 'Role has been deleted !!');
        return redirect()->route('role.index');
    }
}
