<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <meta class="csrf-token" content="{{ csrf_tokens() }}"> --}}
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
    <title>CETAK DATA TRIWULAN III</title>
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
        <p align="center"><b>LAPORAN REALISASI TRIWULAN III</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 90%;">
            <tr>
                <th>No</th>
                <th>Kode Nama Kegiatan</th>
                <th>Nama Realisasi</th>
                <th>Tanggal</th>
                <th>Triwulan</th>
                <th>Target</th>
                <th>Satuan</th>
                <th>Pagu</th>
                <th>Keterangan</th>
            </tr>
            @foreach ($triwulan_III as $tw_III)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $tw_III->kegiatan->kode . ' - ' . $tw_III->kegiatan->nama }}</td>
                    <td>{{ $tw_III->nama }}</td>
                    <td>{{ $tw_III->tanggal }}</td>
                    <td>{{ $tw_III->triwulan }}</td>
                    <td>{{ $tw_III->target }}</td>
                    <td>{{ $tw_III->satuan }}</td>
                    <td>@currency($tw_III->pagu)</td>
                    <td>{{ $tw_III->keterangan }}</td>
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
