<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdateUserRequest;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:user-list|user-create|user-edit|user-delete')->only('index');
        $this->middleware('permission:user-create')->only('create', 'store');
        $this->middleware('permission:user-edit')->only('edit', 'update');
        $this->middleware('permission:user-delete')->only('destroy');
        $this->middleware('permission:profile-update')->only('profileEdit', 'profileUpdate');
    }

    public function index()
    {
        $title = "Data User";
        $users = User::all();
        return view('backend.users.index', compact('title', 'users'));
    }

    public function create()
    {
        $title = 'Tambah Data User';
        $roles = Role::orderBy('id', 'asc')->get();
        return view('backend.users.create', compact('title', 'roles'));
    }

    public function store(StoreUserRequest $request)
    {
        $validateData = $request->validated();
        $validateData['token'] = Str::random(20);
        $validateData['name'] = Str::title($validateData['name']);
        $validateData['password'] = Hash::make($validateData['password']);
        $user = User::create($validateData);
        $user->assignRole($request->role);
        return redirect()->route('dashboard.users.index')->with('success', 'Data User Berhasil Ditambah');
    }

    public function edit(User $user)
    {
        $title = 'Ubah Data User';
        $roles = Role::orderBy('id', 'asc')->get();
        $userRole = $user->getRoleNames()->first();
        return view('backend.users.edit', compact('title', 'roles', 'userRole', 'user'));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $validateData = $request->validated();
        $validateData['name'] = Str::title($validateData['name']);
        $validateData['password'] = Hash::make($validateData['password']);
        User::where('id', $user->id)->update($validateData);
        $user = User::find($user->id);
        $user->syncRoles($request->role);
        return redirect()->route('dashboard.users.index')->with('success', 'Data User Berhasil Diubah');
    }

    public function destroy(User $user)
    {
        User::where('id', $user->id)->delete();
        return redirect()->route('dashboard.users.index')->with('success', 'Data User Berhasil Dihapus');
    }

    public function profileEdit(User $user)
    {
        if (Auth::user()->token != $user->token) {
            return back()->with('error', 'Tidak Memiliki Akses');
        }
        $title = 'Ubah Data Profil';
        $roles = Role::orderBy('id', 'asc')->get();
        $userRole = $user->getRoleNames()->first();
        return view('backend.users.profile-edit', compact('title', 'roles', 'userRole', 'user'));
    }

    public function profileUpdate(UpdateProfileRequest $request, User $user)
    {
        dd('asd');
        $validateData = $request->validated();
        $validateData['name'] = Str::title($validateData['name']);
        $validateData['password'] = Hash::make($validateData['password']);
        User::where('id', $user->id)->update($validateData);
        Session::flush();
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'Data Profil Berhasil Diubah Silahkan Login Ulang');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(User::class, 'slug', $request->name);
        return response()->json(['slug' => $slug]);
    }
}
