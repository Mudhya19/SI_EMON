<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kegiatan;
use App\Models\User;
use App\Models\Program;
use App\Models\Realisasi;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $programs = Program::count();
        $kegiatans = Kegiatan::count();
        $users = User::count();
        $realisasis = Realisasi::count();
        return view('backend.v1.pages.dashboard.index', compact('programs', 'kegiatans', 'users', 'realisasis'));
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
