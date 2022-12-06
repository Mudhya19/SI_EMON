<?php

namespace App\Http\Controllers\backend\v1;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['programs'] = Program::all();
        return view('backend.v1.pages.program.index', $data);
            
    }

    public function cetakProgram()
    {
        $data['programs'] = Program::all();
        return view('backend.v1.pages.program.report-program', $data);
            
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.v1.pages.program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'tahun' => 'required',
            'indikator' => 'required',
            'target' => 'required',
            'satuan' => 'required',
            'pagu' => 'required',
        ]);
        
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        Program::create($data);
        
        return redirect()->route('program.index')->with('success', 'Data program berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        $data['program'] = $program;
        return view('backend.v1.pages.program.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'tahun' => 'required',
            'indikator' => 'required',
            'target' => 'required',
            'satuan' => 'required',
            'pagu' => 'required',
        ]);

        $data = $request->all();
        $program->update($data);
        
        return to_route('program.index')->with('success', ' Data program berhasil di perbarui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        $program->delete();
        return to_route('program.index')->with('success', 'Data program berhasil di hapus');
    }
}
