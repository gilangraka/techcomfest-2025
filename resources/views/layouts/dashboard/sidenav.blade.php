{{-- Aside --}}
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark"> <!--begin::Sidebar Brand-->
    <div class="sidebar-brand"><a href="./index.html" class="brand-link"><span class="brand-text fw-light">TECHCOMFEST
                2025</span></a></div>
    <div class="sidebar-wrapper">
        <nav class="mt-2"> <!--begin::Sidebar Menu-->
            <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                <li class="nav-item"> <a href="{{ url('/') }}" class="nav-link"> <i
                            class="nav-icon bi bi-house"></i>
                        <p>
                            Home
                        </p>
                    </a>
                </li>
                <li class="nav-item"> <a href="{{ route('dashboard.index') }}"
                        class="nav-link {{ request()->routeIs('dashboard.index') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-speedometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-header">PAGES</li>

                @can('Manage')
                    @php
                        $manage = ['manage-team.index', 'manage-user.index', 'manage-independent.index'];
                    @endphp
                    <li class="nav-item {{ request()->routeIs($manage) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-database"></i>
                            <p>
                                Management
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('Manage User')
                                <li class="nav-item">
                                    <a href="{{ route('manage-user.index') }}"
                                        class="nav-link {{ request()->routeIs('manage-user.index') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-dot"></i>
                                        <p>Manage User</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Manage Team')
                                <li class="nav-item">
                                    <a href="{{ route('manage-team.index') }}"
                                        class="nav-link {{ request()->routeIs('manage-team.index') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-dot"></i>
                                        <p>Manage Team</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Manage Independent')
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="nav-icon bi bi-dot"></i>
                                        <p>Manage Independent</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                @can('Hasil Karya')
                    @php
                        $hasil_karya = ['karya-software.index', 'karya-multimedia.index', 'karya-network.index'];
                    @endphp
                    <li class="nav-item {{ request()->routeIs($hasil_karya) ? 'menu-open' : '' }}">
                        <a href="#" class="nav-link">
                            <i class="nav-icon bi bi-award"></i>
                            <p>
                                Hasil Karya
                                <i class="nav-arrow bi bi-chevron-right"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview">
                            @can('Hasil Multimedia')
                                <li class="nav-item">
                                    <a href="{{ route('hasil-multimedia.index') }}"
                                        class="nav-link {{ request()->routeIs('hasil-multimedia.index') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-dot"></i>
                                        <p>Multimedia</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Hasil Network')
                                <li class="nav-item">
                                    <a href="{{ route('hasil-network.index') }}"
                                        class="nav-link {{ request()->routeIs('hasil-network.index') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-dot"></i>
                                        <p>Network</p>
                                    </a>
                                </li>
                            @endcan
                            @can('Hasil Software')
                                <li class="nav-item">
                                    <a href="{{ route('hasil-software.index') }}"
                                        class="nav-link {{ request()->routeIs('hasil-software.index') ? 'active' : '' }}">
                                        <i class="nav-icon bi bi-dot"></i>
                                        <p>Software</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                @endcan

                <li class="nav-item">
                    <a href="{{ route('team.index') }}"
                        class="nav-link {{ request()->routeIs('team.index') ? 'active' : '' }}"> <i
                            class="nav-icon bi bi-people"></i>
                        <p>Team</p>
                    </a>
                </li>

                <hr class="my-3 text-white" />
                <li class="nav-item"> <a href="https://wa.me/6285742089646" class="nav-link" target="_blank"> <i
                            class="nav-icon bi bi-whatsapp"></i>
                        <p>Hubungi Kami</p>
                    </a> </li>
                <li class="nav-item">
                    <a onclick="document.getElementById('logout-form').submit()" href="#" class="nav-link">
                        <i class="nav-icon bi bi-box-arrow-left"></i>
                        <p>Sign Out</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>

<form id="logout-form" method="POST" action="{{ route('logout') }}">
    @csrf
    @method('delete')
</form>
{{-- End Aside --}}
