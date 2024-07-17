<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ url('templates/backend') }}/img/diskominfo.png">
        </div>
        <div class="sidebar-brand-text mx-4">SI-EMON</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item {{ Route::currentRouteName() == 'home' ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('beranda') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    <hr class="sidebar-divider">
    @if (Auth::user()->rule == 'admin')
        <li
            class="nav-item {{ in_array(Route::currentRouteName(), ['program.index', 'program.create', 'program.edit']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('program.index') }}">
                <i class="fas fa-tablet-alt"></i>
                <span>IKU</span></a>
        </li>
        <li
            class="nav-item {{ in_array(Route::currentRouteName(), ['kegiatan.index', 'kegiatan.create', 'kegiatan.edit']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('kegiatan.index') }}">
                <i class="fas fa-fw fa-table"></i>
                <span>DPA</span></a>
        </li>
        @if (Auth::user()->rule == 'admin')
        <li
            class="nav-item {{ in_array(Route::currentRouteName(), ['tindaklanjut.index', 'tindaklanjut.editProgram', 'tindaklanjut.editKegiatan']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('tindaklanjut.index') }}">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>MONEV</span></a>
        </li>
        @endif
        {{-- <li
            class="nav-item {{ in_array(Route::currentRouteName(), ['user.index', 'user.create', 'user.edit']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>USER</span></a>
        </li> --}}
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseForm"
                aria-expanded="true" aria-controls="collapseForm">
                <i class="fab fa-fw fa-wpforms"></i>
                <span>Kepegawaian</span>
            </a>
            <div id="collapseForm" class="collapse" aria-labelledby="headingForm" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['kepegawaian.index', 'kepegawaian.create', 'kepegawaian.edit']) ? 'active' : '' }}"
                        href="{{ route('kepegawaian.index') }}"><i class="fas fa-fw fa-user"></i>
                        <span>Pegawai</span></a>
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['golongan.index', 'golongan.create', 'golongan.edit']) ? 'active' : '' }}"
                        href="{{ route('golongan.index') }}"><i class="fas fa-fw fa-book"></i>
                        <span>Golongan</span></a>
                </div>
            </div>
        </li>
    @endif
    @if (Auth::user()->rule == 'user' && Auth::user()->jabatan != 'Kepala Diskominfo')
        <li
            class="nav-item  {{ in_array(Route::currentRouteName(), ['subkegiatan.index', 'subkegiatan.create', 'subkegiatan.edit']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('subkegiatan.index') }}">
                <i class="fas fa-tablet-alt"></i>
                <span>IKI</span>
            </a>
        </li>
    @endif
    <li
        class="nav-item {{ in_array(Route::currentRouteName(), ['realisasi.index', 'realisasi.create', 'realisasi.edit']) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('realisasi.index') }}">
            @if (Auth::user()->rule == 'admin')
                <hr class="sidebar-divider">
                <i class="fas fa-scroll"></i>
                <span>List Target PPTK</span>
                {{-- @elseif (Auth::user()->jabatan == 'Kepala Diskominfo')
                <i class="fas fa-scroll"></i>
                <span>List Target PPTK</span>
                <hr class="sidebar-divider"> --}}
            @elseif (Auth::user()->rule == 'user' && Auth::user()->jabatan != 'Kepala Diskominfo')
                <hr class="sidebar-divider">
                <i class="fas fa-scroll"></i>
                <span>Realisasi Pertriwulan</span>
            @endif
        </a>
    </li>
    @if (Auth::user()->jabatan == 'Kepala Diskominfo')
        <li
            class="nav-item {{ in_array(Route::currentRouteName(), ['tindaklanjut.index', 'tindaklanjut.editProgram', 'tindaklanjut.editKegiatan']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('tindaklanjut.index') }}">
                <i class="fas fa-fw fa-chart-bar"></i>
                <span>MONEV</span></a>
        </li>
        @endif
    <li class="nav-item ">
        <a class="nav-link" href="{{ route('laporan.index') }}" method="POST">
            <i class="fas fa-fw fa-print"></i>
            <span>Laporan</span>
        </a>
    </li>
    {{-- <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable"
                aria-expanded="true" aria-controls="collapseTable">
                <i class="fas fa-fw fa-print"></i>
                <span>Laporan pertriwulan</span>
            </a>
            <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['realisasi.report-triwulanI']) ? 'active' : '' }}"
                        href="{{ route('report-triwulanI') }}" target="_blank" method="POST" class="nav-link">
                        <i class="fas fa-fw fa-download"></i>
                        <span>Laporan pertriwulan I</span></a>
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['realisasi.report-triwulanII']) ? 'active' : '' }}"
                        href="{{ route('report-triwulanII') }}" target="_blank" method="POST"><i
                            class="fas fa-fw fa-download"></i>
                        <span>Laporan pertriwulan II</span></a>
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['realisasi.report-triwulanIII']) ? 'active' : '' }}"
                        href="{{ route('report-triwulanIII') }}" target="_blank" method="POST"> <i
                            class="fas fa-fw fa-download"></i>
                        <span>Laporan pertriwulan III</span></a>
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['realisasi.report-triwulanIV']) ? 'active' : '' }}"
                        href="{{ route('report-triwulanIV') }}" target="_blank" method="POST"> <i
                            class="fas fa-fw fa-download"></i>
                        <span>Laporan pertriwulan IV</span></a>
                </div>
            </div>
        </li> --}}
    {{-- @endif --}}
    {{-- @if (Auth::user()->rule == 'admin')
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('laporan.index') }}" method="POST">
                <i class="fas fa-fw fa-print"></i>
                <span>Laporan</span>
            </a> --}}
    {{-- <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['realisasi.report']) ? 'active' : '' }}"
                        href="{{ route('report') }}" target="_blank" method="POST" class="nav-link">
                        <i class="fas fa-fw fa-download"></i>
                        <span>Rekap List Target</span></a>
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['subkegiatan.report-rencanaKerja']) ? 'active' : '' }}"
                        href="{{ route('report-rencanaKerja') }}" target="_blank" method="POST"> <i
                            class="fas fa-fw fa-download"></i>
                        <span>Laporan Rencana Kerja</span></a>
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['subkegiatan.report-evaluasiRenja']) ? 'active' : '' }}"
                        href="{{ route('report-evaluasiRenja') }}" target="_blank" method="POST"><i
                            class="fas fa-fw fa-download"></i>
                        <span>Laporan Evaluasi Renja</span></a>
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['kegiatan.report-kegiatan']) ? 'active' : '' }}"
                        href="{{ route('report-kegiatan') }}" target="_blank" method="POST"> <i
                            class="fas fa-fw fa-download"></i>
                        <span>Laporan DPA</span></a>
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['subkegiatan.report-subkegiatan']) ? 'active' : '' }}"
                        href="{{ route('report-subkegiatan') }}" target="_blank" method="POST"> <i
                            class="fas fa-fw fa-download"></i>
                        <span>Laporan IKI</span></a>
                    <a class="collapse-item {{ in_array(Route::currentRouteName(), ['golongan.report-golongan']) ? 'active' : '' }}"
                        href="{{ route('report-golongan') }}" target="_blank" method="POST"><i
                            class="fas fa-fw fa-download"></i>
                        <span>Laporan Kepegawaian</span></a>
                </div>
            </div> --}}
    {{-- </li>
    @endif --}}
</ul>
