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
    <title>CETAK DATA TRIWULAN III</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN DATA TRIWULAN III</b></p>
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
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
