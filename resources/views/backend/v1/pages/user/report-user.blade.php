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
    <title>CETAK DATA PENGGUNA</title>
</head>
<body>
    <div class="form-group">
        <p align="center"><b>LAPORAN DATA PENGGUNA</b></p>
        <table class="static" align="center" rules="all" border="1px" style="width: 90%;">
            <tr>
                <th>No</th>
                <th>Nama user</th>
                <th>Nip</th>
                <th>Jabatan</th>
                <th>Username</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->nip }}</td>
                    <td>{{ $user->jabatan }}</td>
                    <td>{{ $user->username }}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>