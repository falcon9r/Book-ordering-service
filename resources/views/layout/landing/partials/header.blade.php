
<!-- header -->
<header id="site-header" class="w3l-header-4 fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg stroke">
            <h1> <a class="navbar-brand" href="index.html">
                    Falcon
                </a></h1>
            <!-- if logo is image enable this
    <a class="navbar-brand" href="#index.html">
        <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
    </a> -->
            <button class="navbar-toggler  collapsed bg-gradient" type="button" data-toggle="collapse"
                    data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                <span class="navbar-toggler-icon fa icon-expand fa-bars"></span>
                <span class="navbar-toggler-icon fa icon-close fa-times"></span>
                </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mx-lg-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                    </li>
                <ul class="navbar-nav search-right mt-lg-0 mt-2">
                    <li class="nav-item mr-3" title="Search"><a href="#search" class="btn search-search">
                            <span class="fa fa-search" aria-hidden="true"></span></a></li>
                    <li class="nav-item">
                        @if(\Illuminate\Support\Facades\Auth::user() == null)
                        <a href="{{ route('login') }}" class="btn btn-primary d-none d-lg-block btn-style">Login</a>
                        @else
                            <a href="{{ route('profile') }}" class="btn btn-primary d-none d-lg-block btn-style">Profile</a>
                        @endif
                    </li>

                </ul>

                <!-- //toggle switch for light and dark theme -->
                <!-- search popup -->
                <div id="search" class="pop-overlay">
                    <div class="popup">
                        <form action="{{ route('search') }}" method="Get" class="d-sm-flex">
                            <input type="search" placeholder="Search.." name="search" required="required" autofocus>
                            <button type="submit">Search</button>
                            <a class="close" href="#url">&times;</a>
                        </form>
                    </div>
                </div>
                <!-- /search popup -->
            </div>
            <!-- toggle switch for light and dark theme -->
            <div class="mobile-position">
                <nav class="navigation">
                    <div class="theme-switch-wrapper">
                        <label class="theme-switch" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="mode-container">
                                <i class="gg-sun"></i>
                                <i class="gg-moon"></i>
                            </div>
                        </label>
                    </div>
                </nav>
            </div>
            <!-- //toggle switch for light and dark theme -->
        </nav>
    </div>
</header>
<!-- //header -->