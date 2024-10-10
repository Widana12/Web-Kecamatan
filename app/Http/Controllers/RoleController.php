<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:role-list|role-create|role-edit|role-delete')->only('index');
        $this->middleware('permission:role-create')->only('create', 'store');
        $this->middleware('permission:role-edit')->only('edit', 'update');
        $this->middleware('permission:role-delete')->only('destroy');
        $this->middleware('permission:role-permission')->only('givePermission', 'revokePermission');
    }

    public function index()
    {
        $title = 'Data Role';
        $roles = Role::all();
        return view('backend.roles.index', compact('title', 'roles'));
    }

    public function create()
    {
        $title = 'Tambah Data Role';
        return view('backend.roles.create', compact('title'));
    }

    public function store(StoreRoleRequest $request)
    {
        $validateData = $request->validated();
        Role::create($validateData);
        return redirect()->route('dashboard.roles.index')->with('success', 'Data Role Berhasil Ditambah');
    }

    public function show(Role $role)
    {
        $title = 'Give Revoke Permission';
        $permissions = Permission::orderBy('name', 'asc')->get();
        return view('backend.roles.give-revoke', compact('title', 'role', 'permissions'));
    }

    public function edit(Role $role)
    {
        $title = 'Ubah Data Role';
        return view('backend.roles.edit', compact('title', 'role'));
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $validateData = $request->validated();
        Role::where('id', $role->id)->update($validateData);
        return redirect()->route('dashboard.roles.index')->with('success', 'Data Role Berhasil Diubah');
    }

    public function destroy(Role $role)
    {
        Role::where('id', $role->id)->delete();
        return redirect()->route('dashboard.roles.index')->with('success', 'Data Role Berhasil Dihapus');
    }

    public function givePermission(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            return back()->with('error', 'Data Permission Sudah Pernah Dihubungkan');
        }
        $role->givePermissionTo($request->permission);
        return back()->with('success', 'Data Permission Berhasil Dihubungkan');
    }

    public function revokePermission(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            return back()->with('success', 'Data Permission Berhasil Diputus');
        }
        return back()->with('error', 'Data Permission Gagal Diputus');
    }
}
