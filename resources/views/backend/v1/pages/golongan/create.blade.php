@extends('backend.v1.templates.index')

@section('content')
    @if ($errors->any())
        <div>
            <div class="alert alert-danger">
                @foreach ($errors->all() as $golongan)
                    <li>{{ $golongan }}</li>
                @endforeach
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Golongan Kepegawaian</h6>
            {{-- <a href="{{ route('pegawai.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('golongan.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="kepegawaian_id">Nama pegawai</label>
                            <select class="select1-single-placeholder form-control" name="kepegawaian_id"
                                id="select1SinglePlaceholder" required>
                                <option value="">---Pilih satu Nama pegawai---</option>
                                @foreach ($kepegawaians as $kepegawaian)
                                    <option value="{{ $kepegawaian->id }}">
                                        {{ $kepegawaian->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{-- <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Nama pegawai</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" name="nip" id="nip" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="pergolongan">golongan</label>
                            <input type="text" class="form-control" name="pergolongan" id="pergolongan" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tmt_masuk">TMT CPNS</label>
                            <input type="date" class="form-control" name="tmt_masuk" id="tmt_masuk" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="tmt_keluar">TMT Pensiun</label>
                            <input type="date" class="form-control" name="tmt_keluar" id="tmt_keluar" required>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                <a href="{{ route('golongan.index') }}" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
@endsection
