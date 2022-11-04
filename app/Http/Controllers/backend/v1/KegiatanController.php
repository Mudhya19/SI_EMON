<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['kegiatans'] = Kegiatan::all();
        return view('backend.v1.pages.kegiatan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['programs'] = Program::all();
        return view('backend.v1.pages.kegiatan.create', $data);
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
            'program_id ' => 'required',
            'kode' => 'required',
            'nama' => 'required',
            'indikator' => 'required',
            'satuan_indikator' => 'required',
            'pagu' => 'required',
            'target_satuan' => 'required',
            'otorisasi' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Kegiatan::create($data);

        return redirect()->route('kegiatan.index')->with('success', 'Data program berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Kegiatan $kegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Kegiatan $kegiatan)
    {
        $data['kegiatans'] = $kegiatan;
        $data['programs'] = Program::all();
        return view('backend.v1.pages.kegiatan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'program_id' => 'required',
            'kode' => 'required',
            'nama' => 'required',
            'indikator' => 'required',
            'satuan_indikator' => 'required',
            'pagu' => 'required',
            'target_satuan' => 'required',
            'otorisasi' => 'required',
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $kegiatan->update($data);

        return to_route('kegiatan.index')->with('success', 'Data kegiatan berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kegiatan  $kegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kegiatan $kegiatan)
    {
        $kegiatan->delete();
        return to_route('kegiatan.index')->with('success', 'Data program berhasil di hapus');
    }
}
