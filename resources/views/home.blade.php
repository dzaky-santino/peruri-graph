@extends('layouts.app')

@section('title', 'Home - Peruri Graph Analytics')

<style>
    .whatsapp-button {
        display: flex;
        align-items: center;
        justify-content: center;
        background-color: #3639DF; /* Warna hijau khas WhatsApp */
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
        background-color: #101444; /* Warna hijau yang lebih gelap saat hover */
        transform: scale(1.05); /* Efek zoom saat hover */
        color: white;
    }

    .whatsapp-icon {
        width: 25px; /* Sesuaikan ukuran ikon */
        height: auto;
        margin-right: 10px;
    }

    /* Styling untuk accordion */
    .custom-accordion .accordion-item {
        border: 1px solid #E3E3E3;
        border-radius: 0;
        margin-bottom: 0;
    }

    /* Styling tombol accordion */
    .custom-accordion .accordion-button {
        background-color: white;
        color: #101444;
        font-weight: 500;
        padding: 15px 20px;
        border-radius: 0;
        border: none;
    }

    /* Saat tombol accordion dibuka */
    .custom-accordion .accordion-button:not(.collapsed) {
        background-color: #3639DF; /* Warna saat aktif */
        color: white;
    }

    /* Styling konten accordion */
    .custom-accordion .accordion-body {
        padding: 20px;
        background-color: #F9F9F9;
    }

    /* Styling isi accordion */
    .accordion-content .content-item {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #E3E3E3;
    }

    .accordion-content .content-item:last-child {
        margin-bottom: 0;
        padding-bottom: 0;
        border-bottom: none;
    }

    .accordion-content strong {
        display: block;
        margin-bottom: 5px;
        color: #101444;
    }

    .content-description {
        padding-left: 15px;
        color: #6c757d;
        text-align: justify;
    }
    .accordion-collapse.show {
        display: block !important;
        visibility: visible !important;
        height: auto !important;
        opacity: 1 !important;
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
                            <span class="separator">|</span>
                            <span>Unleash Your Data's Potential,</span>
                            <span>Node by Node, </span>
                            <span>for a Graph-Powered Advantage</span>
                            <span class="separator">|</span>
                            <span>Unleash Your Data's Potential,</span>
                            <span>Node by Node, </span>
                            <span>for a Graph-Powered Advantage</span>
                            <span class="separator">|</span>
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
                <div class="row align-items-center justify-content-center"> <!-- Tambahkan justify-content-center -->
                    <!-- Kolom untuk teks -->
                    <div class="col-md-6 col-12">
                        <div class="service-item wow fadeInUp" data-wow-duration="1000ms">
                            <div class="service-text">
                                <h3>Experience the difference with our exceptional product</h3>
                                <p style="color: white; text-align:justify;">Choosing the right database is essential in data processing. 
                                    Graph Database enables efficient handling of complex relationships between data, 
                                    unlike the rigid structure of RDBMS. With enhanced analytical capabilities, 
                                    it offers the speed and scalability necessary for managing interconnected data. 
                                    Our product transforms your data interaction, making it more intuitive and responsive. 
                                    Explore further to discover how Graph Database can elevate your data processing experience.
                                </p>
                                <a href="{{ route('experience')}}" class="read-more">See Details</a>
                            </div>
                        </div>
                    </div>
                    <!-- Kolom untuk gambar -->
                    <div class="col-md-6 col-12 d-none d-md-block">
                        <div class="service-image wow fadeInUp" data-wow-duration="1000ms">
                            <img src="{{ asset('images/image9.png')}}" style="width: 90%">
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
            <div class="row justify-content-center">
                <div class="col-xl-5 col-lg-8 col-12">
                    <div class="ch-top-title">
                        <h2 class="site-split-text ch-split-in-right" id="features">Our Features</h2>
                    </div>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="skill-card wow fadeInUp" data-wow-duration="1000ms">
                        <div class="skill-icon">
                            <img src="{{ asset('images/image2.png')}}">
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
                            <img src="{{ asset('images/image3.png')}}">
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
                            <img src="{{ asset('images/image4.png')}}">
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
                            <img src="{{ asset('images/image5.png')}}">
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
                            <img src="{{ asset('images/image6.png')}}">
                        </div>
                        <div class="skill-text">
                            <h3>Eliminate Joins, Simplify Querying</h3>
                            <p>Easily transform and analyze your data with our simple query language, requiring much less code than SQL.</p>
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
                        <P class="wow fadeInUp" style="color: #101444; font-size: 18px;">Graph Analytics is a technology that enables the analysis and understanding of relationships 
                            and patterns within complex data. Unlike traditional data analysis, which focuses on individual entities, 
                            Graph Analytics emphasizes the relationships between those entities. 
                            This makes it particularly useful for identifying patterns, networks, 
                            and trends that are not visible through more linear data analysis methods.
                        </P>
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
                                <h2><a href="{{ route('fraud')}}">Fraud Detection</a></h2>
                                <p>Fraud is a financial drain, a risk for businesses and consumers alike. 
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
                                <h2><a href="{{ route('recommendation')}}">Recommendation Engine</a></h2>
                                <p>Today’s retailers face a number of complex and emerging challenges. 
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

            <!-- Accordion Section starts -->
            <div class="accordion-section ptb-60">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-8 col-lg-10 col-12">
                            <div class="ch-top-title text-center mb-5">
                                <h2 class="site-split-text ch-split-in-right" style="color: #262EAC">Use Cases (Sector)</h2>
                            </div>
                            
                            <div class="accordion custom-accordion wow fadeInUp" id="accordionExample">
                                <!-- Finance Accordion Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            1. Finance 
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-unstyled accordion-content">
                                                <li class="content-item">
                                                    <strong>Fraud Detection:</strong> 
                                                    <div class="content-description">Graph Analytics helps financial institutions detect fraudulent activities by analyzing transaction patterns and identifying suspicious relationships between accounts. This enables real-time monitoring and quick response to potential fraud.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Risk Management:</strong> 
                                                    <div class="content-description">By mapping out relationships between various financial entities, Graph Analytics allows organizations to assess and manage risks more effectively, identifying potential vulnerabilities in their networks.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Customer Segmentation:</strong>
                                                    <div class="content-description">Financial institutions can use Graph Analytics to segment customers based on their behaviors and relationships, enabling targeted marketing strategies and personalized services.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Anti-Money Laundering (AML):</strong>
                                                    <div class="content-description">Financial organizations utilize Graph Analytics to identify and prevent money laundering activities by analyzing transaction networks and detecting unusual patterns that may indicate illicit behavior.</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Retail Accordion Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            2. Retail
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-unstyled accordion-content">
                                                <li class="content-item">
                                                    <strong>Customer Recommendation Systems:</strong>
                                                    <div class="content-description">Retailers utilize Graph Analytics to analyze customer behavior and preferences, providing personalized product recommendations that enhance the shopping experience and increase sales.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Supply Chain Optimization:</strong>
                                                    <div class="content-description">By visualizing the relationships between suppliers, products, and customers, Graph Analytics helps retailers optimize their supply chain processes, reducing costs and improving efficiency.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Market Basket Analysis:</strong>
                                                    <div class="content-description">Retailers can analyze the purchasing patterns of customers to identify which products are frequently bought together, allowing for strategic placement and promotions.</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Healthcare Accordion Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            3. Healthcare
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-unstyled accordion-content">
                                                <li class="content-item">
                                                    <strong>Patient Relationship Management:</strong>
                                                    <div class="content-description">Graph Analytics enables healthcare providers to understand the relationships between patients, treatments, and outcomes, leading to improved patient care and personalized treatment plans.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Disease Outbreak Prediction:</strong>
                                                    <div class="content-description">By analyzing the connections between individuals and their health data, Graph Analytics can help predict and track disease outbreaks, facilitating timely interventions.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Clinical Trial Optimization:</strong>
                                                    <div class="content-description">Researchers can use Graph Analytics to identify suitable candidates for clinical trials by analyzing patient data and their relationships with specific conditions or treatments.</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Telecommunications Accordion Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFour">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            4. Telecommunications
                                        </button>
                                    </h2>
                                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-unstyled accordion-content">
                                                <li class="content-item">
                                                    <strong>Churn Prediction:</strong>
                                                    <div class="content-description">Telecom companies can analyze customer relationships and usage patterns to predict churn, allowing them to implement retention strategies proactively.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Network Optimization:</strong>
                                                    <div class="content-description">Graph Analytics helps telecom providers visualize and optimize their network infrastructure by analyzing the relationships between different network components and user demands.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Fraud Detection:</strong>
                                                    <div class="content-description">Similar to finance, telecom companies can use Graph Analytics to detect fraudulent activities, such as SIM card cloning or unauthorized usage, by monitoring call patterns and relationships.</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Social Media Accordion Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingFive">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            5. Social Media
                                        </button>
                                    </h2>
                                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-unstyled accordion-content">
                                                <li class="content-item">
                                                    <strong>Claims Processing Optimization:</strong>
                                                    <div class="content-description">Graph Analytics can streamline the claims processing workflow by mapping out the relationships between claimants, adjusters, and service providers, leading to faster and more efficient claim resolutions.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Customer Segmentation:</strong>
                                                    <div class="content-description">Insurers use Graph Analytics to segment customers based on their behaviors and relationships, allowing for more targeted marketing strategies and personalized insurance products.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Risk Assessment and Underwriting:</strong>
                                                    <div class="content-description">By analyzing the connections between various risk factors, Graph Analytics helps insurers improve their underwriting processes, enabling them to make more informed decisions about policy approvals and pricing.</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <!-- Government Accordion Item -->
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingSix">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                            6. Government
                                        </button>
                                    </h2>
                                    <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <ul class="list-unstyled accordion-content">
                                                <li class="content-item">
                                                    <strong>Public Safety and Crime Analysis:</strong>
                                                    <div class="content-description">Graph Analytics is used to analyze crime patterns and relationships between incidents, helping law enforcement agencies identify hotspots and allocate resources more effectively to enhance public safety.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Fraud Detection in Welfare Programs:</strong>
                                                    <div class="content-description">Government agencies utilize Graph Analytics to detect fraudulent claims in welfare programs by examining relationships between beneficiaries and identifying suspicious patterns in claims data.</div>
                                                </li>
                                                <li class="content-item">
                                                    <strong>Infrastructure Management:</strong>
                                                    <div class="content-description">Graph Analytics assists in managing and optimizing public infrastructure by analyzing the relationships between various infrastructure components, such as roads, utilities, and public transport systems, to improve maintenance and service delivery.</div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Accordion Section ends -->      

        </div> <!-- end container -->
    </section>
    <!-- end ch-blog-area -->

    <!-- start contact-pg-section -->
    <section class="contact-pg-section">
        <div class="container">
            <div class="office-info ptb-120">
                <div class="row">
                    <h2 class="site-split-text ch-split-in-up" id="contact">Contact</h2>  
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
                                <p><a href="mailto:cs.digital@peruri.co.id" style="color: #101444">cs.digital@peruri.co.id</a></p>
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