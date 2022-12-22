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
    <title>CETAK DATA KEGIATAN</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN DATA KEGIATAN</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 90%;">
            <tr>
                <th>No</th>
                <th>Kode Program</th>
                <th>Kode Kegiatan</th>
                <th>Nama Kegiatan</th>
                <th>Indikator</th>
                <th>Target</th>
                <th>Pagu</th>
                <th>Satuan</th>
                <th>TTD</th>
            </tr>
            @foreach ($kegiatans as $kegiatan)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $kegiatan->program->kode .' - '. $kegiatan->program->nama }}</td>
                    <td>{{ $kegiatan->kode }}</td>
                    <td>{{ $kegiatan->nama }}</td>
                    <td>{{ $kegiatan->indikator }}</td>
                    <td>{{ $kegiatan->target }}</td>
                    <td>{{ $kegiatan->satuan }}</td>
                    <td>@currency($kegiatan->pagu)</td>
                    <td>H.M Tamberin, S.Sos,MM</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>
