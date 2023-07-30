@extends('backend.v1.templates.index')

@section('content')
<div class="card">
    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Pilih Kegiatan</h6>
    </div>
    <div class="card-body">
        @foreach ($kegiatans as $kegiatan)
        <a href="{{ route('realisasi.create', ['kegiatan_id' => $kegiatan->id]) }}"
            class="btn btn-block btn-lg bg-primary text-left text-white mb-2">
            {{ $kegiatan->nama }}
        </a>
        <br>
        @endforeach
    </div>
</div>
@endsection
