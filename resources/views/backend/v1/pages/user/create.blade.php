@extends('backend.v1.templates.index')

@section('content')

@if($errors->any())
<div>
    <div class="alert alert-danger">
    @foreach ($errors->all() as $user)
        <li>{{$user}}</li>
    @endforeach
    </div>
</div>
@endif
<div class="card">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tambah Data pengguna</h6>
        {{-- <a href="{{ route('user.index') }}" class="btn btn-primary mt-4">Data Mahasiswa</a> --}}
    </div>
    <div class="card-body">
        <form action="{{ route('user.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="nama">Nama pengguna</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="jabatan">Jabatan</label>
                        <input type="text" class="form-control" name="jabatan" id="jabatan" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="selectSinglePlaceholder">Rule</label>
                        <select class="select-single-placeholder form-control" name="rule" id="selectSinglePlaceholder" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nip">Nip</label>
                        <input type="text" class="form-control" name="nip" id="nip" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" class="form-control" name="username" id="username" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" class="form-control" name="password" id="password" required>
                    </div>
                </div>
            </div>
            <input type="submit" name="submit" class="btn btn-success" value="Simpan">
            <a href="{{route('user.index')}}" class="btn btn-warning">Kembali</a>
        </form>
    </div>
</div>
@endsection
