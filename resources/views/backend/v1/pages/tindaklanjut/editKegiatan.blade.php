@extends('backend.v1.templates.index')

@section('content')
    @if ($errors->any())
        <div>
            <div class="alert alert-danger">
                @foreach ($errors->all() as $kegiatan)
                    <li>{{ $kegiatan }}</li>
                @endforeach
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Monitoring Tindak Lanjut Kegiatan</h6>
            {{-- <a href="{{ route('program.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('tindaklanjut.updateKegiatan', $kegiatan) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode">Kode kegiatan</label>
                            <input type="text" class="form-control" name="kode" id="kode"
                                value="{{ $kegiatan->kode }}" readonly required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama kegiatan</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                value="{{ $kegiatan->nama }}" readonly required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="target">Target</label>
                            <input type="text" class="form-control" name="target" id="target"
                                value="{{ $kegiatan->target }}" readonly required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" name="satuan" id="satuan"
                                value="{{ $kegiatan->satuan }}" readonly required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="indikator">Indikator</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="indikator" rows="6" readonly required>{{ $kegiatan->indikator }} </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kendala">Kendala</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="kendala" rows="6">{{ $kegiatan->kendala }} </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="solusi">Solusi</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="solusi" rows="6">{{ $kegiatan->solusi }} </textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="tindak_lanjut">Tindak Lanjut</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="tindak_lanjut" rows="6">{{ $kegiatan->tindak_lanjut }} </textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                <a href="{{ route('tindaklanjut.index') }}" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
@endsection
