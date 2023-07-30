@extends('backend.v1.templates.index')

@section('content')
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data pengguna</h6>
                </div>
                <div class="table-responsive p-3">
                    <a href="{{ route('user.create') }}" method="POST" class="btn btn-primary mb-3"><i
                            class="fas fa-fw fa-plus"></i>Tambah Pengguna</a>
                    {{-- <a href="{{ route('report-user') }}" target="_blank" method="POST" class="btn btn-success mb-3"><i
                            class="fas fa-fw fa-print"></i>Cetak Data</a> --}}
                    <table class="table align-items-center table-hover table-striped" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama user</th>
                                <th>Nip</th>
                                <th>Rule</th>
                                <th>Jabatan</th>
                                <th>Username</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <th>No</th>
                            <th>Nama user</th>
                            <th>Nip</th>
                            <th>Rule</th>
                            <th>Jabatan</th>
                            <th>Username</th>
                            <th>Aksi</th>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    {{-- <th>{{ $user->kegiatan->kode .' - '. $user->kegiatan->nama }}</th> --}}
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $user->nama }}</td>
                                    <td>{{ $user->nip }}</td>
                                    <td>{{ $user->rule }}</td>
                                    <td>{{ $user->jabatan }}</td>
                                    <td>{{ $user->username }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm"><i
                                                    class="fas fa-fw fa-edit"></i>Edit</a>
                                            &nbsp;
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
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
