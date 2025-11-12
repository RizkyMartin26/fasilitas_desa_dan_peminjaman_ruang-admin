<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header text-center py-3">
            <span class="fw-semibold text-black fs-5">Bina Desa</span>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">

                <!-- Judul Menu -->
                <li class="sidebar-title">Contoh Admin:</li>

                <!-- Dashboard -->
                <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}" class="sidebar-link">
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Master Data -->
                <li class="sidebar-item has-sub
                    {{ request()->routeIs('fasilitas.*') || request()->routeIs('warga.*') ? 'active' : '' }}">
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
                    </ul>
                </li>

                <!-- Fitur Utama -->
                <li class="sidebar-item has-sub">
                    <a href="#" class="sidebar-link">
                        <i data-feather="layers" width="20"></i>
                        <span>Fitur Utama</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="#">Modul A</a></li>
                        <li><a href="#">Modul B</a></li>
                    </ul>
                </li>

            </ul>
        </div>

        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
