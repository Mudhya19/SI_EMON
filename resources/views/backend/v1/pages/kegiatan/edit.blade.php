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
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Dokumen Pelaksanaan Anggaran</h6>
            {{-- <a href="{{ route('program.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('kegiatan.update', $kegiatan) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="select2SinglePlaceholder">Program</label>
                    <select class="select2-single-placeholder form-control" name="program_id" id="select2SinglePlaceholder"
                        required>
                        <option value="">---Pilih satu ID Program---</option>
                        @foreach ($programs as $program)
                            <option
                                value="{{ $program->id }}"{{ $kegiatan->program_id == $program->id ? 'selected' : '' }}>
                                {{ $program->kode . ' - ' . $program->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode">Kode kegiatan</label>
                            <input type="text" class="form-control" name="kode" id="kode"
                                value="{{ $kegiatan->kode }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selectSinglePlaceholder">Otorisasi</label>
                            <select class="select-single-placeholder form-control" name="user_id"
                                id="selectSinglePlaceholder" required>
                                <option value="">---Pilih Kepala bidang---</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}"
                                        {{ $kegiatan->user_id == $user->id ? 'selected' : '' }}>
                                        {{ $user->nip . ' - ' . $user->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama kegiatan</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                value="{{ $kegiatan->nama }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="target">Target</label>
                            <input type="text" class="form-control" name="target" id="target"
                                value="{{ $kegiatan->target }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" name="satuan" id="satuan"
                                value="{{ $kegiatan->satuan }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="indikator">Indikator</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="indikator" rows="6" required>{{ $kegiatan->indikator }}</textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                <a href="{{ route('kegiatan.index') }}" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
@endsection
