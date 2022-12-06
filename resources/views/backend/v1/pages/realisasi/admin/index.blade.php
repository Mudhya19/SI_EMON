@extends('backend.v1.templates.index')

@section('content')
    <!-- Row -->
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Realisasi Bulanan PPTK</h6>
                </div>
                <div class="accordion" id="accordionExample">
                    @foreach ($employees as $employee)
                        <div class="card">
                            <div class="card- bg-success m-lg-3" id="headingOne{{ $loop->iteration }}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left text-light" type="button"
                                        data-toggle="collapse" data-target="#collapseOne{{ $loop->iteration }}"
                                        aria-expanded="true" aria-controls="collapseOne{{ $loop->iteration }}">
                                        <h6>{{ $employee->nama . ' - ' . $employee->nip }}
                                            <br>
                                            {{ $employee->jabatan }}
                                        </h6>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseOne{{ $loop->iteration }}" class="collapse"
                                aria-labelledby="headingOne{{ $loop->iteration }}" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="table-responsive p-3">
                                        <table class="table align-items-center table-hover display" id="">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kegiatan</th>
                                                    <th>Tanggal</th>
                                                    <th>Triwulan</th>
                                                    <th>Realisasi Keuangan</th>
                                                    <th>Target</th>
                                                    <th>Satuan</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <th>No</th>
                                                <th>Kegiatan</th>
                                                <th>Tanggal</th>
                                                <th>Triwulan</th>
                                                <th>Realisasi Keuangan</th>
                                                <th>target</th>
                                                <th>Satuan</th>
                                                <th>Keterangan</th>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($realisasis as $realisasi)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}.</td>
                                                        <td>{{ $realisasi->nama }}</td>
                                                        <td>{{ $realisasi->tanggal }}</td>
                                                        <td>{{ $realisasi->triwulan }}</td>
                                                        <td>@currency($realisasi->pagu)</td>
                                                        <td>{{ $realisasi->target }}</td>
                                                        <td>{{ $realisasi->satuan }}</td>
                                                        <td>{{ $realisasi->keterangan }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <h4 class="bg-warning text-light m-lg-4 text-center">Total serapan anggaran</h4>
                                <div class="card-body">
                                    <div class="table-responsive p-3">
                                        <table class="table align-items-center table-hover display" id="">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kegiatan</th>
                                                    <th>Target keuangan</th>
                                                    <th>Total realisasi keuangan</th>
                                                    <th>Target</th>
                                                    <th>Satuan</th>
                                                    <th>status</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <th>No</th>
                                                <th>Kegiatan</th>
                                                <th>Target keuangan</th>
                                                <th>Total realisasi keuangan</th>
                                                <th>Target</th>
                                                <th>Satuan</th>
                                                <th>status</th>
                                            </tfoot>
                                            <tbody>
                                                @foreach ($kegiatans as $kegiatan)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}.</td>
                                                        <td>{{ $kegiatan->nama }}</td>
                                                        <td>@currency($kegiatan->pagu)</td>
                                                        <td>@currency($kegiatan->realisasi->sum('pagu'))</td>
                                                        <td>{{ $kegiatan->target }}</td>
                                                        <td>{{ $kegiatan->satuan }}</td>
                                                        <td><a class="btn btn-warning" href="#" role="button">Proses penyerapan</a></td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
