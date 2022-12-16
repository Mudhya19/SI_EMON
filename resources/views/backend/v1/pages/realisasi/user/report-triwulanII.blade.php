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
    <title>CETAK DATA TRIWULAN II</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN DATA TRIWULAN II</b></p>
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
            @foreach ($triwulan_II as $tw_II)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $tw_II->kegiatan->kode . ' - ' . $tw_II->kegiatan->nama }}</td>
                    <td>{{ $tw_II->nama }}</td>
                    <td>{{ $tw_II->tanggal }}</td>
                    <td>{{ $tw_II->triwulan }}</td>
                    <td>{{ $tw_II->target }}</td>
                    <td>{{ $tw_II->satuan }}</td>
                    <td>@currency($tw_II->pagu)</td>
                    <td>{{ $tw_II->keterangan }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
