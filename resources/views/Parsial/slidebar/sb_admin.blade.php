        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="sidebar-brand-text mx-3">TASKU <sup>admin</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard.admin')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Manage
            </div>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.Guru')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Guru</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.rombel')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Rombel</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.Siswa')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Siswa</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tahun_akademik')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Tahun Akademik</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('manage.mapel')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Manage Mata Pelajaran</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->