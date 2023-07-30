@extends('backend.v1.templates.index')

@section('content')
    @if ($errors->any())
        <div>
            <div class="alert alert-danger">
                @foreach ($errors->all() as $realisasi)
                    <li>{{ $realisasi }}</li>
                @endforeach
            </div>
        </div>
    @endif
    <div class="row mb-3">
        <div class="col-xl-12 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body bg-info">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs text-light font-weight-bold text-uppercase mb-1">
                                <h6>Tanggal {{ date('d M Y') }},
                                    Triwulan ke-{{ $realisasi->triwulan }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Pagu anggaran</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fa fa-arrow-up"></i></span>
                                <span>
                                    <h5>@currency($realisasi->pagu)</h5>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-money-bill-wave fa-2x text-success"></i>
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
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Target</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                                <span>
                                    <h5>{{ $realisasi->target . ' ' . $realisasi->satuan }}</h5>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-line fa-2x text-success"></i>
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
                            <div class="text-xs font-weight-bold text-uppercase mb-1">anggaran Terserap</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                                <span>
                                    <h5>@currency($realisasi->terserap)</h5>
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
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1">Sisa anggaran</div>
                            <div class="mt-2 mb-0 text-muted text-xs">
                                <span class="text-success mr-2"><i class="fas fa-arrow-up"></i></span>
                                <span>
                                    <h5>@currency($realisasi->sisa)</h5>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calculator fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-3">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Tambah Data Realisasi Pertriwulan</h6>
            {{-- <a href="{{ route('program.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
        </div>
        <div class="card-body">
            <form action="{{ route('realisasi.update', $realisasi) }}" method="POST">
                @csrf
                @method('patch')
                <input type="date" name="tanggal" value="{{ date('Y-m-d') }}" hidden>
                <input type="text" name="triwulan" value="{{ $realisasi->triwulan }}" hidden>
                <div class="form-group">
                    <label for="select2SinglePlaceholder">Kegiatan</label>
                    <select class="select2-single-placeholder form-control" name="kegiatan_id" id="kegiatan_id" required>
                        <option value="">---Pilih satu ID Kegiatan---</option>
                        @foreach ($kegiatans as $kegiatan)
                            <option value="{{ $kegiatan->id }}"
                                {{ $kegiatan->id == $realisasi->kegiatan_id ? 'selected' : '' }}>
                                {{ $kegiatan->kode . ' - ' . $kegiatan->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="target">Target</label>
                            <input type="text" class="form-control" name="target" id="target"
                                value="{{ $realisasi->target }}"required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="satuan">Satuan</label>
                            <input type="text" class="form-control" name="satuan" id="satuan"
                                value="{{ $realisasi->satuan }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="pagu">Pagu</label>
                            <input type="text" class="form-control" name="pagu" id="pagu"
                                value="{{ $realisasi->pagu }}" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea type="text" class="form-control" id="exampleFormControlTextarea1" name="keterangan" rows="6">{{ $realisasi->keterangan }}</textarea>
                        </div>
                    </div>
                </div>
                <input type="submit" name="submit" class="btn btn-success" value="Simpan">
                <a href="{{ route('realisasi.index') }}" class="btn btn-warning">Kembali</a>
            </form>
        </div>
    </div>
@endsection
