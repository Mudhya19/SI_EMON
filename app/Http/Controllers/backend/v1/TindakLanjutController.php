<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class TindakLanjutController extends Controller
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
        $data['programs'] = Program::all();
        } else {
        $data['programs'] = Program::where('tahun', $tahun)->get();
        // $data['users'] = User::where('jabatan', 'Kepala Diskominfo' )->fisrt();
        }
        $data['tahuns'] = Program::select('tahun')->orderBy('tahun', 'ASC')->distinct()->get();
        return view('backend.v1.pages.tindaklanjut.index', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Program
     * @return \Illuminate\Http\Response
     */
    public function editProgram(Program $program)
    {
        $data['program'] = $program;
        // $data['users'] = User::where('rule', 'user' )->where('jabatan', 'Kepala Diskominfo')->first();

        return view('backend.v1.pages.tindaklanjut.editProgram', $data);
    }

        /**
        * Show the form for editing the specified resource.
        *
        * @param \App\Models\Program
        * @return \Illuminate\Http\Response
        */
    public function editKegiatan(Kegiatan $kegiatan)
    {
        $data['kegiatan'] = $kegiatan;
        $data['programs'] = Program::all();
        // $data['users'] = User::where('rule', 'user' )->where('jabatan', 'Kepala Diskominfo')->first();

        return view('backend.v1.pages.tindaklanjut.editKegiatan', $data);
    }

        /**
        * Update the specified resource in storage.
        *
        * @param \Illuminate\Http\Request $request
        * @param \App\Models\Program $program
        * @return \Illuminate\Http\Response
        */
    public function updateProgram(Request $request, Program $program)
    {

        $data = $request->all();
        $program->update($data);

        return to_route('tindaklanjut.index')->with('success', ' Data program berhasil di perbarui');
    }

        /**
        * Update the specified resource in storage.
        *
        * @param \Illuminate\Http\Request $request
        * @param \App\Models\Kegiatan $kegiatan
        * @return \Illuminate\Http\Response
        */
    public function updateKegiatan(Request $request, Kegiatan $kegiatan)
    {

    $data = $request->all();
    $kegiatan->update($data);

    return to_route('tindaklanjut.index')->with('success', ' Data kegiatan berhasil di perbarui');
    }

    public function verifikasiProgram(Request $request, Program $program) {
    $data = $request->all();
    $program->update($data);

    return to_route('tindaklanjut.index');
    }

    public function verifikasiKegiatan(Request $request, Kegiatan $kegiatan) {
    $data = $request->all();
    $kegiatan->update($data);

    return to_route('tindaklanjut.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
