@extends('backend.v1.templates.index')

@section('content')
<div class="card-auto">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data Program</h6>
    </div>
    <div class="card-body">
        <form method="POST" class="needs-validation" novalidate>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kode">Kode</label>
                        <input type="text" class="form-control"  required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="kode">Tahun</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">Indikator</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
            <div class="col-md-6">
                    <div class="form-group">
                        <label for="harga">Indikator</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="stok">pagu</label>
                        <input type="text" class="form-control"  required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="keterangan">Target Satuan</label>
                        <input type="text" class="form-control" required>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Simpan">
            <a href="?page=barang-show" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</div>
@endsection