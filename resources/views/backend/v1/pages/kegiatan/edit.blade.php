@extends('backend.v1.templates.index')

@section('content')

@if($errors->any())
<div>
    <div class="alert alert-danger">
    @foreach ($errors->all() as $kegiatan)
        <li>{{$kegiatan}}</li>
    @endforeach
    </div>
</div>    
@endif
<div class="card">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edit Data Kegiatan</h6>
        {{-- <a href="{{ route('program.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
    </div>
    <div class="card-body">
        <form action="{{ route('kegiatan.update', $kegiatan) }}" method="POST">
            @csrf
            @method('patch')
            <div class="form-group">
                <label for="select2SinglePlaceholder">Program</label>
                <select class="select2-single-placeholder form-control" name="program_id" id="select2SinglePlaceholder" required>
                    <option value="">---Pilih satu ID Program---</option>
                    @foreach ($programs as $program)
                    <option value="{{ $program->id }}" {{ ($kegiatan->program_id == $program->id) ? 'selected' : '' }}>{{ $program->kode.' - '.$program->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kode">Kode kegiatan</label>
                        <input type="text" class="form-control" name="kode" id="kode" value="{{ $kegiatan->kode }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama kegiatan</label>
                        <input type="text" class="form-control" name="nama" id="nama" value="{{ $kegiatan->nama }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="indikator">Indikator</label>
                        <input type="text" class="form-control" name="indikator" id="indikator" value="{{ $kegiatan->indikator }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="satuan_indikator">Satuan Indikator</label>
                        <input type="text" class="form-control" name="satuan_indikator" id="satuan_indikator" value="{{ $kegiatan->satuan_indikator }}" required>
                    </div>
                </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="pagu">Pagu</label>
                        <input type="text" class="form-control" name="pagu" id="pagu" value="{{ $kegiatan->pagu }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="otorisasi">Otorisasi</label>
                        <input type="text" class="form-control" name="otorisasi" id="otorisasi" value="{{ $kegiatan->otorisasi }}" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="target_satuan">Target Satuan</label>
                        <input type="text" class="form-control" name="target_satuan" id="target_satuan" value="{{ $kegiatan->target_satuan }}" required>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Simpan">
            <a href="{{route('kegiatan.index')}}" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</div>
@endsection