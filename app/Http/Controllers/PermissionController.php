<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermissionRequest;
use App\Http\Requests\UpdatePermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:permission-list|permission-create|permission-edit|permission-delete')->only('index');
        $this->middleware('permission:permission-create')->only('create', 'store');
        $this->middleware('permission:permission-edit')->only('edit', 'update');
        $this->middleware('permission:permission-delete')->only('destroy');
    }

    public function index()
    {
        $title = 'Data Permission';
        $permissions = Permission::all();
        return view('backend.permissions.index', compact('title', 'permissions'));
    }

    public function create()
    {
        $title = 'Tambah Data Permission';
        return view('backend.permissions.create', compact('title'));
    }

    public function store(StorePermissionRequest $request)
    {
        $validateData = $request->validated();
        Permission::create($validateData);
        return redirect()->route('dashboard.permissions.index')->with('success', 'Data Permission Berhasil Ditambah');
    }

    public function edit(Permission $permission)
    {
        $title = 'Ubah Data Permission';
        return view('backend.permissions.edit', compact('title', 'permission'));
    }

    public function update(UpdatePermissionRequest $request, Permission $permission)
    {
        $validateData = $request->validated();
        Permission::where('id', $permission->id)->update($validateData);
        return redirect()->route('dashboard.permissions.index')->with('success', 'Data Permission Berhasil Diubah');
    }

    public function destroy(Permission $permission)
    {
        Permission::where('id', $permission->id)->delete();
        return redirect()->route('dashboard.permissions.index')->with('success', 'Data Permission Berhasil Dihapus');
    }
}
