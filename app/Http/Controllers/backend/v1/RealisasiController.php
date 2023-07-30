<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Kegiatan;
use App\Models\Subkegiatan;
use App\Models\Realisasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RealisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $tahun = $request->query('tahun');
        $data['tahuns'] = Program::select('tahun')->orderBy('tahun', 'ASC')->distinct()->get();

        if (Auth::user()->rule == 'admin') {
            if (is_null($tahun)) {
                $data['employees'] = User::where('rule', 'user')->where('jabatan', '!=', 'Kepala Diskominfo')->get();
            } else {
                $data['employees'] = User::whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
            }
            return view('backend.v1.pages.realisasi.admin.index', $data);
        } else {
            if (is_null($tahun)) {
                $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
                $data['triwulan_I'] = Realisasi::where('triwulan', '=', 'I')->whereHas('kegiatan', function ($query) {
                    return $query->where('user_id', '=', Auth::user()->id);
                })->get();
                $data['triwulan_II'] = Realisasi::where('triwulan', '=', 'II')->whereHas('kegiatan', function
                ($query) {
                    return $query->where('user_id', '=', Auth::user()->id);
                })->get();
                $data['triwulan_III'] = Realisasi::where('triwulan', '=', 'III')->whereHas('kegiatan', function
                ($query) {
                    return $query->where('user_id', '=', Auth::user()->id);
                })->get();
                $data['triwulan_IV'] = Realisasi::where('triwulan', '=', 'IV')->whereHas('kegiatan', function
                ($query) {
                    return $query->where('user_id', '=', Auth::user()->id);
                })->get();
            } else {
                $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->whereHas('program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
                $data['triwulan_I'] = Realisasi::where('triwulan', '=', 'I')->whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->whereHas('kegiatan', function ($query) {
                    return $query->where('user_id', '=', Auth::user()->id);
                })->get();
                $data['triwulan_II'] = Realisasi::where('triwulan', '=', 'II')->whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->whereHas('kegiatan', function ($query) {
                    return $query->where('user_id', '=', Auth::user()->id);
                })->get();
                $data['triwulan_III'] = Realisasi::where('triwulan', '=', 'III')->whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->whereHas('kegiatan', function ($query) {
                    return $query->where('user_id', '=', Auth::user()->id);
                })->get();
                $data['triwulan_IV'] = Realisasi::where('triwulan', '=', 'IV')->whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->whereHas('kegiatan', function ($query) {
                    return $query->where('user_id', '=', Auth::user()->id);
                })->get();
            }
            // $data['triwulan_II'] = Realisasi::where('triwulan', '=', 'II')->get();
            // $data['triwulan_III'] = Realisasi::where('triwulan', '=', 'III')->get();
            // $data['triwulan_IV'] = Realisasi::where('triwulan', '=', 'IV')->get();
            return view('backend.v1.pages.realisasi.user.index', $data);
        }
    }

    public function pilihKegiatan()
    {
        $data['kegiatans'] = Kegiatan::where('user_id', Auth::user()->id)->get();
        return view('backend.v1.pages.realisasi.user.realisasi-kegiatan', $data);
    }

    // public function cetakRealisasi()
    // {
    //     $data['realisasis'] = Realisasi::all();
    //     if (Auth::user()->rule == 'admin'){
    //         return view('backend.v1.pages.realisasi.admin.report-realisasi', $data);
    //     } else {
    //         $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
    //         return view('backend.v1.pages.realisasi.user.report-realisasi', $data);
    //     }
    // }

    // public function cetakRealisasiAdmin()
    // {
    //     $data['kegiatans'] = Kegiatan::all();
    //     if (Auth::user()->rule == 'admin'){

    //         return view('backend.v1.pages.realisasi.admin.report', $data);
    //     }
    // }


    // public function cetakTriwulanI()
    // {
    //         $data['realisasis'] = Realisasi::all();
    //     if (Auth::user()->rule == 'admin'){
    //         return view('backend.v1.pages.realisasi.admin.report-realisasi', $data);
    //     } else {
    //         $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
    //         $data['triwulan_I'] = Realisasi::where('triwulan', '=', 'I')->get();
    //         return view('backend.v1.pages.realisasi.user.report-triwulanI', $data);
    //     }
    // }

    // public function cetakTriwulanII()
    // {
    //         $data['realisasis'] = Realisasi::all();
    //     if (Auth::user()->rule == 'admin'){
    //         return view('backend.v1.pages.realisasi.admin.report-realisasi', $data);
    //     } else {
    //         $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
    //         $data['triwulan_II'] = Realisasi::where('triwulan', '=', 'II')->get();
    //         return view('backend.v1.pages.realisasi.user.report-triwulanII', $data);
    //     }
    // }

    // public function cetakTriwulanIII()
    // {
    //         $data['realisasis'] = Realisasi::all();
    //     if (Auth::user()->rule == 'admin'){
    //         return view('backend.v1.pages.realisasi.admin.report-realisasi', $data);
    //     } else {
    //         $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
    //         $data['triwulan_III'] = Realisasi::where('triwulan', '=', 'III')->get();
    //         return view('backend.v1.pages.realisasi.user.report-triwulanIII', $data);
    //     }
    // }

    // public function cetakTriwulanIV()
    // {
    //         $data['realisasis'] = Realisasi::all();
    //     if (Auth::user()->rule == 'admin'){
    //         return view('backend.v1.pages.realisasi.admin.report-realisasi', $data);
    //     } else {
    //         $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
    //         $data['triwulan_IV'] = Realisasi::where('triwulan', '=', 'IV')->get();
    //         return view('backend.v1.pages.realisasi.user.report-triwulanIV', $data);
    //     }
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if (Auth::user()->rule == 'user') {
            $month = date('m');
            $data['triwulan'] = 0;

            if ($month < 4) {
                $data['triwulan'] = 1;
            } elseif ($month < 7) {
                $data['triwulan'] = 2;
            } elseif ($month < 10) {
                $data['triwulan'] = 3;
            } else {
                $data['triwulan'] = 4;
            }

            $data['kegiatan'] = Kegiatan::where('id', $request->kegiatan_id)->first();
            // dd($data['pagu'] = $data['kegiatan']);
            $data['pagu'] = $data['kegiatan']->subkegiatan->sum('pagu');
            $data['target'] = $data['kegiatan']->target;
            $data['satuan'] = $data['kegiatan']->satuan;
            $data['terserap'] = $data['kegiatan']->realisasi->sum('pagu');
            $data['sisa'] = $data['pagu'] - $data['terserap'];

            return view('backend.v1.pages.realisasi.user.create', $data);
        }
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
            'tanggal' => 'required',
            'triwulan' => 'required',
            'target' => 'required',
            'satuan' => 'required',
            'pagu' => 'required',
            'keterangan' => 'required',
        ]);

        $data['kegiatan'] = Kegiatan::where('id', $request->kegiatan_id)->first();
        $data['pagu'] = $data['kegiatan']->subkegiatan->sum('pagu');
        $data['terserap'] = $data['kegiatan']->realisasi->sum('pagu');
        $data['sisa'] = $data['pagu'] - $data['terserap'];

        // bila pagu yang di input melebihi sisa pagu kegiatan maka diangTindakLanjut gagal
        // if ($request->pagu > $data['sisa']) {
        //     return to_route('realisasi.create', ['kegiatan_id' => $request->kegiatan_id])->with('failed', 'Pagu Yang Dimasukkan melebihi Batas Anggaran Kegiatan');
        // }

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
        return view('backend.v1.pages.realisasi.user.edit', $data);
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
            'tanggal' => 'required',
            'triwulan' => 'required',
            'target' => 'required',
            'satuan' => 'required',
            'pagu' => 'required',
            'keterangan' => 'required',
        ]);

        $data['kegiatan'] = Kegiatan::where('id', $request->kegiatan_id)->first();
        $data['pagu'] = $data['kegiatan']->subkegiatan->sum('pagu');
        $data['terserap'] = $data['kegiatan']->realisasi->where('id', '!=', $realisasi->id)->sum('pagu');
        $data['sisa'] = $data['pagu'] - $data['terserap'];

        // bila pagu yang di input melebihi sisa pagu kegiatan maka diangTindakLanjut gagal
        // if ($request->pagu > $data['sisa']) {
        //     return to_route('realisasi.edit', $realisasi->id)->with('failed', 'Pagu Yang Dimasukkan melebihi Batas Anggaran Kegiatan');
        // }

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

    public function boot()
    {
        Blade::directive('currency', function ($value) {
            return "Rp. <?php echo number_format($value, 0, ',', '.');?>";
});
}
}
