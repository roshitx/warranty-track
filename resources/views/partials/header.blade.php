<header>
    <div id="header-sticky" class="header-area transparent-header pt-40 pb-40">
        <div class="container">
            <div class="row">
                <div class="col-xl-2 col-lg-1 d-flex align-items-center">
                    <div class="logo d-flex justify-content-center align-items-center">
                        <div class="logo-img">
                            <a href="index.html"> <img src="{{ asset('img/logo.svg') }}" alt="Warranty Tracker Logo"
                                    width="50"></a>
                        </div>
                        <div class="logo-text ms-3">
                            <h2 class="text-white fs-4">Warranty Tracker</h2>
                        </div>
                    </div>
                </div>
                <div class="col-xl-10 col-lg-11">
                    <div class="main-menu f-right">
                        <nav id="mobile-menu">
                            <ul>
                                <li><a href="#home">Home</a></li>
                                <li><a href="#features">Warranty Checker</a></li>
                                @auth
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                            Logout
                                        </a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                @endauth
                                @guest
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                @endguest
                            </ul>
                        </nav>
                    </div>
                </div>


                <div class="mobile-menu"></div>
            </div>
        </div>
    </div>
    </div>
</header>
