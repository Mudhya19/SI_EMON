@extends('backend.v1.templates.index')

@section('content')
<div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Realisasi</h6>
            </div>
            <div class="table-responsive p-3">
                <a href="{{ route('realisasi.create') }}" method="POST" class="btn btn-primary mb-3">Tambah Data</a>
                <table class="table align-items-center table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>Kode Realisasi</th>
                            <th>Nama Realisasi</th>
                            <th class="text-nowrap">Tanggal</th>
                            <th class="text-nowrap">Triwulan</th>
                            <th>Pagu</th>
                            <th>Satuan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($realisasis as $realisasi)
                            <tr>
                                <th>{{ $realisasi->kegiatan->kode .' - '. $realisasi->kegiatan->nama }}</th>
                                <td>{{ $realisasi->nama }}</td>
                                <td>{{ $realisasi->tanggal }}</td>
                                <td>{{ $realisasi->triwulan}}</td>
                                <td>{{ $realisasi->pagu }}</td>
                                <td>{{ $realisasi->target_satuan }}</td>
                                <td>
                                <div class="btn-group">
                                <a href="{{route('realisasi.edit', $realisasi->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                &nbsp;
                                <form action="{{ route('realisasi.destroy', $realisasi->id) }}" method="POST" class="">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin data di hapus?')">
                                    Hapus</button>
                            </form>
                            </div>
                            </td>
                            </tr>
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
@endsection