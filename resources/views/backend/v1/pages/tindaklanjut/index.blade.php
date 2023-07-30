@extends('backend.v1.templates.index')

@section('content')
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Monitoring Tindak Lanjut Indikator Program</h6>
                </div>
                <div class="table-responsive p-3">
                    <div class="row">
                        <div class="col-md-3">
                            <form action="{{ route('tindaklanjut.index') }}" method="GET">
                                @csrf
                                <select class="select-single-placeholder form-control" name="tahun"
                                    id="selectSinglePlaceholder" required>
                                    <option value="">Pilih Monev Pertahun</option>
                                    @foreach ($tahuns as $tahun)
                                        <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="submit" name="submit" class="btn btn-success" value="Filter">
                            </form>
                        </div>
                    </div>
                    <br>
                    {{-- <a href="{{ route('report-kegiatan') }}" target="_blank" method="POST" class="btn btn-success mb-3"><i
                            class="fas fa-fw fa-print"></i>Cetak Data</a> --}}
                    <table class="table align-items-center table-hover table-striped" id="dataTableHover">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Program</th>
                                <th>Indikator</th>
                                <th>Target dan satuan</th>
                                <th>Aksi</th>
                                <th>Kendala</th>
                                <th>Solusi</th>
                                <th>Tindak Lanjut</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Program</th>
                                <th>Indikator</th>
                                <th>Target dan satuan</th>
                                <th>Aksi</th>
                                <th>Kendala</th>
                                <th>Solusi</th>
                                <th>Tindak Lanjut</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($programs as $program)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $program->kode . '-' . $program->nama }}</td>
                                    <td>{{ $program->indikator }}</td>
                                    <td>{{ $program->target . '-' . $program->satuan }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('tindaklanjut.editProgram', $program->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                        </div>
                                    </td>
                                    <td>{{ $program->kendala }}</td>
                                    <td>{{ $program->solusi }}</td>
                                    <td>{{ $program->tindak_lanjut }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Monitoring Tindak Lanjut Indikator Kegiatan</h6>
                </div>
                <div class="table-responsive p-3">
                    <div class="row">
                        {{-- <div class="col-md-3">
                            <form action="{{ route('tindaklanjut.index') }}" method="GET">
                                @csrf
                                <select class="select-single-placeholder form-control" name="tahun"
                                    id="selectSinglePlaceholder" required>
                                    <option value="">Pilih Monev Pertahun</option>
                                    @foreach ($tahuns as $tahun)
                                        <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}
                                        </option>
                                    @endforeach
                                </select>
                                <input type="submit" name="submit" class="btn btn-success" value="Filter">
                            </form>
                        </div> --}}
                    </div>
                    <br>
                    {{-- <a href="{{ route('report-kegiatan') }}" target="_blank" method="POST" class="btn btn-success mb-3"><i
                            class="fas fa-fw fa-print"></i>Cetak Data</a> --}}
                    <table class="table align-items-center table-hover table-striped" id="dataTableHover2">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Kode Kegiatan</th>
                                <th>Indikator</th>
                                <th>Target dan satuan</th>
                                <th>Aksi</th>
                                <th>Kendala</th>
                                <th>Solusi</th>
                                <th>Tindak Lanjut</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Kode Kegiatan</th>
                                <th>Indikator</th>
                                <th>Target dan satuan</th>
                                <th>Aksi</th>
                                <th>Kendala</th>
                                <th>Solusi</th>
                                <th>Tindak Lanjut</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($programs as $program)
                                @foreach ($program->kegiatan as $kegiatan)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>{{ $kegiatan->kode . '-' . $kegiatan->nama }}</td>
                                        <td>{{ $kegiatan->indikator }}</td>
                                        <td>{{ $kegiatan->target . '-' . $kegiatan->satuan }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('tindaklanjut.editKegiatan', $kegiatan->id) }}"
                                                    class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                            </div>
                                        </td>
                                        <td>{{ $kegiatan->kendala }}</td>
                                        <td>{{ $kegiatan->solusi }}</td>
                                        <td>{{ $kegiatan->tindak_lanjut }}</td>
                                    </tr>
                                @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
