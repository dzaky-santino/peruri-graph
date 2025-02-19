@extends('layouts.app')

@section('title', 'Home - Peruri Graph Analytics')

<style>
    .whatsapp-button {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #034ea1; /* Warna hijau khas WhatsApp */
        color: white;
        font-size: 18px;
        font-weight: bold;
        text-decoration: none;
        padding: 14px 25px;
        border-radius: 12px; /* Membuat sudut rounded */
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2); /* Efek shadow */
        transition: background 0.3s ease-in-out, transform 0.2s ease;
        width: 250px; /* Atur lebar agar konsisten */
        text-align: center;
        margin-top: 50px;
    }

    .whatsapp-button:hover {
        background-color: #88c1fd; /* Warna hijau yang lebih gelap saat hover */
        transform: scale(1.05); /* Efek zoom saat hover */
    }

    .whatsapp-icon {
        width: 25px; /* Sesuaikan ukuran ikon */
        height: auto;
        margin-right: 10px;
    }
</style>

@section('content')
    <!-- start of hero -->
    <section class="ch-main-hero">
        <div class="container">
            <div class="ch-main-hero-wrap">
                <div class="row align-items-center">
                    <div class="col-xl-10 col-lg-10 col-12">    
                        <div class="ch-main-hero-text">
                            <h2 class="site-split-text ch-split-in-left">Peruri Graph Analytics</h2>
                            <p class="wow fadeInUp" data-wow-duration="1400ms">With Peruri Graph Analytics, 
                                we convert your data into a source of strength and a competitive edge for your business. 
                                Your data isn't just information; it's the key to your success.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="poligon-wrap wow zoomIn" data-wow-duration="1200ms">
                    <img src="{{ asset('images/image1.png')}}">
                </div>
            </div>
        </div>
    </section>
    <!-- end of hero slider -->

    <!-- start text-moving -->
    <div class="text-moving-sec">
        <div class="text-moving">
            <div class="marquee">
                <div class="track">
                    <div class="content">
                        <h1>
                            <span>Unleash Your Data's Potential,</span>
                            <span>Node by Node, </span>
                            <span>for a Graph-Powered Advantage</span>
                            <span>|</span>
                            <span>Unleash Your Data's Potential,</span>
                            <span>Node by Node, </span>
                            <span>for a Graph-Powered Advantage</span>
                            <span>|</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of text-moving -->

    <!-- start of service-area -->
    <section class="service-area ptb-120">
        <div class="container">
            <div class="service-wrap">
                <div class="row align-items-center">
                    <!-- Kolom untuk teks -->
                    <div class="col-md-6">
                        <div class="service-item wow fadeInUp" data-wow-duration="1000ms">
                            <div class="service-text">
                                <h3><a href="#">Experience the difference with our exceptional product</a></h3>
                                <p style="color: white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                <a href="#" class="read-more">See Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Kolom untuk gambar -->
                    <div class="col-md-6">
                        <div class="service-image text-center wow fadeInUp" data-wow-duration="1000ms">
                            <img src="{{ asset('images/image9.png')}}" alt="Service Image" class="img-fluid" style="max-width: 70%; border-radius: 10px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- end of service-area  -->

    <!-- start of ch-skill-area -->
    <section class="ch-skill-area ptb-120">
        <div class="container">
            <div class="ch-title-wrap">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-8 col-12">
                        <div class="ch-top-title">
                            {{-- <span>Our Features</span> --}}
                            <h2 class="site-split-text ch-split-in-right" id="features">Our Features</h2>
                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, 
                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris 
                                nisi ut aliquip ex ea commodo consequat.
                            </p> --}}
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-4 col-12">
                        {{-- <div class="ch-top-btn">
                            <a href="#" class="ch-btn-style-1 ch-btn-animated">See More</a>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="skill-wrap">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="skill-card wow fadeInUp" data-wow-duration="1000ms">
                            <div class="skill-icon">
                                <img src="{{ asset('images/image2.png')}}" style="width: 50px; margin-top: 10px;">
                            </div>
                            <div class="skill-text">
                                <h3>Graph Data Science</h3>
                                <p>Our powerful graph data science tool helps you make better predictions using your existing data.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="skill-card wow fadeInUp" data-wow-duration="1200ms">
                            <div class="skill-icon">
                                <img src="{{ asset('images/image3.png')}}" style="width: 50px;">
                            </div>
                            <div class="skill-text">
                                <h3>Easy Integration</h3>
                                <p>Effortlessly integrate our product into your workflow and boost your productivity.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="skill-card wow fadeInUp" data-wow-duration="1400ms">
                            <div class="skill-icon">
                                <img src="{{ asset('images/image4.png')}}" style="width: 50px; margin-top: 10px;">
                            </div>
                            <div class="skill-text">
                                <h3>Graph Database & Analytics</h3>
                                <p>Uncover hidden insights from your data with our innovative graph analysis tools.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="skill-card wow fadeInUp" data-wow-duration="1000ms">
                            <div class="skill-icon">
                                <img src="{{ asset('images/image5.png')}}" style="width: 50px; margin-top: 10px;">
                            </div>
                            <div class="skill-text">
                                <h3>Interactive Data Visualization</h3>
                                <p>Our intuitive data visualization tools bring your data to life, making it easy to understand and share.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="skill-card wow fadeInUp" data-wow-duration="1200ms">
                            <div class="skill-icon">
                                <img src="{{ asset('images/image6.png')}}" style="width: 50px; margin-top: 10px;">
                            </div>
                            <div class="skill-text">
                                <h3>Eliminate Joins, Simplify Querying</h3>
                                <p>Easily transform and analyze your data with our simple query language, requiring much less code than SQL.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of ch-skill-area  -->

    <!-- start text-moving -->
    <div class="text-moving-sec-s2">
        <div class="text-moving">
            <div class="marquee">
                <div class="track">
                    <div class="content">
                        <h1>
                            <span>GRAPH DATA SCIENCE</span>
                            <span>EASY INTEGRATION</span>
                            <span>GRAPH DATABASE & ANALYTICS</span>
                            <span>INTERACTIVE DATA VISUALIZATION</span>
                            <span>ELIMINATE JOINS, SIMPLIFY QUERYING</span>
                            <span>GRAPH DATA SCIENCE</span>
                            <span>EASY INTEGRATION</span>
                            <span>GRAPH DATABASE & ANALYTICS</span>
                            <span>INTERACTIVE DATA VISUALIZATION</span>
                            <span>ELIMINATE JOINS, SIMPLIFY QUERYING</span>
                        </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of text-moving -->

    <!-- start ch-blog-area -->
    <section class="ch-blog-area ptb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-6 col-12">
                    <div class="ch-top-title-s2">
                        <h2 class="site-split-text ch-split-in-up" id="use-case">Our Use Case</h2>
                        <P class="blog-item wow fadeInUp">Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit doloribus ea ipsum nostrum, earum architecto, fuga libero vitae illum iure magni aut debitis asperiores assumenda obcaecati officia aliquid. Modi, iure?</P>
                    </div>
                </div>
            </div>
            <div class="blog-items">
                <div class="row">
                    <div class="col col-xl-6 col-lg-12 col-md-12 col-12">
                        <div class="blog-item wow fadeInUp" data-wow-duration="1200ms">
                            <div class="blog-img-left">
                                <div class="blog-img">
                                    <img src="{{ asset('images/image7.png')}}">
                                </div>
                            </div>
                            <div class="blog-content">
                                <h2><a href="{{ route('fraud')}}">Fraud Detection</a>
                                </h2>
                                <p style="text-align: justify;">Fraud is a financial drain, a risk for businesses and consumers alike. 
                                    With fraud attempts skyrocketing, how can you identify fraud in time to stop it? 
                                    Graph-based approaches to detecting fraud analyze complex linkages between people, 
                                    transactions, and institutions.
                                </p>
                                <a href="{{ route('fraud')}}" class="ch-btn-style-3 ch-btn-animated">Learn More</a>                           </div>
                        </div>
                    </div>
                    <div class="col col-xl-6 col-lg-12 col-md-12 col-12">
                        <div class="blog-item wow fadeInUp" data-wow-duration="1400ms">
                            <div class="blog-img-left">
                                <div class="blog-img">
                                    <img src="{{ asset('images/image8.png')}}">
                                </div>
                            </div>
                            <div class="blog-content">
                                <h2><a href="{{ route('recommendation')}}">Recommendation Engine</a>
                                </h2>
                                <p style="text-align: justify;">Today’s retailers face a number of complex and emerging challenges. 
                                    To remain viable, they must be nimble enough to face their colossal 
                                    online competition while also addressing another new reality: 
                                    The customer is now at the center of the value chain.
                                </p>
                                <a href="{{ route('recommendation')}}" class="ch-btn-style-3 ch-btn-animated">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end ch-blog-area -->

    <!-- start contact-pg-section -->
    <section class="contact-pg-section section-padding" style="margin-top: -250px;">
        <div class="container">
            <div class="office-info ptb-120">
                <div class="row">
                    <h2 class="site-split-text ch-split-in-up" id="contact" style="text-align: center; font-size: 48px; font-weight: 700; margin-bottom:25px;">Contact</h2>  
                    <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
                        <div class="office-info-item wow fadeInUp">
                            <div class="office-info-icon">
                                <div class="icon">
                                    <i class="icon-Group-7044"></i>
                                </div>
                            </div>
                            <div class="office-info-text">
                                <h2>Address</h2>
                                <p>Jl. Palatehan No. 4, Blok K-V, Kebayoran Baru, Jakarta</p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
                        <div class="office-info-item wow fadeInUp">
                            <div class="office-info-icon">
                                <div class="icon">
                                    <i class="icon-Group-7043"></i>
                                </div>
                            </div>
                            <div class="office-info-text">
                                <h2>E-mail <br> (Contact Center)</h2>
                                <p><a href="mailto:cs.digital@peruri.co.id" style="color: black">cs.digital@peruri.co.id</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col col-xl-4 col-lg-6 col-md-6 col-12">
                        <div class="office-info-item wow fadeInUp">
                            <div class="office-info-icon">
                                <div class="icon">
                                    <i class="icon-Group-7043"></i>
                                </div>
                            </div>
                            <div class="office-info-text">
                                <h2>E-mail <br> (Marketing)</h2>
                                <p><a href="mailto:digitalchannel@peruri.co.id" style="color: black">digitalchannel@peruri.co.id</a></p>
                            </div>
                        </div>
                    </div>
                    <center><a href="https:wa.link/ts5kog" target="_blank" class="whatsapp-button wow fadeInUp">Whatsapp Chat</a></center>
                </div>
            </div>
        </div> <!-- end container -->
    </section>
    <!-- end contact-pg-section -->
@endsection
