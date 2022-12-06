<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
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
    public function index()
    {
        $data['realisasis'] = Realisasi::all();
        $data['employees'] = User::where('rule','user')->get();
        if (Auth::user()->rule == 'admin'){
            $data['kegiatans'] = Kegiatan::all();
            return view('backend.v1.pages.realisasi.admin.index', $data);
        } else {
            $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
            $data['triwulan_I'] = Realisasi::where('triwulan', '=', 'I')->get();
            $data['triwulan_II'] = Realisasi::where('triwulan', '=', 'II')->get();
            $data['triwulan_III'] = Realisasi::where('triwulan', '=', 'III')->get();
            $data['triwulan_IV'] = Realisasi::where('triwulan', '=', 'IV')->get();
            return view('backend.v1.pages.realisasi.user.index', $data);
        }
    }

    public function cetakRealisasi()
    {
        $data['realisasis'] = Realisasi::all();
        if (Auth::user()->rule == 'admin'){
            return view('backend.v1.pages.realisasi.admin.report-realisasi', $data);
        } else {
            $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
            return view('backend.v1.pages.realisasi.user.report-realisasi', $data);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        if (Auth::user()->rule == 'user'){
            $month = date('m');
            $data['triwulan'] = 0;

            if ($month < 4 ){
                $data['triwulan'] = 1;
            } elseif ($month < 7) {
                $data['triwulan'] = 2;
            } elseif ($month < 10) {
                $data['triwulan'] = 3;
            } else {
                $data['triwulan'] = 4;
            }

            $kegiatan = Kegiatan::where('user_id', Auth::user()->id)->get();
            $data['kegiatans'] = $kegiatan;
            // dd($kegiatan[0]->pagu);
            $data['pagu'] = $kegiatan[0]->pagu;
            $data['target'] = $kegiatan[0]->target;
            $data['satuan'] = $kegiatan[0]->satuan;
            $data['terserap'] = $kegiatan[0]->realisasi->sum('pagu');
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
            'nama' => 'required',
            'tanggal' => 'required',
            'triwulan' => 'required',
            'target' => 'required',
            'satuan' => 'required',
            'pagu' => 'required',
            'keterangan' => 'required',
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
            'nama' => 'required',
            'tanggal' => 'required',
            'triwulan' => 'required',
            'target' => 'required',
            'satuan' => 'required',
            'pagu' => 'required',
            'keterangan' => 'required',
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

    public function boot()
    {
        Blade::directive('currency', function ($value)
        {
            return "Rp. <?php echo number_format($value, 0, ',', '.');?>";
        });
    }
}
