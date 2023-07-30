@extends('backend.v1.templates.index')

@section('content')
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Data Realisasi Pertriwulan</h6>
                </div>
                <div class="table-responsive p-3">
                    <div class='row'>
                        @if (count(Auth::user()->kegiatan) != 0)
                            <div class="col-md-2">
                                <a href="{{ route('realisasi.realisasi-kegiatan') }}" method="POST" class="btn btn-primary mb-3"><i
                                        class="fas fa-fw fa-plus"></i>Tambah Realisasi</a>
                            </div>
                            <div class="col-md-4">
                                <form action="{{ route('realisasi.index') }}" method="GET">
                                    @csrf
                                    <select class="select-single-placeholder form-control" name="tahun"
                                        id="selectSinglePlaceholder" required>
                                        <option value="">Pilih Realisasi Pertriwulan Pertahun</option>
                                        @foreach ($tahuns as $tahun)
                                            <option value="{{ $tahun->tahun }}">{{ $tahun->tahun }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <input type="submit" name="submit" class="btn btn-success" value="Filter">
                                </form>
                            </div>
                    </div>
                    {{-- <a href="{{ route('report-realisasi') }}" target="blank" method="POST"
                            class="btn btn-success mb-3"><i class="fas fa-fw fa-print"></i>Cetak Data</a> --}}
                    @endif
                    @foreach ($kegiatans as $kegiatan)
                        {{-- ini header kegiatan --}}
                        <div class="accordion" id="kegiatanAccordion{{ $loop->iteration }}">
                            <div class="card">
                                <div class="card bg-success m-lg-1" id="kegiatanHeader{{ $loop->iteration }}">
                                    <h4 class="mb-0">
                                        <button class="btn btn-link btn-block btn-lg text-left text-light" type="button"
                                            data-toggle="collapse" data-target="#kegiatanCollapse{{ $loop->iteration }}"
                                            aria-expanded="true" aria-controls="kegiatanCollapse{{ $loop->iteration }}">
                                            {{ $kegiatan->nama }}
                                        </button>
                                    </h4>
                                </div>
                                <div id="kegiatanCollapse{{ $loop->iteration }}" class="collapse"
                                    aria-labelledby="kegiatanHeader{{ $loop->iteration }}"
                                    data-parent="#kegiatanAccordion{{ $loop->iteration }}">
                                    {{-- end kegiatan --}}
                                    @include('backend.v1.pages.realisasi.user.triwulan_I')
                                    @include('backend.v1.pages.realisasi.user.triwulan_II')
                                    @include('backend.v1.pages.realisasi.user.triwulan_III')
                                    @include('backend.v1.pages.realisasi.user.triwulan_IV')
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
