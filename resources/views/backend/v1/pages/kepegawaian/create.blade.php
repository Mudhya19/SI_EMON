@extends('backend.v1.templates.index')

@section('content')
    @if ($errors->any())
        <div>
            <div class="alert alert-danger">
                @foreach ($errors->all() as $kepegawaian)
                    <li>{{ $kepegawaian }}</li>
                @endforeach
            </div>
        </div>
    @endif
    <div class="card">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Pegawai</h6>
            {{-- <a href="{{ route('pegawai.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('kepegawaian.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="selectSinglePlaceholder">Jenis kelamin</label>
                            <select class="select-single-placeholder form-control" name="jenis_kelamin"
                                id="selectSinglePlaceholder" required>
                                <option value="laki-laki">Laki-laki</option>
                                <option value="perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="tempat_lahir">Tempat lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="tanggal_lahir">Tanggal lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" required>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <input type="text" class="form-control" name="agama" id="agama" required>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="selectSinglePlaceholder">Pendidikan</label>
                            <select class="select-single-placeholder form-control" name="pendidikan"
                                id="selectSinglePlaceholder" required>
                                <option value="SLTA">SLTA</option>
                                <option value="S1">S1</option>
                                <option value="S2">S2</option>
                                <option value="S3">S3</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="selectSinglePlaceholder">Status perkawinan</label>
                            <select class="select-single-placeholder form-control" name="status_perkawinan"
                                id="selectSinglePlaceholder" required>
                                <option value="kawin">kawin</option>
                                <option value="belum kawin">Belum kawin</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="6"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="no_telepon">Nomor telepon</label>
                            <input type="text" class="form-control" name="no_telepon" id="no_telepon" required>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                <a href="{{ route('kepegawaian.index') }}" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
@endsection
