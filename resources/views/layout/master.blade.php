@extends('layout.basic')

@section("main")

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <div class="container" data-layout="container">
            <script>
                var isFluid = JSON.parse(localStorage.getItem('isFluid'));
                if (isFluid) {
                    var container = document.querySelector('[data-layout]');
                    container.classList.remove('container');
                    container.classList.add('container-fluid');
                }
            </script>
            <nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
                <script>
                    var navbarStyle = localStorage.getItem("navbarStyle");
                    if (navbarStyle && navbarStyle !== 'transparent') {
                        document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
                    }
                </script>
                <div class="d-flex align-items-center">
                    <div class="toggle-icon-wrapper">

                        <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip"
                                data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span
                                    class="toggle-line"></span></span></button>

                    </div>
                    <a class="navbar-brand" href="../index.html">
                        <div class="d-flex align-items-center py-3"><img class="me-2"
                                                                         src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}"
                                                                         alt="" width="40"/><span class="font-sans-serif">falcon</span>
                        </div>
                    </a>
                </div>
                <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
                    <div class="navbar-vertical-content scrollbar">
                        <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
                            <li class="nav-item">
                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#dashboard" role="button"
                                                       data-bs-toggle="collapse" aria-expanded="false"
                                                       aria-controls="dashboard">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                class="fas fa-chart-pie"></span></span><span class="nav-link-text ps-1">Settings</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="dashboard">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('profile') }}" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span
                                                    class="nav-link-text ps-1">Profile</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('settings') }}"
                                                            aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Edit Personal data</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <!-- parent pages--><a class="nav-link dropdown-indicator" href="#mybook" role="button"
                                                           data-bs-toggle="collapse" aria-expanded="false"
                                                           aria-controls="email">
                                        <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                        class="fas fa-book"></span></span><span class="nav-link-text ps-1">Books</span>
                                        </div>
                                    </a>
                                    <ul class="nav collapse false" id="mybook">
                                        <li class="nav-item"><a class="nav-link" href="{{ route('user.books.index') }}" aria-expanded="false">
                                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All</span>
                                                </div>
                                            </a>
                                            <!-- more inner pages-->
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('user.books.create') }}" aria-expanded="false">
                                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create</span>
                                                </div>
                                            </a>
                                            <!-- more inner pages-->
                                        </li>
                                        <li class="nav-item"><a class="nav-link" href="{{ route('user.orders.index') }}" aria-expanded="false">
                                                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Orders</span>
                                                </div>
                                            </a>
                                            <!-- more inner pages-->
                                        </li>
                                    </ul>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <!-- label-->
                                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                    <div class="col-auto navbar-vertical-label">App
                                    </div>
                                    <div class="col ps-0">
                                        <hr class="mb-0 navbar-vertical-divider"/>
                                    </div>
                                </div>

                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#book" role="button"
                                                       data-bs-toggle="collapse" aria-expanded="false"
                                                       aria-controls="email">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                    class="fas fa-book"></span></span><span class="nav-link-text ps-1">Books</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="book">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('basket') }}" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Basket</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('client.orders.index') }}" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">My Orders</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Search and recommendations</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <!-- label-->
                                <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
                                    <div class="col-auto navbar-vertical-label">Common
                                    </div>
                                    <div class="col ps-0">
                                        <hr class="mb-0 navbar-vertical-divider"/>
                                    </div>
                                </div>

                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#Authors" role="button"
                                                       data-bs-toggle="collapse" aria-expanded="false"
                                                       aria-controls="email">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                    class="fas fa-book"></span></span><span class="nav-link-text ps-1">Authors</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="Authors">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('common.authors.index') }}" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('common.authors.create') }}" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>


                                <!-- parent pages--><a class="nav-link dropdown-indicator" href="#Categories" role="button"
                                                       data-bs-toggle="collapse" aria-expanded="false"
                                                       aria-controls="email">
                                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span
                                                    class="fas fa-book"></span></span><span class="nav-link-text ps-1">Categories</span>
                                    </div>
                                </a>
                                <ul class="nav collapse false" id="Categories">
                                    <li class="nav-item"><a class="nav-link" href="{{ route('common.categories.index') }}" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">All</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                    <li class="nav-item"><a class="nav-link" href="{{ route('common.categories.create') }}" aria-expanded="false">
                                            <div class="d-flex align-items-center"><span class="nav-link-text ps-1">Create</span>
                                            </div>
                                        </a>
                                        <!-- more inner pages-->
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">

                    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button"
                            data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse"
                            aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation">
                        <span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
                    <a class="navbar-brand me-1 me-sm-3" href="../index.html">
                        <div class="d-flex align-items-center"><img class="me-2"
                                                                    src="{{ asset('assets/img/icons/spot-illustrations/falcon.png') }}"
                                                                    alt="" width="40"/><span
                                class="font-sans-serif">falcon</span>
                        </div>
                    </a>
                    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
                        </li class="nav-item">
                            @if(auth()->user() != null)
                                {{ auth()->user()->name }}
                            @else
                            <a href="{{ route('login') }}">
                                Login
                            </a>
                            @endif
                        </li>
                        <li class="nav-item">
                            <div class="theme-control-toggle fa-icon-wait ps-2">
                                <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle"
                                       type="checkbox" data-theme-control="theme" value="dark"/>
                                <label class="mb-0 theme-control-toggle-label theme-control-toggle-light"
                                       for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                       title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
                                <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark"
                                       for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left"
                                       title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
                            </div>
                        <li class="nav-item">
                    </ul>
                </nav>

                @yield("content")

                @yield("footer")

                <footer class="footer">
                    <div class="row g-0 justify-content-between fs--1 mt-4 mb-3">
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600">Book ordering service <span
                                    class="d-none d-sm-inline-block">| </span>
                                    <br class="d-sm-none"/>
                                    {{ \Carbon\Carbon::now()->year }} &copy; <a
                                    href="https://github.com/falcon9r">Mirzorasul Danierov</a></p>
                        </div>
                        <div class="col-12 col-sm-auto text-center">
                            <p class="mb-0 text-600">v1.0</p>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

@endsection
