@extends('backend.v1.templates.index')

@section('content')
<div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Kegiatan</h6>
            </div>
            <div class="table-responsive p-3">
                <a href="{{ route('kegiatan.create') }}" method="POST" class="btn btn-primary mb-3">Tambah Data</a>
                <table class="table align-items-center table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>kode Kegiatan</th>
                            <th>Nama Kegiatan</th>
                            <th class="text-nowrap">Indikator</th>
                            <th class="text-nowrap">Target Fisik</th>
                            <th>Pagu</th>
                            <th>Satuan</th>
                            <th>Otorisasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatans as $kegiatan)
                            <tr>
                                <th>{{ $kegiatan->kode }}</th>
                                <td>{{ $kegiatan->nama }}</td>
                                <td>{{ $kegiatan->indikator }}</td>
                                <td>{{ $kegiatan->satuan_indikator }}</td>
                                <td>{{ $kegiatan->pagu }}</td>
                                <td>{{ $kegiatan->target_satuan }}</td>
                                <td>{{ $kegiatan->otorisasi }}</td>
                                <td>
                                <div class="btn-group">
                                <a href="{{route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                &nbsp;
                                <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST" class="">
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