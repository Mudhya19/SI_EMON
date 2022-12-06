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
    <title>CETAK DATA PROGRAM</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN DATA PROGRAM</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 90%;">
            <tr>
                <th>No</th>
                <th>kode Program</th>
                <th>Nama Program</th>
                <th>Tahun</th>
                <th>Indikator</th>
                <th>Target</th>
                <th>Satuan</th>
                <th>Pagu</th>
            </tr>
            @foreach ($programs as $program)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $program->kode }}</td>
                    <td>{{ $program->nama }}</td>
                    <td>{{ $program->tahun }}</td>
                    <td>{{ $program->indikator }}</td>
                    <td>{{ $program->target }}</td>
                    <td>{{ $program->satuan }}</td>
                    <td>{{ $program->pagu }}</td>            
                </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>