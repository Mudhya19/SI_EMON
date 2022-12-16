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
    <title>CETAK DATA TRIWULAN IV</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN DATA TRIWULAN IV</b></p>
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
            @foreach ($triwulan_IV as $tw_IV)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $tw_IV->kegiatan->kode . ' - ' . $tw_IV->kegiatan->nama }}</td>
                    <td>{{ $tw_IV->nama }}</td>
                    <td>{{ $tw_IV->tanggal }}</td>
                    <td>{{ $tw_IV->triwulan }}</td>
                    <td>{{ $tw_IV->target }}</td>
                    <td>{{ $tw_IV->satuan }}</td>
                    <td>@currency($tw_IV->pagu)</td>
                    <td>{{ $tw_IV->keterangan }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
