@extends('backend.v1.templates.index')

@section('content')
<div class="card-auto">
        <div class="card-header">
            <strong>Data Realisasi</strong>
        </div>
            <div class="card-body">
                <form action="" method="POST">
                    <div class=" input-group mb-3">
                        <input type="text" class="form-control" placeholder="Masukan Id Kegiatan atau Nama..." name="keyword">
                    <div class="input-group-append">
                <button class="btn btn-primary" type="submit" value="Cari" id="button-search" name="search">Cari !</button>
            </div>
        </div>
    </form>
    <!-- <div class="col-md-12"> -->
        <a href="{{route('realisasi.create') }}" class="btn btn-primary mb-2">Tambah Data</a>
        <a href="" target="_blank" class="btn btn-success mb-2">Cetak Data</a>
            <div class="table-responsive">
        <table class="table table-sm table-bordered table-hover m-0">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Tanggal</th>
                    <th>Triwulan</th>
                    <th>Pagu</th>
                    <th>Satuan Target</th>
                </tr>
            </thead>
                <tbody>
                <tr>
                    <th>012121</th>
                    <th>f wwefdsdosdom</th>
                    <th>Tfffff</th>
                    <th>Iifhishf</th>
                    <th>fjffj</th>
                </tr>
                </tbody>
        </table>
            </div>
            <p></p>
        <nav class="mb-5">
            <ul class="pagination justify-content-end">
            </ul>
        </nav>
    </div>
</div>
@endsection