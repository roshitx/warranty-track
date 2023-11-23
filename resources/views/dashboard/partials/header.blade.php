        <!--sidebar wrapper -->
        <div class="sidebar-wrapper bg-dark" data-simplebar="true">
            <div class="sidebar-header bg-dark d-flex justify-content-center">
                    <img src="{{ asset('img/logo-revisi.png') }}" width="140" alt="logo icon">
            </div>
            <!--navigation-->
            <ul class="metismenu" id="menu">
                <li class="menu-label">Administrator</li>
                <li>
                    <a href="{{ route('overview') }}" class="{{ Request::is('dashboard') ? 'active' : '' }}">
                        <div class="parent-icon"><i class='bx bx-tachometer'></i>
                        </div>
                        <div class="menu-title">Dashboard</div>
                    </a>
                </li>

                <li>
                    <a href="{{ route('barang.index') }}" class="">
                        <div class="parent-icon"><i class='bx bx-cart'></i>
                        </div>
                        <div class="menu-title">Kelola Product</div>
                    </a>
                </li>
                    <li>
                        <a href="{{ route('users.index') }}"
                            class="{{ Request::is('dashboard/users*') ? 'active' : '' }}">
                            <div class="parent-icon"><i class='bx bx-group'></i>
                            </div>
                            <div class="menu-title">Kelola User</div>
                        </a>
                    </li>
                <li class="menu-label">Back to Landingpage</li>
                <li>
                    <a href="/" class="{{ Request::is('#') ? 'active' : '' }}">
                        <div class="parent-icon"><i class='bx bx-exit'></i>
                        </div>
                        <div class="menu-title">Home</div>
                    </a>
                </li>
            </ul>
            <!--end navigation-->
        </div>
        <!--end sidebar wrapper -->
        <!--start header -->
        <header>
            <div class="topbar d-flex align-items-center">
                <nav class="navbar navbar-expand bg-dark">
                    <div class="search-bar flex-grow-1">

                    </div>
                    <div class="top-menu ms-auto">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="header-notifications-list">

                                    </div>
                                </div>
                            </li>
                            <li class="nav-item dropdown dropdown-large">
                                <div class="dropdown-menu dropdown-menu-end">
                                    <div class="header-message-list">

                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="user-box dropdown">
                        <a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret"
                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="user-info ps-3">
                                <p class="user-name mb-0">{{ Auth::user()->username }}</p>
                                <p class="designattion mb-0">{{ Auth::user()->role }}</p>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); 
                                    document.getElementById('logout-form').submit();"><i
                                        class='bx bx-log-out-circle'></i><span>Logout</span></a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </header>
        <!--end header -->
