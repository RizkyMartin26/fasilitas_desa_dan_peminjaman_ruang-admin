<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header text-center py-3">
            <span class="fw-semibold text-black fs-5">Bina Desa</span>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">

                <!-- Judul Menu -->
                <li class="sidebar-title">Admin:</li>

                <!-- Dashboard -->
                <li class="sidebar-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a href="{{ route('dashboard') }}" class="sidebar-link">
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Master Data -->
                <li
                    class="sidebar-item has-sub
                    {{ request()->routeIs('fasilitas.*') || request()->routeIs('warga.*') || request()->routeIs('petugas.*')
                        ? 'active'
                        : '' }}">
                    <a href="#" class="sidebar-link">
                        <i data-feather="database" width="20"></i>
                        <span>Master Data</span>
                    </a>
                    <ul class="submenu">
                        <li>
                            <a href="{{ route('fasilitas.index') }}"
                                class="{{ request()->routeIs('fasilitas.*') ? 'active' : '' }}">
                                Fasilitas Umum
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('warga.index') }}"
                                class="{{ request()->routeIs('warga.*') ? 'active' : '' }}">
                                Warga
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('peminjaman.index') }}"
                                class="{{ request()->routeIs('peminjaman.*') ? 'active' : '' }}">
                                Peminjaman Fasilitas
                            </a>

                        </li>
                    </ul>
                </li>

                <!-- Peminjaman -->

            </ul>
        </div>

        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
