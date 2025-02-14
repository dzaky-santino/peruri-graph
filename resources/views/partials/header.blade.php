<header class="cp-header-area cp-header-style-1">
    <div id="cp-header-sticky" class="menu-area">
        <div class="container">
            <div class="second-menu">
                <div class="row align-items-center">
                    <div class="col-xl-2 col-lg-2 col-md-7 col-7">
                        <div class="logo">
                            <a href="{{ url('/')}}"><img src="{{ asset('images/logo.png')}}" alt="logo"></a>
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-7 col-md-1 col-1 text-right text-xl-right">
                        <div class="main-menu">
                            <nav id="mobile-menu">
                                <ul class="nav">
                                    <li><a href="{{ url('/')}}">Home</a></li>
                                    <li><a href="#">Feature</a></li>
                                    <li class="has-submenu">
                                        <a href="#">Use Case</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ route('recommendation')}}">Recommendation Engine</a></li>
                                            <li><a href="#">Fraud Detection</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="#">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-4 text-left">
                        <div class="cp-header-area-right">
                            <a href="#" class="call-btn"><i class="icon-arrow"></i><span>Try it Now!</span></a>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mobile-menu"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- end of header -->