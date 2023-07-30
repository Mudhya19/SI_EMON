@extends('backend.v1.templates.index')

@section('content')
    <div class="row mb-3">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">IKU</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                <span>
                                    <h2>{{ $jumlah_program }}</< /h2>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Annual) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">DPA</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                                <span>
                                    <h2>{{ $jumlah_kegiatan }}</h2>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-shopping-cart fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New User Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">KEPEGAWAIAN</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                                <span>
                                    <h2>{{ $jumlah_kepegawaian }}</< /h2>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-info"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">REALISASI</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                                <span>
                                    <h2>{{ $jumlah_realisasi }}</h2>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="col-xl-12 col-lg-5">
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tahun Anggaran (TA) Indikator Kinerja Utama</h6>
                <div class="dropdown no-arrow">
                    <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Month <i class="fas fa-chevron-down"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink">
                        @foreach ($tahuns as $tahun)
                            <div class="dropdown-header">Pilih Tahun Anggran</div>
                            <a class="dropdown-item" href="{{ $tahun->tahun }}">{{ $tahun->tahun }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    @foreach ($programs as $program)
                        <div class="small text-gray-500">{{ $program->nama }}
                            <div class="small float-right"><b>>@currency($program->pagu)</b></div>
                        </div>
                        <div class="progress" style="height: 12px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 80%" aria-valuenow="100"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="card-footer text-center">
                <a class="m-0 small text-primary card-link" href="#">View More <i
                        class="fas fa-chevron-right"></i></a>
            </div>
        </div>
    </div> --}}

    <div class="col-xl-12 col-lg-8 mb-4">
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tahun Anggaran Indikator Kinerja Utama Dinas Komunikasi dan
                    Informatika Kabupaten Tapin</h6>
                {{-- <div class="dropdown no-arrow">
                    <a class="dropdown-toggle btn btn-primary btn-sm" href="#" role="button" id="dropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Tahun<i class="fas fa-chevron-down"></i>
                    </a> --}}
                {{-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                        aria-labelledby="dropdownMenuLink"> --}}
                {{-- @foreach ($tahuns as $tahun)
                            <div class="dropdown-header">Pilih Tahun Periode</div>
                            <a class="dropdown-item" href="{{ $tahun->tahun }}">{{ $tahun->tahun }}</a>
                        @endforeach --}}
                <form action="{{ route('beranda') }}" method="GET">
                    @csrf
                    <select class="select-single-placeholder form-control" name="tahun" id="selectSinglePlaceholder"
                        required>
                        <option class="dropdown-header" value="">Pilih Tahun Anggaran</option>
                        @foreach ($tahuns as $tahun)
                            <option class="dropdown-item" value="{{ $tahun->tahun }}">{{ $tahun->tahun }}
                            </option>
                        @endforeach
                    </select>
                    <input type="submit" name="submit" class="btn btn-success" value="Filter">
                </form>
                {{-- </div> --}}
                {{-- </div> --}}
            </div>
            <div class="table-responsive">
                <table class="table align-items-center table-flush table table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Penanggung jawab</th>
                            <th>Program</th>
                            <th>Kegiatan</th>
                            <th>Pagu</th>
                            <th>Status</th>
                            @if (Auth::user()->jabatan != 'Kepala Diskominfo')
                                <th>Aksi</th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kegiatans as $kegiatan)
                            <tr>
                                {{-- <td>{{ $kegiatan->user->nama . ' - ' . $kegiatan->user->nip }}</td>
                                <td>{{ $kegiatan->program->nama . '-' . $kegiatan->nama }}</td>
                                <td>{{ $kegiatan->program->pagu }}</td> --}}
                                <td>H.M. Tamberin, S.Sos, MM</td>
                                <td>{{ $kegiatan->program->nama }}</td>
                                <td>{{ $kegiatan->nama }}</td>
                                <td>@currency($kegiatan->subkegiatan->sum('pagu'))</td>
                                @if ($kegiatan->subkegiatan->sum('pagu') > $kegiatan->realisasi->sum('pagu'))
                                    <td><span class="badge badge-warning" href="#" role="button">Proses
                                            penyerapan</span></td>
                                @elseif($kegiatan->subkegiatan->sum('pagu') == $kegiatan->realisasi->sum('pagu'))
                                    <td><span class="badge badge-success" href="#" role="button">selesai
                                            Penyerapan</span></td>
                                @elseif ($kegiatan->subkegiatan->sum('pagu') < $kegiatan->realisasi->sum('pagu'))
                                    <td><span class="badge badge-danger" href="#" role="button">Melebih
                                            Penyerapan</span></td>
                                @endif
                                @if (Auth::user()->jabatan != 'Kepala Diskominfo')
                                    <td>
                                        <a class="nav-link btn btn-sm btn-primary" href="{{ route('realisasi.index') }}">
                                            <span>Detail</span></a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
@endsection
