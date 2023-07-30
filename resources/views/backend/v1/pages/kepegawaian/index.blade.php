@extends('backend.v1.templates.index')

@section('content')
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data pegawai</h6>
                </div>
                <div class="table-responsive p-3">
                    <a href="{{ route('kepegawaian.create') }}" method="POST" class="btn btn-primary mb-3"><i
                            class="fas fa-fw fa-plus"></i>Tambah Pegawai</a>
                    {{-- <a href="{{ route('report-program') }}" target="_blank" method="POST" class="btn btn-success mb-3"><i
                            class="fas fa-fw fa-print"></i>Cetak Data</a> --}}
                    <table class="table align-items-center table-hover table-striped" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis kelamin</th>
                                <th>Tempat lahir</th>
                                <th>Tanggal lahir</th>
                                <th>Agama</th>
                                <th>Pendidikan</th>
                                <th>Status perkawinan</th>
                                <th>Alamat</th>
                                <th>Nomor telpon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jenis kelamin</th>
                            <th>Tempat lahir</th>
                            <th>Tanggal lahir</th>
                            <th>Agama</th>
                            <th>Pendidikan</th>
                            <th>Status perkawinan</th>
                            <th>Alamat</th>
                            <th>Nomor telpon</th>
                            <th>Aksi</th>
                        </tfoot>
                        <tbody>
                            @foreach ($kepegawaians as $kepegawaian)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $kepegawaian->nama }}</td>
                                    <td>{{ $kepegawaian->jenis_kelamin }}</td>
                                    <td>{{ $kepegawaian->tempat_lahir }}</td>
                                    <td>{{ $kepegawaian->tanggal_lahir }}</td>
                                    <td>{{ $kepegawaian->agama }}</td>
                                    <td>{{ $kepegawaian->pendidikan }}</td>
                                    <td>{{ $kepegawaian->status_perkawinan }}</td>
                                    <td>{{ $kepegawaian->alamat }}</td>
                                    <td>{{ $kepegawaian->no_telepon }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('kepegawaian.edit', $kepegawaian->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-fw fa-edit"></i>Edit</a>
                                            &nbsp;
                                            <form action="{{ route('kepegawaian.destroy', $kepegawaian->id) }}"
                                                method="POST" class="">
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
