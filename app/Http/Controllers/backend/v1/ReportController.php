<?php

namespace App\Http\Controllers\backend\v1;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Golongan;
use App\Models\Program;
use App\Models\Realisasi;
use App\Models\subkegiatan;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.v1.pages.laporan.index');
    }

    public function print(Request $request)
    {
        $query = $request->query->all();
        $jenis_laporan = $query['jenis_laporan'];
        $tahun = $query['tahun'];
            switch ($jenis_laporan) {
                case 'DPA':
                $data['kegiatans'] = Kegiatan::whereHas('program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
                $report = 'report-kegiatan';
                break;
                case 'IKI':
                $data['subkegiatans'] = Subkegiatan::whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
                $report = 'report-subkegiatan';
                break;
                case 'EvaluasiRenja':
                $data['subkegiatans'] = Subkegiatan::whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
                $report = 'report-evaluasiRenja';
                break;
                case 'RencanaKerja':
                $data['subkegiatans'] = Subkegiatan::whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
                $report = 'report-rencanaKerja';
                break;
                case 'triwulanKeseluruhan':
                $data['realisasis'] = Realisasi::whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
                $report = 'report-realisasi';
                break;
                case 'triwulanI':
                $data['triwulan_I'] = Realisasi::where('triwulan','=', 'I')->whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
                $report = 'report-triwulanI';
                break;
                case 'triwulanII':
                $data['triwulan_II'] = Realisasi::where('triwulan','=', 'II')->whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
                $report = 'report-triwulanII';
                break;
                case 'triwulanIII':
                $data['triwulan_III'] = Realisasi::where('triwulan','=', 'III')->whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
                $report = 'report-triwulanIII';
                break;
                case 'triwulanIV':
                $data['triwulan_IV'] = Realisasi::where('triwulan','=', 'IV')->whereHas('kegiatan.program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
                $report = 'report-triwulanIV';
                break;
                case 'Kepegawaian':
                $data['golongans'] = Golongan::all();
                $report = 'report-golongan';
                break;
                case 'PPTK':
                $data['kegiatans'] = Kegiatan::whereHas('program', function ($query) use ($tahun) {
                    return $query->where('tahun', $tahun);
                })->get();
                $data['tahun'] = $tahun;
                $report = 'report-pptk';
                break;
                case 'gap':
                $data['realisasis'] = Realisasi::whereHas('kegiatan.program', function ($query) use ($tahun) {
                return $query->where('tahun', $tahun);
                })->get();
                $data['tahun'] = $tahun;
                $report = 'report-GAP';
                break;
                case 'monitoring':
                $data['kegiatans'] = Kegiatan::whereHas('program', function ($query) use ($tahun) {
                return $query->where('tahun', $tahun);
                })->get();
                $data['tahun'] = $tahun;
                $report = 'report-monev';
                break;
                }
                $data['tahun'] = $tahun;

                return view('backend.v1.pages.laporan.'.$report, $data);;
            }

    public function cetakRealisasiAdmin()
    {
        $data['kegiatans'] = Kegiatan::all();
        if (Auth::user()->rule == 'admin'){

            return view('backend.v1.pages.realisasi.admin.report', $data);
        }
    }

    public function cetakTriwulanI()
    {
            $data['realisasis'] = Realisasi::all();
        if (Auth::user()->rule == 'admin'){
            return view('backend.v1.pages.realisasi.admin.report-realisasi', $data);
        } else {
            $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
            $data['triwulan_I'] = Realisasi::where('triwulan', '=', 'I')->get();
            return view('backend.v1.pages.realisasi.user.report-triwulanI', $data);
        }
    }

    public function cetakTriwulanII()
    {
            $data['realisasis'] = Realisasi::all();
        if (Auth::user()->rule == 'admin'){
            return view('backend.v1.pages.realisasi.admin.report-realisasi', $data);
        } else {
            $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
            $data['triwulan_II'] = Realisasi::where('triwulan', '=', 'II')->get();
            return view('backend.v1.pages.realisasi.user.report-triwulanII', $data);
        }
    }

    public function cetakTriwulanIII()
    {
            $data['realisasis'] = Realisasi::all();
        if (Auth::user()->rule == 'admin'){
            return view('backend.v1.pages.realisasi.admin.report-realisasi', $data);
        } else {
            $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
            $data['triwulan_III'] = Realisasi::where('triwulan', '=', 'III')->get();
            return view('backend.v1.pages.realisasi.user.report-triwulanIII', $data);
        }
    }

    public function cetakTriwulanIV()
    {
            $data['realisasis'] = Realisasi::all();
        if (Auth::user()->rule == 'admin'){
            return view('backend.v1.pages.realisasi.admin.report-realisasi', $data);
        } else {
            $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
            $data['triwulan_IV'] = Realisasi::where('triwulan', '=', 'IV')->get();
            return view('backend.v1.pages.realisasi.user.report-triwulanIV', $data);
        }
    }

    public function cetakKegiatan($tahun)
    {

    }

    public function cetakGolongan()
    {
        $data['golongans'] = Golongan::all();
        return view('backend.v1.pages.golongan.report-golongan', $data);
    }

    public function cetakSubkegiatan()
    {
        $data['subkegiatans'] = Subkegiatan::all();
        return view('backend.v1.pages.subkegiatan.report-subkegiatan', $data);

    }

    public function cetakEvaluasi()
    {
        $data['programs'] = Program::all();
        $data['kegiatans'] = Kegiatan::all();
        $data['subkegiatans'] = Subkegiatan::all();

        return view('backend.v1.pages.subkegiatan.report-evaluasiRenja', $data);
    }

    public function cetakRencanaKerja()
    {
        $data['programs'] = Program::all();
        $data['kegiatans'] = Kegiatan::all();
        $data['subkegiatans'] = Subkegiatan::all();

        return view('backend.v1.pages.subkegiatan.report-rencanaKerja', $data);
    }

}
