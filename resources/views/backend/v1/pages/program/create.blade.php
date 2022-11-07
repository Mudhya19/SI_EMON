@extends('backend.v1.templates.index')

@section('content')

@if($errors->any())
<div>
    <div class="alert alert-danger">
    @foreach ($errors->all() as $program)
        <li>{{$program}}</li>
    @endforeach
    </div>
</div>    
@endif
<div class="card">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Program</h6>
        {{-- <a href="{{ route('program.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
    </div>
    <div class="card-body">
        <form action="{{ route('program.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kode">Kode program</label>
                        <input type="text" class="form-control" name="kode" id="kode" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama program</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tahun">Tahun</label>
                        <input type="text" class="form-control" name="tahun" id="tahun" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="indikator">Indikator</label>
                        <input type="text" class="form-control" name="indikator" id="indikator" required>
                    </div>
                </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="satuan_indkator">Satuan Indikator</label>
                        <input type="text" class="form-control" name="satuan_indikator" id="satuan_indikator" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="pagu">pagu</label>
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
            <a href="{{route('program.index')}}" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</div>
@endsection