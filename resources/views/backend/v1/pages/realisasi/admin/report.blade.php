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
    </style>
    <title>CETAK DATA LIST REALISASI PPTK</title>
</head>

<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN DATA LIST REALISASI PPTK</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 90%;">
            <tr>
                <th>No</th>
                <th>Kegiatan</th>
                <th>Pagu Anggaran</th>
                <th>Terserap</th>
                <th>Target</th>
                <th>Sisa Anggaran</th>
                <th>TTD</th>
            </tr>
                @foreach ($kegiatans as $kegiatan)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td>{{ $kegiatan->nama }}</td>
                        <td>@currency($kegiatan->pagu)</td>
                        <td>@currency($kegiatan->realisasi->sum('pagu'))</td>
                        <td>{{ $kegiatan->target . ' ' .$kegiatan->satuan }}</td>
                        <td>{{ ($kegiatan->pagu - $kegiatan->realisasi->sum('pagu')) }}</td>
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
