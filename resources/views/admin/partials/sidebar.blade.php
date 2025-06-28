<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center py-2">
        <div class="row no-gutters">
            <div class="col-12">
                <span class="brand-text font-weight-bold" style="font-size: 30px; line-height: 1.2">MORAMU</span>
            </div>
            <div class="col-12">
                <span class="brand-text font-weight-light" style="font-size: 17px; line-height: 1.1">Monitoring RA
                    Mathiyyatul Ulum</span>
            </div>
        </div>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link{{ request()->routeIs('dashboard') ? ' active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                            {{-- <i class="right fas fa-angle-left"></i> --}}
                        </p>
                    </a>
                </li>
                @if (Auth::user()->role_id == 1)
                    <li class="nav-header">MASTER DATA</li>
                    <li class="nav-item{{ request()->routeIs(['siswa', 'guru']) ? ' menu-open' : '' }}">
                        <a href="#" class="nav-link{{ request()->routeIs(['siswa', 'guru']) ? ' active' : '' }}">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Kelola Pengguna
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('siswa') }}"
                                    class="nav-link{{ request()->routeIs('siswa') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Siswa</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('guru') }}"
                                    class="nav-link{{ request()->routeIs('guru') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Guru</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('laporan') }}"
                            class="nav-link{{ request()->routeIs(['laporan']) ? ' active' : '' }}">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                Laporan Perekembangan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('laporanIq') }}"
                            class="nav-link{{ request()->routeIs(['laporanIq']) ? ' active' : '' }}">
                            <i class="nav-icon fas fa-folder-open"></i>
                            <p>
                                Laporan IQ
                            </p>
                        </a>
                    </li>
                @endif
                @if (Auth::user()->role_id == 2)
                    <li class="nav-header">MAIN DATA</li>
                    <li class="nav-item">
                        <a href="{{ route('perkembangan') }}"
                            class="nav-link{{ request()->routeIs(['perkembangan']) ? ' active' : '' }}">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Perkembangan
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('testiq') }}"
                            class="nav-link{{ request()->routeIs(['testiq']) ? ' active' : '' }}">
                            <i class="nav-icon fas fa-award"></i>
                            <p>
                                Test IQ
                            </p>
                        </a>
                    </li>
                    <li class="nav-item{{ request()->routeIs(['rekomendasi', 'feedback']) ? ' menu-open' : '' }}">
                        <a href="#"
                            class="nav-link{{ request()->routeIs(['rekomendasi', 'feedback']) ? ' active' : '' }}">
                            <i class="nav-icon fas fa-shapes"></i>
                            <p>
                                Rekomendasi
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('rekomendasi') }}"
                                    class="nav-link{{ request()->routeIs('rekomendasi') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Rekomendasi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('feedback') }}"
                                    class="nav-link{{ request()->routeIs('feedback') ? ' active' : '' }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Feedback</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
