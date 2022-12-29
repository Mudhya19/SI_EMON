<div class="accordion" id="triwulanIAccordion">
    <div class="card">
        <div class="card bg-warning m-lg-3" id="triwulanIHeader">
            <h5 class="mb-0">
                <button class="btn btn-block btn-link text-left text-light" type="button" data-toggle="collapse"
                    data-target="#triwulanICollapse" aria-expanded="true" aria-controls="triwulanICollapse">
                    <h6>Triwulan I</h6>
                </button>
            </h5>
        </div>
        <div id="triwulanICollapse" class="collapse" aria-labelledby="triwulanIHeader"
            data-parent="#triwulanIAccordion">
            <div class="card-body">
                {{-- isi data table --}}
                <a href="{{ route('report-triwulanI') }}" target="_blank" method="POST" class="btn btn-success mb-3"><i
                        class="fas fa-fw fa-print"></i>Cetak Data</a>
                <table class="table table-responsive align-items-center table-hover display" id="dataTableHover">
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
                        @foreach ($triwulan_I as $tw_I)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <th>{{ $tw_I->kegiatan->kode . ' - ' . $tw_I->kegiatan->nama }}
                                </th>
                                <td>{{ $tw_I->nama }}</td>
                                <td>{{ $tw_I->tanggal }}</td>
                                <td>{{ $tw_I->triwulan }}</td>
                                <td>{{ $tw_I->target }}</td>
                                <td>{{ $tw_I->satuan }}</td>
                                <td>@currency($tw_I->pagu)</td>
                                <td>{{ $tw_I->keterangan }}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{ route('realisasi.edit', $tw_I->id) }}"
                                            class="btn btn-warning btn-sm"><i class="fas fa-fw fa-edit"></i>Edit</a>
                                        &nbsp;
                                        <form action="{{ route('realisasi.destroy', $tw_I->id) }}" method="POST"
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
