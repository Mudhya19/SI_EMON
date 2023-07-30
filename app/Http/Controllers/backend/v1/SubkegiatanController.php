<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Kepegawaian;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\Subkegiatan;
use Illuminate\Http\Request;

class SubkegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tahun = $request->query('tahun');
        if (is_null($tahun)) {
            $data['subkegiatans'] = Subkegiatan::all();
        } else {
            $data['subkegiatans'] = Subkegiatan::whereHas('kegiatan.program', function ($query) use ($tahun) {
                return $query->where('tahun', $tahun);
            })->get();
        }
        $data['tahuns'] = Program::select('tahun')->orderBy('tahun', 'ASC')->distinct()->get();
        return view('backend.v1.pages.subkegiatan.index', $data);
        // $data['subkegiatans'] = Subkegiatan::all();
        // return view('backend.v1.pages.subkegiatan.index', $data);
    }

    // public function cetakSubkegiatan()
    // {
    //     $data['subkegiatans'] = Subkegiatan::all();
    //     return view('backend.v1.pages.subkegiatan.report-subkegiatan', $data);

    // }

    // public function cetakEvaluasi()
    // {
    //     $data['programs'] = Program::all();
    //     $data['kegiatans'] = Kegiatan::all();
    //     $data['subkegiatans'] = Subkegiatan::all();

    //     return view('backend.v1.pages.subkegiatan.report-evaluasiRenja', $data);
    // }

    // public function cetakRencanaKerja()
    // {
    //     $data['programs'] = Program::all();
    //     $data['kegiatans'] = Kegiatan::all();
    //     $data['subkegiatans'] = Subkegiatan::all();

    //     return view('backend.v1.pages.subkegiatan.report-rencanaKerja', $data);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['kepegawaians'] = Kepegawaian::all();
        $data['kegiatans'] = Kegiatan::all();
        return view('backend.v1.pages.subkegiatan.create', $data);
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
            'kode' => 'required',
            'nama' => 'required',
            'indikator' => 'required',
            'target' => 'required',
            'satuan' => 'required',
            'pagu' => 'required',
        ]);

        $data = $request->all();
        Subkegiatan::create($data);

        return redirect()->route('subkegiatan.index')->with('success', 'Data kegiatan berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subkegiatan  $subkegiatan
     * @return \Illuminate\Http\Response
     */
    public function show(Subkegiatan $subkegiatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subkegiatan  $subkegiatan
     * @return \Illuminate\Http\Response
     */
    public function edit(Subkegiatan $subkegiatan)
    {
        $data['subkegiatan'] = $subkegiatan;
        $data['kepegawaians'] = Kepegawaian::all();
        $data['kegiatans'] = Kegiatan::all();
        return view('backend.v1.pages.subkegiatan.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subkegiatan  $subkegiatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subkegiatan $subkegiatan)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'indikator' => 'required',
            'target' => 'required',
            'satuan' => 'required',
            'pagu' => 'required',
        ]);

        $data = $request->all();
        $subkegiatan->update($data);

        return to_route('subkegiatan.index')->with('success', 'Data kegiatan berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subkegiatan  $subkegiatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subkegiatan $subkegiatan)
    {
        $subkegiatan->delete();
        return to_route('subkegiatan.index')->with('success', 'Data subkegiatan berhasil di hapus');
    }
}
