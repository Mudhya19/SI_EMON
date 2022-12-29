<div class="accordion" id="triwulanIIIAccordion">
    <div class="card">
        <div class="card bg-warning m-lg-3" id="triwulanIIIHeader">
            <h5 class="mb-0">
                <button class="btn btn-block btn-link text-left text-light" type="button" data-toggle="collapse"
                    data-target="#triwulanIIICollapse" aria-expanded="true" aria-controls="triwulanIIICollapse">
                    <h6>Triwulan III</h6>
                </button>
            </h5>
        </div>
        <div id="triwulanIIICollapse" class="collapse" aria-labelledby="triwulanIIIHeader"
            data-parent="#triwulanIIIAccordion">
            <div class="card-body">
                {{-- isi data table --}}
                <a href="{{ route('report-triwulanIII') }}" target="_blank" method="POST"
                    class="btn btn-success mb-3"><i class="fas fa-fw fa-print"></i>Cetak Data</a>
                <table class="table table-sm align-items-center table-hover display" id="dataTableHover">
                    <thead class="thead-light">
                        <tr>
                            <th>No</th>
                            <th>Kode Realisasi</th>
                            <th>Nama Realisasi</th>
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
                            <th>Kode Realisasi</th>
                            <th>Nama Realisasi</th>
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
                        @foreach ($triwulan_III as $tw_III)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <th>{{ $tw_III->kegiatan->kode . ' - ' . $tw_III->kegiatan->nama }}
                                </th>
                                <td>{{ $tw_III->nama }}</td>
                                <td>{{ $tw_III->tanggal }}</td>
                                <td>{{ $tw_III->triwulan }}</td>
                                <td>{{ $tw_III->target }}</td>
                                <td>{{ $tw_III->satuan }}</td>
                                <td>@currency($tw_III->pagu)</td>
                                <td>{{ $tw_III->keterangan }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('realisasi.edit', $tw_III->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                        &nbsp;
                                        <form action="{{ route('realisasi.destroy', $tw_III->id) }}" method="POST"
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
                        @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
