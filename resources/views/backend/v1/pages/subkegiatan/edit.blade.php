@extends('backend.v1.templates.index')

@section('content')
    @if ($errors->any())
        <div>
            <div class="alert alert-danger">
                @foreach ($errors->all() as $subkegiatan)
                    <li>{{ $subkegiatan }}</li>
                @endforeach
            </div>
        </div>
    @endif
    <div class="card mb-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Edit Data Indikator Kinerja Individu</h6>
            {{-- <a href="{{ route('program.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('subkegiatan.update', $subkegiatan) }}" method="POST">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="select2SinglePlaceholder">Kegiatan</label>
                    <select class="select2-single-placeholder form-control" name="kegiatan_id" id="select2SinglePlaceholder"
                        required>
                        <option value="">---Pilih satu ID Kegiatan---</option>
                        @foreach ($kegiatans as $kegiatan)
                            <option value="{{ $kegiatan->id }}"
                                {{ $subkegiatan->kegiatan_id == $kegiatan->id ? 'selected' : '' }}>
                                {{ $kegiatan->kode . ' - ' . $kegiatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="kode">Kode subkegiatan</label>
                            <input type="text" class="form-control" name="kode" id="kode"
                                value="{{ $subkegiatan->kode }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="selectSinglePlaceholder">Pelaksana</label>
                            <select class="select-single-placeholder form-control" name="kepegawaian_id"
                                id="selectSinglePlaceholder" required>
                                <option value="">---Pilih Pelaksana---</option>
                                @foreach ($kepegawaians as $kepegawaian)
                                    @if (in_array($kepegawaian->id, [14, 16, 17, 18, 19, 20, 21, 22, 23, 24]))
                                        <option
                                            value="{{ $kepegawaian->id }} {{ $subkegiatan->kepegawaian_id == $kepegawaian->id ? 'selected' : '' }}">
                                            {{ $kepegawaian->nama }}</option>
                                    @else
                                        @continue
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama">Nama subkegiatan</label>
                            <input type="text" class="form-control" name="nama" id="nama"
                                value="{{ $subkegiatan->nama }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="target">Target</label>
                            <input type="text" class="form-control" name="target" id="target"
                                value="{{ $subkegiatan->target }}" required>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" name="satuan" id="satuan"
                                value="{{ $subkegiatan->satuan }}" required>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="indikator">Indikator</label>
                            <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="indikator" rows="6">{{ $subkegiatan->indikator }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pagu">Pagu</label>
                            <input type="text" class="form-control" name="pagu" id="pagu"
                                value="{{ $subkegiatan->pagu }}" required>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                <a href="{{ route('subkegiatan.index') }}" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
@endsection
