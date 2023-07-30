<div class="accordion" id="keg-{{ $kegiatan->id }}-triwulanIIAccordion">
    <div class="card">
        <div class="card bg-warning m-lg-3" id="keg-{{ $kegiatan->id }}-triwulanIIHeader">
            <h5 class="mb-0">
                <button class="btn btn-block btn-link text-left text-light" type="button" data-toggle="collapse"
                    data-target="#keg-{{ $kegiatan->id }}-triwulanIICollapse" aria-expanded="true"
                    aria-controls="keg-{{ $kegiatan->id }}-triwulanIICollapse">
                    <h6>Triwulan II</h6>
                </button>
            </h5>
        </div>
        <div id="keg-{{ $kegiatan->id }}-triwulanIICollapse" class="collapse"
            aria-labelledby="keg-{{ $kegiatan->id }}-triwulanIIHeader"
            data-parent="#keg-{{ $kegiatan->id }}-triwulanIIAccordion">
            <div class="card-body">
                {{-- isi data table --}}
                {{-- <a href="{{ route('report-triwulanII') }}" target="_blank" method="POST" class="btn btn-success mb-3"><i
                        class="fas fa-fw fa-print"></i>Cetak Data</a> --}}
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
                        @foreach ($triwulan_II as $tw_II)
                            @if ($tw_II->kegiatan->user_id == Auth::user()->id && $tw_II->kegiatan_id == $kegiatan->id)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td>{{ $tw_II->kegiatan->kode . ' - ' . $tw_II->kegiatan->nama }}</td>
                                    {{-- <td>{{ $tw_II->nama }}</td> --}}
                                    <td>{{ $tw_II->tanggal }}</td>
                                    <td>{{ $tw_II->triwulan }}</td>
                                    <td>{{ $tw_II->target }}</td>
                                    <td>{{ $tw_II->satuan }}</td>
                                    <td>@currency($tw_II->pagu)</td>
                                    <td>{{ $tw_II->keterangan }}</td>
                                    <td>
                                        <div class="btn-group">
                                            <a href="{{ route('realisasi.edit', $tw_II->id) }}"
                                                class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                            &nbsp;
                                            <form action="{{ route('realisasi.destroy', $tw_II->id) }}" method="POST"
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
