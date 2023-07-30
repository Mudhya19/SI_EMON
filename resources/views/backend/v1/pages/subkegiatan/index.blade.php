@extends('backend.v1.templates.index')

@section('content')
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Indikator Kinerja Individu</h6>
                </div>
                <div class="table-responsive p-3">
                    <div class="row">
                        <div class="col-md-2">
                            <a href="{{ route('subkegiatan.create') }}" method="POST" class="btn btn-primary mb-3"><i
                                    class="fas fa-fw fa-plus"></i>Tambah IKI</a>
                        </div>
                        <div class="col-md-2">
                            <form action="{{ route('subkegiatan.index') }}" method="GET">
                                @csrf
                                <select class="select-single-placeholder form-control" name="tahun"
                                    id="selectSinglePlaceholder" required>
                                    <option value="">Pilih IKI Pertahun</option>
                                    @foreach ($tahuns as $tahun)
                                        <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="submit" name="submit" class="btn btn-success" value="Filter">
                            </form>
                        </div>
                    </div>
                    {{-- <a href="{{ route('report-kegiatan') }}" target="_blank" method="POST" class="btn btn-success mb-3"><i
                            class="fas fa-fw fa-print"></i>Cetak Data</a> --}}
                    <table class="table align-items-center table-hover table-striped" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Kegiatan</th>
                                <th>Kode Sub Kegiatan</th>
                                <th>Nama subKegiatan</th>
                                <th>Indikator</th>
                                <th>Target</th>
                                <th>Satuan </th>
                                <th>Pagu Sub Kegiatan</th>
                                <th>Pelaksana</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Kegiatan</th>
                                <th>Kode SubKegiatan</th>
                                <th>Nama subKegiatan</th>
                                <th>Indikator</th>
                                <th>Target</th>
                                <th>Satuan </th>
                                <th>Pagu SubKegiatan</th>
                                <th>Pelaksana</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($subkegiatans as $subkegiatan)
                                @if ($subkegiatan->kegiatan->user_id == Auth::user()->id)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $subkegiatan->kegiatan->kode . ' - ' . $subkegiatan->kegiatan->nama }}</td>
                                        <td>{{ $subkegiatan->kode }}</td>
                                        <td>{{ $subkegiatan->nama }}</td>
                                        <td>{{ $subkegiatan->indikator }}</td>
                                        <td>{{ $subkegiatan->target }}</td>
                                        <td>{{ $subkegiatan->satuan }}</td>
                                        <td>@currency($subkegiatan->pagu)</td>
                                        <td>{{ $subkegiatan->kepegawaian->nama }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('subkegiatan.edit', $subkegiatan->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                                &nbsp;
                                                <form action="{{ route('subkegiatan.destroy', $subkegiatan->id) }}"
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
                                @else
                                    @continue
                                @endif
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
