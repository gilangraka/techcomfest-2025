{{-- Aside --}}
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="light"> <!--begin::Sidebar Brand-->
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
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-dot"></i>
                                <p>Manage User</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('manage-team.index') }}"
                                class="nav-link {{ request()->routeIs('manage-team.index') ? 'active' : '' }}">
                                <i class="nav-icon bi bi-dot"></i>
                                <p>Manage Team</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon bi bi-dot"></i>
                                <p>Manage Independent</p>
                            </a>
                        </li>
                    </ul>
                </li>

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
