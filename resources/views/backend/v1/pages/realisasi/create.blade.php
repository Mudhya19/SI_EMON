@extends('backend.v1.templates.index')

@section('content')
@if($errors->any())
<div>
    <div class="alert alert-danger">
        @foreach ($errors->all() as $realisasi)
        <li>{{$realisasi}}</li>
        @endforeach
    </div>
</div>
@endif
<div class="card mb-3">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Realisasi</h6>
        {{-- <a href="{{ route('program.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
    </div>
    <div class="card-body">
        <form action="{{ route('realisasi.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="select2SinglePlaceholder">Kegiatan</label>
                <select class="select2-single-placeholder form-control" name="kegiatan_id" id="select2SinglePlaceholder" required>
                    <option value="">---Pilih satu ID Kegiatan---</option>
                    @foreach ($kegiatans as $kegiatan)
                    <option value="{{ $kegiatan->id }}">{{ $kegiatan->kode.' - '.$kegiatan->nama}}</option>
                    @endforeach
                </select>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama Realisasi</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group" id="simple-date1">
                        <label for="simpleDataInput">Input Data Tanggal</label>
                            <div class="input-group date">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                        <input type="text" name="tanggal" class="form-control" id="simpleDataInput">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="selectSinglePlaceholder">Triwulan</label>
                        <select class="select-single-placeholder form-control" name="triwulan" id="selectSinglePlaceholder" required>
                            <option value="I">Triwulan I</option>
                            <option value="II">Triwulan II</option>
                            <option value="III">Triwulan III</option>
                            <option value="VI">Triwulan VI</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pagu">Pagu</label>
                        <input type="text" class="form-control" name="pagu" id="pagu" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="target_satuan">Target Satuan</label>
                        <input type="text" class="form-control" name="target_satuan" id="target_satuan" required>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Simpan">
            <a href="{{route('realisasi.index')}}" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</div>
@endsection