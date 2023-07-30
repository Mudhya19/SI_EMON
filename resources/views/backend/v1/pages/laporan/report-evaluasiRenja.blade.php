<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- {-- <meta class="csrf-token" content="{{ csrf_tokens() }}"> --} --}}
    <style>
        table.static {
            position: relative;
            /* left : 3%; */
            border: 1px solid black;
        }

        .tandatangan {
            text-align: center;
            margin-left: 745px;
        }

        @media print {
            body {
                font-size: 11px;
            }

            .tandatangan {
                text-align: center;
                margin-left: 345px;
            }
        }
    </style>
    <title>CETAK DATA EVALUASI RENJA DISKOMINFO TAPIN</title>
</head>

<body>
    <div class="form-group">
        <table align="center" style="width: 90%;">
            <tr>
                <td><img src="{{ url('templates/backend') }}/img/tapin.png" width="75px;" alt=""></td>
                <td align="center" style="text-justify:auto;">
                    <h2><b>PEMERINTAH KABUPATEN TAPIN</b></h2>
                    <h2><b>DINAS KOMUNIKASI DAN INFORMATIKA</b></h3>
                        <h4>Jl. Datu Nuraya Kawasan Perkantoran Rantau, email : kominfo@tapinkab.go.id
                        </h4>
                        <h4>RANTAU</h4>
                </td>
                <td><img src="{{ url('templates/backend') }}/img/diskominfo.png" width="75px;" alt=""></td>
            </tr>
        </table>
        <hr width="90%" />
        <p align="center"><b>LAPORAN EVALUASI RENCANA KERJA TAHUN {{ $tahun }}</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 90%;">
            <tr>
                <th>No</th>
                <th>Kode Program</th>
                <th>Program</th>
                <th>Kode Kegiatan</th>
                <th>Kegiatan</th>
                <th>Kode Subkegiatan</th>
                <th>Subkegiatan</th>
                <th>Usulan pagu</th>
            </tr>
            {{-- @foreach ($programs as $program)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $program->kode }}</td>
                    <td>{{ $program->nama }}</td>
                    @foreach ($program->kegiatan as $kegiatan)
                        <td>{{ $kegiatan->kode }}</td>
                        <td>{{ $kegiatan->nama }}</td>
                        @foreach ($kegiatan->subkegiatan as $subkegiatan)
                            <td>{{ $subkegiatan->kode }}</td>
                            <td>{{ $subkegiatan->nama }}</td>
                            <td>@currency($subkegiatan->pagu)</td>
                        @endforeach
                    @endforeach
                </tr>
            @endforeach --}}
            @foreach ($subkegiatans as $subkegiatan)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $subkegiatan->kegiatan->program->kode }}</td>
                    <td>{{ $subkegiatan->kegiatan->program->nama }}</td>
                    <td>{{ $subkegiatan->kegiatan->kode }}</td>
                    <td>{{ $subkegiatan->kegiatan->nama }}</td>
                    <td>{{ $subkegiatan->kode }}</td>
                    <td>{{ $subkegiatan->nama }}</td>
                    <td>@currency($subkegiatan->pagu)</td>
                </tr>
            @endforeach
        </table>
        <div class="tandatangan">

            <br />

            <p>Rantau, tanggal <?php
            function tgl_indo($tanggal)
            {
                $bulan = [
                    1 => 'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember',
                ];
                $pecahkan = explode('-', $tanggal);
            
                // variabel pecahkan 0 = tanggal
                // variabel pecahkan 1 = bulan
                // variabel pecahkan 2 = tahun
            
                return $pecahkan[2] . ' ' . $bulan[(int) $pecahkan[1]] . ' ' . $pecahkan[0];
            }
            echo tgl_indo(date(' Y-m-d')); ?></p>

            <p>Kepala Dinas Komunikasi</br>
                dan Informatika Kab. Tapin
            </p>
            <br />
            <br />
            <br />
            <br />

            {{-- <img src="1.png" height="100px" width="100px" /> --}}

            <p><b>H.M. Tamberin, S.Sos, MM </br>
                    <hr width="200px" />
                    Pembina Utama Muda/IV/c</br>
                    NIP.19630210 198603 1 028
                </b>
            </p>
        </div>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
