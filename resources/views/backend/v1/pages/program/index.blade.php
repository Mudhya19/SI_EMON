@extends('backend.v1.templates.index')

@section('content')
<!-- Row -->
<div class="row">
    <!-- Datatables -->
    <div class="col-lg-12">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Program</h6>
            </div>
            <div class="table-responsive p-3">
                <a href="{{ route('program.create') }}" method="POST" class="btn btn-primary mb-3"><i class="fas fa-fw fa-plus"></i>Tambah</a>
                <table class="table align-items-center table-hover" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>kode Program</th>
                            <th>Nama Program</th>
                            <th>Tahun</th>
                            <th class="text-nowrap">Indikator</th>
                            <th class="text-nowrap">Target</th>
                            <th>Satuan</th>
                            <th>Pagu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <th>No</th>
                            <th>kode Program</th>
                            <th>Nama Program</th>
                            <th>Tahun</th>
                            <th class="text-nowrap">Indikator</th>
                            <th class="text-nowrap">Target</th>
                            <th>Satuan</th>
                            <th>Pagu</th>
                            <th>Aksi</th>
                    </tfoot>
                    <tbody>
                        @foreach ($programs as $program)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $program->kode }}</td>
                                <td>{{ $program->nama }}</td>
                                <td>{{ $program->tahun }}</td>
                                <td>{{ $program->indikator }}</td>
                                <td>{{ $program->target }}</td>
                                <td>{{ $program->satuan }}</td>
                                <td>{{ $program->pagu }}</td>
                                <td>
                                <div class="btn-group">
                                <a href="{{route('program.edit', $program->id) }}" class="btn btn-warning btn-sm">
                                    <i class="fas fa-fw fa-edit"></i>Edit</a>
                                &nbsp;
                                <form action="{{ route('program.destroy', $program->id) }}" method="POST" class="">
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
