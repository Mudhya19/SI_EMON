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
            <h6 class="m-0 font-weight-bold text-primary">Edit Monitoring Tindak Lanjut Program</h6>
            {{-- <a href="{{ route('program.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('tindaklanjut.verifikasiProgram', $program->id) }}" method="POST">
                @csrf
                @method('patch')
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="kode">Kode program</label>
                            <input type="text" class="form-control" name="kode" id="kode"
                                value="{{ $program->kode }}" readonly required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama program</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                value="{{ $program->nama }}" readonly required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="target">Target</label>
                            <input type="text" class="form-control" name="target" id="target"
                                value="{{ $program->target }}" readonly required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" name="satuan" id="satuan"
                                value="{{ $program->satuan }}" readonly required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="indikator">Indikator</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="indikator" rows="6" readonly required>{{ $program->indikator }} </textarea>
                        </div>
                    </div>
                    @if (Auth::user()->jabatan !== 'Kepala Diskominfo')
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="kendala">Kendala</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="kendala" rows="6">{{ $program->kendala }} </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="solusi">Solusi</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="solusi" rows="6">{{ $program->solusi }} </textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tindak_lanjut">Tindak Lanjut</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" name="tindak_lanjut" rows="6">{{ $program->tindak_lanjut }} </textarea>
                            </div>
                        </div>
                    @endif
                    @if (Auth::user()->jabatan == 'Kepala Diskominfo')
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="selectSinglePlaceholder">Pilih persetujuan</label>
                                <select class="select-single-placeholder form-control" name="verifikasi"
                                    id="selectSinglePlaceholder" required>
                                    <option value="0" {{ $program->verifikasi === 0 ? 'selected' : '' }}>Ditolak
                                    </option>
                                    <option value="1" {{ $program->verifikasi === 1 ? 'selected' : '' }}>Setuju
                                    </option>
                                </select>
                            </div>
                        </div>
                    @endif
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                <a href="{{ route('tindaklanjut.index') }}" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
@endsection
