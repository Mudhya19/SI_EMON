@extends('backend.v1.templates.index')

@section('content')
    <div class="row">
        <!-- Datatables -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Cetak Laporan</h6>
                </div>
                <div class="table-responsive p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <form action="{{ route('laporan.print') }}" method="GET">
                                @csrf
                                <select name="jenis_laporan" class="form-control" required>
                                    <option value="">---Pilih Jenis Laporan---</option>
                                    @if (Auth::user()->rule == 'admin')
                                        <option value="DPA">Laporan Dokumen Pelaksanaan Anggaran</option>
                                        <option value="IKI">Laporan Indikator Kinerja Individu</option>
                                        <option value="EvaluasiRenja">Laporan Evaluasi Rencana Kerja</option>
                                        <option value="RencanaKerja">Laporan Rencana Kerja</option>
                                        <option value="gap">Laporan Analisis GAP</option>
                                        <option value="monitoring">Laporan Monitoring Pelaksanaan Tindak Lanjut</option>
                                        <option value="PPTK">Laporan List Target PPTK</option>
                                        <option value="Kepegawaian">Laporan Kepegawaian</option>
                                    @elseif (Auth::user()->jabatan == 'Kepala Diskominfo')
                                        <option value="DPA">Laporan Dokumen Pelaksanaan Anggaran</option>
                                        <option value="IKI">Laporan Indikator Kinerja Individu</option>
                                        <option value="EvaluasiRenja">Laporan Evaluasi Rencana Kerja</option>
                                        <option value="RencanaKerja">Laporan Rencana Kerja</option>
                                        <option value="gap">Laporan Analisis GAP</option>
                                        <option value="monitoring">Laporan Monitoring Pelaksanaan Tindak Lanjut</option>
                                        <option value="PPTK">Laporan List Target PPTK</option>
                                        <option value="Kepegawaian">Laporan Kepegawaian</option>
                                        <option value="triwulanI">Laporan Realisasi Triwulan I</option>
                                        <option value="triwulanII">Laporan Realisasi Triwulan II</option>
                                        <option value="triwulanIII">Laporan Realisasi Triwulan III</option>
                                        <option value="triwulanIV">Laporan Realisasi Triwulan IV</option>
                                        <option value="triwulanKeseluruhan">Laporan Realisasi Keseluruhan</option>
                                    @else
                                        <option value="triwulanI">Laporan Realisasi Triwulan I</option>
                                        <option value="triwulanII">Laporan Realisasi Triwulan II</option>
                                        <option value="triwulanIII">Laporan Realisasi Triwulan III</option>
                                        <option value="triwulanIV">Laporan Realisasi Triwulan IV</option>
                                        <option value="triwulanKeseluruhan">Laporan Realisasi Keseluruhan</option>
                                    @endif
                                </select>
                                <hr>
                                <select class="select-single-placeholder form-control" name="tahun"
                                    id="selectSinglePlaceholder" required>
                                    <option value="">---Pilih Tahun---</option>
                                    @for ($tahun = 2017; $tahun < 2026; $tahun++)
                                        <option value="{{ $tahun }}">{{ $tahun }}
                                        </option>
                                    @endfor
                                </select>
                                <input type="submit" name="submit" class="btn btn-success" value="Cetak">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
