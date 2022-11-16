<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
<img src="{{ url('templates/backend')}}/img/logo/logo.png">
        </div>
        <div class="sidebar-brand-text mx-4">SI-EMON</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('beranda')}}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <li class="nav-item active">
        <a class="nav-link" href="{{route('program.index')}}">
          <i class="fas fa-tablet-alt"></i>
          <span>Program</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('kegiatan.index')}}">
          <i class="fas fa-fw fa-table"></i>
          <span>Kegiatan</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('realisasi.index')}}">
          <i class="fas fa-scroll"></i>
          <span>Realisasi</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="{{route('user.index')}}">
          <i class="fa-solid fa-user-plus"></i>
          <span>User</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tables</h6>
            <a class="collapse-item" href="simple-tables.html">Simple Tables</a>
            <a class="collapse-item" href="datatables.html">DataTables</a>
          </div>
        </div>
      </li>
      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>