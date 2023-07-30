<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Kepegawaian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GolonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['golongans'] = Golongan::all();
        return view('backend.v1.pages.golongan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['golongans'] = Golongan::all();
        $data['kepegawaians'] = Kepegawaian::all();
        return view('backend.v1.pages.golongan.create', $data);
    }

    // public function cetakGolongan()
    // {
    //     $data['golongans'] = Golongan::all();
    //     return view('backend.v1.pages.golongan.report-golongan', $data);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nip' => 'required',
            'jabatan' => 'required',
            'pergolongan' => 'required',
            'tmt_masuk' => 'required',
            'tmt_keluar' => 'required',
        ]);

        $data = $request->all();
        Golongan::create($data);

        return redirect()->route('golongan.index')->with('success', 'Data golongan kepegawaian berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function show(Golongan $golongan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Golongan $golongan)
    {
        $data['golongan'] = $golongan;
        $data['kepegawaians'] = Kepegawaian::all();
        return view('backend.v1.pages.golongan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Golongan $golongan)
    {
        $request->validate([
            'nip' => 'required',
            'jabatan' => 'required',
            'pergolongan' => 'required',
            'tmt_masuk' => 'required',
            'tmt_keluar' => 'required',
        ]);

        $data = $request->all();
        $golongan->update($data);

        return to_route('golongan.index')->with('success', 'Data golongan pegawai berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Golongan  $golongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Golongan $golongan)
    {
        $golongan->delete();
        return to_route('golongan.index')->with('success', 'Data golongan pegawai berhasil di hapus');
    }
}
