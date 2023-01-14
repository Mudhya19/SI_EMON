@extends('backend.v1.templates.index')

@section('content')
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Dokumen Pelaksanaan Anggaran</h6>
                </div>
                <div class="table-responsive p-3">
                    <a href="{{ route('kegiatan.create') }}" method="POST" class="btn btn-primary mb-3"><i
                            class="fas fa-fw fa-plus"></i>Tambah DPA</a>
                    <a href="{{ route('report-kegiatan') }}" target="_blank" method="POST" class="btn btn-success mb-3"><i
                            class="fas fa-fw fa-print"></i>Cetak Data</a>
                    <table class="table align-items-center table-hover" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Program</th>
                                <th>Kode Kegiatan</th>
                                <th>Otorisasi</th>
                                <th>Nama Kegiatan</th>
                                <th>Indikator</th>
                                <th>Target</th>
                                <th>Satuan </th>
                                <th>Pagu Program</th>
                                <th>Pagu Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Program</th>
                                <th>Kode Kegiatan</th>
                                <th>Otorisasi</th>
                                <th>Nama Kegiatan</th>
                                <th>Indikator</th>
                                <th>Target</th>
                                <th>Satuan </th>
                                <th>Pagu Program</th>
                                <th>Pagu Kegiatan</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($kegiatans as $kegiatan)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $kegiatan->program->kode . ' - ' . $kegiatan->program->nama }}</td>
                                    <td>{{ $kegiatan->kode }}</td>
                                    <td>{{ $kegiatan->user->nama . ' - ' . $kegiatan->user->nip }}</td>
                                    <td>{{ $kegiatan->nama }}</td>
                                    <td>{{ $kegiatan->indikator }}</td>
                                    <td>{{ $kegiatan->target }}</td>
                                    <td>{{ $kegiatan->satuan }}</td>
                                    <td>@currency($kegiatan->pagu)</td>
                                    <td>@currency($kegiatan->program->pagu)</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('kegiatan.edit', $kegiatan->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                            &nbsp;
                                            <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST"
                                                class="">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Apakah kamu yakin data di hapus?')">
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
