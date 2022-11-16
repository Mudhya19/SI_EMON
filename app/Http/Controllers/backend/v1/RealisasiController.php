<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Realisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['realisasis'] = Realisasi::all();
        return view('backend.v1.pages.realisasi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kegiatans'] = Kegiatan::all();
        return view('backend.v1.pages.realisasi.create', $data);
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
            'tanggal' => 'required',
            'triwulan' => 'required',
            'pagu' => 'required',
            'target_satuan' => 'required', 
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Realisasi::create($data);

        return redirect()->route('realisasi.index')->with('success', 'Data Realisasi berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function show(Realisasi $realisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Realisasi $realisasi)
    {
        $data['realisasi'] = $realisasi;
        $data['kegiatans'] = Kegiatan::all();
        return view('backend.v1.pages.realisasi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Realisasi $realisasi)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'triwulan' => 'required',
            'pagu' => 'required',
            'target_satuan' => 'required', 
        ]);
        
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $realisasi->update($data);

        return to_route('realisasi.index')->with('success', 'Data Realisasi berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Realisasi  $realisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Realisasi $realisasi)
    {
        $realisasi->delete();
        return to_route('realisasi.index')->with('success', 'Data Realisasi berhasil di hapus');
    }
}
