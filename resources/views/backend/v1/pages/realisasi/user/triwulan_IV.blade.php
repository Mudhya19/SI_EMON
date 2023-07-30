<div class="accordion" id="keg-{{ $kegiatan->id }}-triwulanIVAccordion">
    <div class="card">
        <div class="card bg-warning m-lg-3" id="keg-{{ $kegiatan->id }}-triwulanIVHeader">
            <h5 class="mb-0">
                <button class="btn btn-block btn-link text-left text-light" type="button" data-toggle="collapse"
                    data-target="#keg-{{ $kegiatan->id }}-triwulanIVCollapse" aria-expanded="true"
                    aria-controls="keg-{{ $kegiatan->id }}-triwulanIVCollapse">
                    <h6>Triwulan IV</h6>
                </button>
            </h5>
        </div>
        <div id="keg-{{ $kegiatan->id }}-triwulanIVCollapse" class="collapse"
            aria-labelledby="keg-{{ $kegiatan->id }}-triwulanIVHeader"
            data-parent="#keg-{{ $kegiatan->id }}-triwulanIVAccordion">
            <div class="card-body">
                {{-- isi data table --}}
                {{-- <a href="{{ route('report-triwulanIV') }}" target="_blank" method="POST"
                    class="btn btn-success mb-3"><i class="fas fa-fw fa-print"></i>Cetak Data</a> --}}
                <table class="table align-items-center table-hover display table-striped" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Kegiatan</th>
                            {{-- <th>Nama Realisasi</th> --}}
                            <th>Tanggal</th>
                            <th>Triwulan</th>
                            <th>Target</th>
                            <th>Satuan</th>
                            <th>Pagu</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Kode Kegiatan</th>
                            {{-- <th>Nama Realisasi</th> --}}
                            <th>Tanggal</th>
                            <th>Triwulan</th>
                            <th>Target</th>
                            <th>Satuan</th>
                            <th>Pagu</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($triwulan_IV as $tw_IV)
                            @if ($tw_IV->kegiatan->user_id == Auth::user()->id && $tw_IV->kegiatan_id == $kegiatan->id)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $tw_IV->kegiatan->kode . ' - ' . $tw_IV->kegiatan->nama }}</td>
                                    {{-- <td>{{ $tw_IV->nama }}</td> --}}
                                    <td>{{ $tw_IV->tanggal }}</td>
                                    <td>{{ $tw_IV->triwulan }}</td>
                                    <td>{{ $tw_IV->target }}</td>
                                    <td>{{ $tw_IV->satuan }}</td>
                                    <td>@currency($tw_IV->pagu)</td>
                                    <td>{{ $tw_IV->keterangan }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('realisasi.edit', $tw_IV->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                            &nbsp;
                                            <form action="{{ route('realisasi.destroy', $tw_IV->id) }}" method="POST"
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
                            @else
                                @continue
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
