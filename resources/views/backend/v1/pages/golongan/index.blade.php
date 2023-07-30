@extends('backend.v1.templates.index')

@section('content')
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Golongan Kepegawaian</h6>
                </div>
                <div class="table-responsive p-3">
                    <a href="{{ route('golongan.create') }}" method="POST" class="btn btn-primary mb-3"><i
                            class="fas fa-fw fa-plus"></i>Tambah Golongan Kepegawaian</a>
                    {{-- <a href="{{ route('report-program') }}" target="_blank" method="POST" class="btn btn-success mb-3"><i
                            class="fas fa-fw fa-print"></i>Cetak Data</a> --}}
                    <table class="table align-items-center table-hover table-striped" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama pegawai</th>
                                <th>NIP</th>
                                <th>Jabatan</th>
                                <th>Golongan</th>
                                <th>TMT CPNS</th>
                                <th>TMT Pensiun</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th>No</th>
                            <th>Nama pegawai</th>
                            <th>NIP</th>
                            <th>Jabatan</th>
                            <th>Golongan</th>
                            <th>TMT CPNS</th>
                            <th>TMT Pensiun</th>
                            <th>Aksi</th>
                        </tfoot>
                        <tbody>
                            @foreach ($golongans as $golongan)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $golongan->kepegawaian->nama }}</td>
                                    <td>{{ $golongan->nip }}</td>
                                    <td>{{ $golongan->jabatan }}</td>
                                    <td>{{ $golongan->pergolongan }}</td>
                                    <td>{{ $golongan->tmt_masuk }}</td>
                                    <td>{{ $golongan->tmt_keluar }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('golongan.edit', $golongan->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-fw fa-edit"></i>Edit</a>
                                            &nbsp;
                                            <form action="{{ route('golongan.destroy', $golongan->id) }}" method="POST"
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
