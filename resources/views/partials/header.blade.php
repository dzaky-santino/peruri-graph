<style>
    html {
        scroll-behavior: smooth;
    }
</style>
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
                                    <li><a href="{{ url('/')}}#features">Feature</a></li>
                                    <li><a href="{{ url('/')}}#use-case">Use Case</a></li>
                                    <li><a href="{{ url('/')}}#contact">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4 col-4 text-left">
                        <div class="cp-header-area-right">
                            <a href="{{ route('form')}}" class="call-btn"><i class="icon-arrow"></i><span>Try it Now!</span></a>
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function(){
        // Fungsi untuk mengecek apakah sedang di homepage
        function isHomePage() {
            return window.location.pathname === '/' || 
                window.location.pathname === '/index.php' || 
                window.location.pathname === '/index.html';
        }

        // Handler untuk link navbar
        $("a[href*='#']").on('click', function(e) {
            var href = $(this).attr('href');
            var hashPart = href.split('#')[1]; // Mengambil bagian hash saja

            // Jika di homepage
            if (isHomePage()) {
                e.preventDefault();
                var targetElement = $('#' + hashPart);
                
                if (targetElement.length) {
                    $('html, body').animate({
                        scrollTop: targetElement.offset().top
                    }, 1000);
                }
            }
            // Jika di halaman lain, biarkan default behavior browser
            // yang akan redirect ke home dan langsung ke section yang dituju
        });

        // Jika ada hash di URL saat halaman load dan bukan di homepage
        if (window.location.hash && !isHomePage()) {
            var element = $(window.location.hash);
            if (element.length) {
                $(window).scrollTop(element.offset().top);
            }
        }
    });
</script>
