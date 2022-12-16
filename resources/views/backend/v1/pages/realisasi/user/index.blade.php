@extends('backend.v1.templates.index')

@section('content')
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Realisasi</h6>
                </div>
                <div class="table-responsive p-3">
                    @if (count(Auth::user()->kegiatan) != 0)
                        <a href="{{ route('realisasi.realisasi-kegiatan') }}" class="btn btn-primary btn-add text-white mb-3">
                            <i class="fas fa-plus fa-sm"></i> Tambah Data
                        </a>
                        <a href="{{ route('report-realisasi') }}" target="blank" method="POST"
                            class="btn btn-success mb-3"><i class="fas fa-fw fa-print"></i>Cetak Data</a>
                    @endif
                    @foreach ($kegiatans as $kegiatan)
                        {{-- ini header kegiatan --}}
                        <div class="accordion" id="kegiatanAccordion{{ $loop->iteration }}">
                            <div class="card">
                                <div class="card bg-success m-lg-1" id="kegiatanHeader{{ $loop->iteration }}">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link btn-block btn-lg text-left text-light" type="button"
                                            data-toggle="collapse" data-target="#kegiatanCollapse{{ $loop->iteration }}"
                                            aria-expanded="true" aria-controls="kegiatanCollapse{{ $loop->iteration }}">
                                            {{ $kegiatan->nama }}
                                        </button>
                                    </h5>
                                </div>
                                <div id="kegiatanCollapse{{ $loop->iteration }}" class="collapse"
                                    aria-labelledby="kegiatanHeader{{ $loop->iteration }}"
                                    data-parent="#kegiatanAccordion{{ $loop->iteration }}">
                                    <div class="card-body">
                                        {{-- end kegiatan --}}
                                        @include('backend.v1.pages.realisasi.user.triwulan_I')
                                        @include('backend.v1.pages.realisasi.user.triwulan_II')
                                        @include('backend.v1.pages.realisasi.user.triwulan_III')
                                        @include('backend.v1.pages.realisasi.user.triwulan_IV')
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
