<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\Kepegawaian;
use App\Models\Program;
use App\Models\Realisasi;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function __construct(){
    //     $this->middleware(function ($request, $next){
    //     if(!Session::get('Login')){
    //         return redirect('/admin/login')->with('alert','Login Terlebih Dahulu');
    //     }
    //     return $next($request);
    //     });
    //     // $login = Session::get('Login');
    // }

    public function index(Request $request)
    {
        $tahun = $request->query('tahun');
        $data['tahuns'] = Program::select('tahun')->orderBy('tahun', 'ASC')->distinct()->get();

        $data['jumlah_program'] = Program::count();
        $data['jumlah_kegiatan'] = Kegiatan::count();
        $data['jumlah_kepegawaian'] = Kepegawaian::count();
        $data['jumlah_realisasi'] = Realisasi::count();

        if ((Auth::user()->rule == 'admin') || (Auth::user()->jabatan == 'Kepala Diskominfo')) {
            if (is_null($tahun)) {
                $data['kegiatans'] = Kegiatan::all();
            } else {
                $data['kegiatans'] = Kegiatan::whereHas('program', function ($query) use ($tahun) {
                return $query->where('tahun', $tahun);
                })->get();
            }
            return view('backend.v1.pages.dashboard.admin.index', $data);
        } else {
            if (is_null($tahun)) {
                $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->get();
                // $data['kegiatan'] = Kegiatan::where('id', $request->kegiatan_id)->first();
                // $data['pagu'] = $data['kegiatan']->subkegiatan->sum('pagu');
            } else {
                $data['kegiatans'] = Kegiatan::where('user_id', '=', Auth::user()->id)->whereHas('program', function
                ($query) use ($tahun) {
                return $query->where('tahun', $tahun);
                })->get();
                }
            return view('backend.v1.pages.dashboard.user.index', $data);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

}
