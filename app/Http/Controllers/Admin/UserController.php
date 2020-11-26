<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Role;

use App\Http\Requests\UserValidation;

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
            'nama'      => $request->nama,
            'email'     => $request->email,
            'role_id'   => $request->role_id,
            'password'  => $hashedPassword
        ]);
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
    public function update(UserValidation $request, $id)
    {
        $request->validated();

        $user = User::FindOrFail($id);

        if (!Hash::check($request->password, $user->password)) {
            $hashedPassword = Hash::make($request->password);
            $request->password = $hashedPassword;
        }

        $user->update([
            'nama'      => $request->nama,
            'email'     => $request->email,
            'role_id'   => $request->role_id,
            'password'  => $request->password
        ]);
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
    }
}
