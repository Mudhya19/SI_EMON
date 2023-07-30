<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Kepegawaian;
use App\Models\Golongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KepegawaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kepegawaians'] = Kepegawaian::all();
        return view('backend.v1.pages.kepegawaian.index', $data);
    }

    // public function cetakKepegawaian()
    // {
    //     $data['kepegawaians'] = Kepegawaian::all();
    //     return view('backend.v1.pages.kepegawaian.report-kepegawaian', $data);

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.v1.pages.kepegawaian.create');
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
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'status_perkawinan' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        $data = $request->all();
        Kepegawaian::create($data);

        return redirect()->route('kepegawaian.index')->with('success', 'Data pegawai berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kepegawaian  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Kepegawaian $kepegawaian)
    {
        //
    }

    /**
     * Show  the form for editing the specified resource.
     *
     * @param  \App\Models\Kepegawaian  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Kepegawaian $kepegawaian)
    {
        // dd($data['kepegawaian']);
        $data['kepegawaian'] = $kepegawaian;
        return view('backend.v1.pages.kepegawaian.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kepegawaian  $pegawai
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, Kepegawaian $kepegawaian)
    {
        $request->validate([
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'pendidikan' => 'required',
            'status_perkawinan' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
        ]);

        $data = $request->all();
        $kepegawaian->update($data);

        return to_route('kepegawaian.index')->with('success', ' Data pegawai berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kepegawaian  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kepegawaian $kepegawaian)
    {
        $kepegawaian->delete();
        return to_route('kepegawaian.index')->with('success', 'Data pegawai berhasil di hapus');
    }
}
