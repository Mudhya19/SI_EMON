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
                <a href="{{ route('report-realisasi') }}" target="_blank" method="POST" class="btn btn-success mb-3"><i class="fas fa-fw fa-print"></i>Cetak Data</a>
                {{-- <a href="{{ route('realisasi.create') }}" method="POST" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i>Tambah Data</a> --}}
                <table class="table align-items-center table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Realisasi</th>
                            <th>Nama Realisasi</th>
                            <th>Tanggal</th>
                            <th>Triwulan</th>
                            <th>Target</th>
                            <th>Satuan</th>
                            <th>Pagu</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Realisasi</th>
                            <th>Nama Realisasi</th>
                            <th>Tanggal</th>
                            <th>Triwulan</th>
                            <th>Target</th>
                            <th>Satuan</th>
                            <th>Pagu</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($realisasis as $realisasi)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $realisasi->kegiatan->kode .' - '. $realisasi->kegiatan->nama }}</td>
                                <td>{{ $realisasi->nama }}</td>
                                <td>{{ $realisasi->tanggal }}</td>
                                <td>{{ $realisasi->triwulan}}</td>
                                <td>{{ $realisasi->target }}</td>
                                <td>{{ $realisasi->satuan }}</td>
                                <td>{{ $realisasi->pagu }}</td>
                                <td>{{ $realisasi->keterangan }}</td>
                                <td>
                                <div class="btn-group">
                                <a href="{{route('realisasi.edit', $realisasi->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                &nbsp;
                                <form action="{{ route('realisasi.destroy', $realisasi->id) }}" method="POST" class="">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah kamu yakin data di hapus?')">
                                    <i class="fas fa-fw fa-trash"></i>Hapus</button>
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