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
    <div class="card mb-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Dokumen Pelaksana Anggaran</h6>
            {{-- <a href="{{ route('program.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('kegiatan.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="select2SinglePlaceholder">Program</label>
                    <select class="select2-single-placeholder form-control" name="program_id" id="select2SinglePlaceholder"
                        required>
                        <option value="">---Pilih satu ID Program---</option>
                        @foreach ($programs as $program)
                            <option value="{{ $program->id }}">{{ $program->kode . ' - ' . $program->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode">Kode kegiatan</label>
                            <input type="text" class="form-control" name="kode" id="kode" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selectSinglePlaceholder">Otorisasi</label>
                            <select class="select-single-placeholder form-control" name="user_id"
                                id="selectSinglePlaceholder" required>
                                <option value="">---Pilih Kepala bidang---</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->nip . ' - ' . $user->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama kegiatan</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="target">Target</label>
                            <input type="text" class="form-control" name="target" id="target" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" name="satuan" id="satuan" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="indikator">Indikator</label>
                            <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="indikator" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pagu">Pagu</label>
                            <input type="text" class="form-control" name="pagu" id="pagu" required>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                <a href="{{ route('kegiatan.index') }}" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
@endsection
