<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Role;

use App\Http\Requests\UserValidation;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('pages.admin.kelola-users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::All();
        return view('pages.admin.kelola-users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserValidation $request)
    {
        $request->validated();

        $hashedPassword = Hash::make($request->password);

        User::create([
            'nama'          => $request->nama,
            'username'      => $request->username,
            'str'           => $request->str,
            'masa_berlaku'  => $request->masa_berlaku,
            'role_id'       => $request->role_id,
            'password'      => $hashedPassword
        ]);

        return redirect()->route('user.index')->with('toast_success', 'Data berhasil dibuat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::FindOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::All();
        $user = User::FindOrFail($id);
        return view('pages.admin.kelola-users.edit', compact('user', 'roles'));
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
        $user = User::FindOrFail($id);
        $user->update([
            'nama'          => $request->nama,
            'username'      => $request->username,
            'str'           => $request->str,
            'masa_berlaku'  => $request->masa_berlaku,
            'role_id'       => $request->role_id,
        ]);

        return redirect()->route('user.index')->with('toast_success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index')->with('toast_success', 'Data Berhasil Dihapus');
    }

    public function dashboard(){
        $resepsionis = User::whereHas('role', function($query){
            $query->where('nama', 'resepsionis');
        })->count();

        $apoteker = User::whereHas('role', function($query){
            $query->where('nama', 'apoteker');
        })->count();

        $dokter = User::whereHas('role', function($query){
            $query->where('nama', 'dokter');
        })->count();

        $bidan = User::whereHas('role', function($query){
            $query->where('nama', 'bidan');
        })->count();
        
        return view('pages.admin.dashboard', compact('resepsionis', 'apoteker', 'dokter', 'bidan'));
    }

    public function editPassword(){
        
    }

    public function changePassword(Request $request){
        $user = User::FindOrFail(Auth::id());

        $request->validate([
            'old_password' => ['required', function ($attribute, $value, $fail) use ($user) {
                if (!Hash::check($value, $user->password)) {
                    $fail('Password lama yang anda masukkan salah.');
                }
            }],
            'password' => 'required|min:8|confirmed',
        ], [
            'password.min' => 'Password minimal 8 karakter',
            'password.confirmed' => 'Konfirmasi password berbeda'
        ]);

        $hashedPassword = Hash::make($request->password);

        $user->update([
            'password' => $hashedPassword,
        ]);
    }
}
