<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KegiatanController extends Controller
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
            $data['kegiatans'] = Kegiatan::all();
            $data['employees'] = User::where('rule','user')->where('jabatan', '!=', 'Kepala Diskominfo')->get();
        } else {
            $data['kegiatans'] = Kegiatan::whereHas('program', function ($query) use ($tahun) {
                return $query->where('tahun', $tahun);
            })->get();
        }
        $data['tahuns'] = Program::select('tahun')->orderBy('tahun', 'ASC')->distinct()->get();
        return view('backend.v1.pages.kegiatan.index', $data);
        // $data['kegiatans'] = Kegiatan::all();
        // return view('backend.v1.pages.kegiatan.index', $data);
    }

    // public function cetakKegiatan()
    // {
    //     $data['kegiatans'] = Kegiatan::all();
    //     return view('backend.v1.pages.kegiatan.report-kegiatan', $data);
    // }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data['programs'] = Program::all();
        $data['users'] = User::where('rule', '=', 'user')->where('jabatan', '!=', 'Kepala Diskominfo')->get();
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
            'kode' => 'required',
            'nama' => 'required',
            'indikator' => 'required',
            'target' => 'required',
            'satuan' => 'required',
            'user_id' => 'required',
        ]);

        $data['program'] = Program::where('id', $request->program_id)->first();
        $data['pagu'] = $data['program']->pagu;
        $data['terserap'] = $data['program']->kegiatan->sum('pagu');
        $data['sisa'] = $data['pagu'] - $data['terserap'];

        // if ($request->pagu->$data['sisa']){
        //     return to_route('kegiatan.create')->with('failed', 'Pagu yang dimasukan melebihi batas anggaran program ');
        // }

        $data = $request->all();
        Kegiatan::create($data);

        return redirect()->route('kegiatan.index')->with('success', 'Data kegiatan berhasil di tambahkan');
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
        $data['kegiatan'] = $kegiatan;
        $data['programs'] = Program::all();
        $data['users'] = User::where('rule', '=', 'user' )->where('jabatan', '!=', 'Kepala Diskominfo')->get();
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
            'kode' => 'required',
            'nama' => 'required',
            'indikator' => 'required',
            'target' =>'required',
            'satuan' => 'required',
            'user_id' => 'required',
        ]);

        $data['program'] = Program::where('id', $request->program_id)->first();
        $data['pagu'] = $data['program']->pagu;
        $data['terserap'] = $data['program']->kegiatan->where('id', '!=', $kegiatan->id)->sum('pagu');
        $data['sisa'] = $data['pagu'] - $data['terserap'];

        // bila pagu yang di input melebihi sisa pagu program maka diangTindakLanjut gagal
        // if ($request->pagu > $data['sisa']) {
        //     return to_route('kegiatan.edit', $kegiatan->id)->with('failed', 'Pagu Yang Dimasukkan melebihi Batas Anggaran Program');
        // }

        $data = $request->all();
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
        return to_route('kegiatan.index')->with('success', 'Data Kegiatan berhasil di hapus');
    }
}
