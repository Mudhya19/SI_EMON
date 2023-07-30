@extends('backend.v1.templates.index')

@section('content')
    @if ($errors->any())
        <div>
            <div class="alert alert-danger">
                @foreach ($errors->all() as $program)
                    <li>{{ $program }}</li>
                @endforeach
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Indikator Kinerja Utama</h6>
            {{-- <a href="{{ route('program.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('program.update', $program) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode">Kode program</label>
                            <input type="text" class="form-control" name="kode" id="kode"
                                value="{{ $program->kode }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="tahun">Tahun anggaran</label>
                            <input type="text" class="form-control" name="tahun" id="tahun"
                                value="{{ $program->tahun }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama program</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                value="{{ $program->nama }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="target">Target</label>
                            <input type="text" class="form-control" name="target" id="target"
                                value="{{ $program->target }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" name="satuan" id="satuan" value="{{ $program->satuan }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="indikator">Indikator</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="indikator" rows="6" required>{{ $program->indikator }} </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pagu">pagu</label>
                            <input type="text" class="form-control" name="pagu" id="pagu"
                                value="{{ $program->pagu }}" required>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                <a href="{{ route('program.index') }}" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
@endsection
