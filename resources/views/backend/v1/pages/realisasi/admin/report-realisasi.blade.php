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
            border : 1px solid black;
        }
    </style>
    <title>CETAK DATA REALISASI</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN DATA REALISASI</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 90%;">
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
            </tr>
            @foreach ($realisasis as $realisasi)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $realisasi->kegiatan->kode .' - '. $realisasi->kegiatan->nama }}</td>
                    <td>{{ $realisasi->nama }}</td>
                    <td>{{ $realisasi->tanggal }}</td>
                    <td>{{ $realisasi->triwulan}}</td>
                    <td>{{ $realisasi->target }}</td>
                    <td>{{ $realisasi->satuan }}</td>
                    <td>{{ $realisasi->pagu }}</td>
                    <td>{{ $realisasi->keterangan }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>