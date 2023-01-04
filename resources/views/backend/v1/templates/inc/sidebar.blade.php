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
        <li
            class="nav-item {{ in_array(Route::currentRouteName(), ['user.index', 'user.create', 'user.edit']) ? 'active' : '' }}">
            <a class="nav-link" href="{{ route('user.index') }}">
                <i class="fas fa-fw fa-users"></i>
                <span>USER</span></a>
        </li>
    @endif
    <li
        class="nav-item {{ in_array(Route::currentRouteName(), ['realisasi.index', 'realisasi.create', 'realisasi.edit']) ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('realisasi.index') }}">
            @if (Auth::user()->rule == 'admin')
                <hr class="sidebar-divider">
                <i class="fas fa-scroll"></i>
                <span>List Target PPTK</span>
            @else
                <i class="fas fa-scroll"></i>
                <span>Realisasi Pertriwulan</span>
            @endif
        </a>
    </li>
    @if (Auth::user()->rule == 'admin')
        <li class="nav-item {{ in_array(Route::currentRouteName(), ['realisasi.report']) ? 'active' : '' }}">
            <a href="{{ route('report') }}" target="_blank" method="POST" class="nav-link"><i
                    class="fas fa-fw fa-download"></i>
                <span>Rekap List Realisasi</span>
            </a>
        </li>
    @endif
</ul>
