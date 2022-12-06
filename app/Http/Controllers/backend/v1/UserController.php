<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['users'] = User::all();
        return view('backend.v1.pages.user.index', $data);
    }

    public function cetakUser()
    {
        $data['users'] = User::all();
        return view('backend.v1.pages.user.report-user', $data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.v1.pages.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'rule' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        User::create($data);
    
        return redirect()->route('user.index')->with('success', 'Data User berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $data['user'] = $user;
        return view('backend.v1.pages.user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'nip' => 'required',
            'rule' => 'required',
            'jabatan' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $user->update($data);
        
        return to_route('user.index')->with('success', 'Data User berhasil di perbaharui.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return to_route('user.index')->with('success', 'Data user berhasil di hapus');
    }
}
