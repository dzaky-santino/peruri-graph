@extends('layouts.app')

@section('title', 'Fraud Detection - Peruri Graph Analytics')

@section('content')

<style>
    /* Style asli Anda */
    .section-container {
        padding: 50px 20px;
    }

    .section-title {
        font-size: 28px;
        font-weight: bold;
        color: #101444;
        text-align: center;
    }

    .underline {
        width: 50px;
        height: 3px;
        background-color: #3639DF;
        margin: 10px auto 30px auto;
    }

    .card-container {
        display: flex;
        justify-content: center;
        flex-wrap: wrap;
        gap: 20px;
    }

    .card {
        background-color: #3639DF;
        color: white;
        width: 250px;
        height: 200px;
        border-radius: 10px;
        padding: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease-in-out;
    }

    .card img {
        width: 50px;
        margin-bottom: 10px;
    }

    .card p {
        flex-grow: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        color: whitesmoke;
    }

    .card:hover {
        transform: translateY(-5px);
    }

    .use-case-container {
        padding: 0 0px 0 20px;
        max-width: 1200px;
        margin: 0 auto;
        background-color: #3639DF;
        border-radius: 20px;
    }

    .use-case-container .description {
        font-size: 16px;
        word-spacing: 5px;
        line-height: 33px;
    }

    .use-case-container .content-wrapper .fraud-title {
        font-size: 40px;
        font-weight: 900;
        color: white;
    }

    .content-wrapper {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
    }

    .text-section {
        max-width: 50%;
    }

    .description {
        font-size: 15px;
        line-height: 1.5;
        color: white;
        text-align: justify;
    }

    .image-section {
        max-width: 400px;
        display: flex;
        justify-content: center;
    }

    .image {
        width: 100%;
        height: auto;
        border-radius: 20px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.5);
    }

    .fraud-card {
        display: flex;
        align-items: center;
        justify-content: space-between;
        background: white;
        border-radius: 15px;
        padding: 25px;
        margin-bottom: 25px;
        box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
    }

    .fraud-text {
        width: 50%;
        text-align: justify;
        padding: 20px;
    }

    .fraud-text h3 {
        font-size: 30px;
        font-weight: 900;
        color: #101444;
        margin-bottom: 10px;
    }

    .fraud-text p {
        font-size: 15px;
        color: #666;
        line-height: 30px;
    }

    .fraud-image {
        width: 30%;
        display: flex;
        justify-content: center;
    }

    .fraud-image img {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
    }

    /* Tambahan responsif */
    @media (max-width: 1200px) {
        .use-case-container {
            padding: 20px;
        }
    }

    @media (max-width: 992px) {
        .text-section {
            max-width: 100%;
        }

        .image-section {
            max-width: 100%;
        }

        .fraud-card {
            flex-direction: column;
        }

        .fraud-text {
            width: 100%;
            padding: 20px 0;
        }

        .fraud-image {
            width: 80%;
            margin-top: 20px;
        }
    }

    @media (max-width: 768px) {
        .section-title {
            font-size: 24px;
        }

        .use-case-container .content-wrapper .fraud-title {
            font-size: 28px;
        }

        .use-case-container .description {
            font-size: 14px;
            line-height: 28px;
        }

        .fraud-text h3 {
            font-size: 24px;
        }

        .card {
            width: calc(50% - 20px);
            min-width: 200px;
        }
    }

    @media (max-width: 576px) {
        .card {
            width: 100%;
        }

        .fraud-text h3 {
            font-size: 20px;
        }

        .fraud-text p {
            font-size: 14px;
            line-height: 24px;
        }

        .fraud-image {
            width: 100%;
        }

        .use-case-container {
            padding: 15px;
        }
    }
</style>

<!-- start page-title -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="breadcumb-wrap">
                    <h2>Use Case</h2>
                    <ol>
                        <li><a href="{{ url('/')}}"><i class="icon-36"></i> Home</a></li>
                        <li>Fraud Detection</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page-title -->

<!-- start blog-single-page-area -->
<section class="blog-single-page-area full-width ptb-120">
    <div class="container-blog">
        <div class="row justify-content-center">
            <div class="col col-lg-10 col-md-12 col-12">
                <div class="blog-single-wrap">
                    <div class="blog-single-text">
                        <div class="blog-img">
                            <section class="use-case-container">
                                <div class="content-wrapper">
                                    <div class="text-section">
                                        <h2 class="fraud-title">Uses Cases: Fraud Detection</h2>
                                        <p class="description">
                                            Fraud is a financial drain, a risk for businesses and consumers alike. With fraud attempts skyrocketing, how can you identify fraud in time to stop it? 
                                            Graph-based approaches to detecting fraud analyze complex linkages between people, transactions, and institutions. 
                                            Peruri Graph Analytics effectively reveals patterns of fraud and surfaces anomalies.
                                        </p>
                                    </div>
                                    <div class="image-section">
                                        <!-- Ganti dengan gambar Anda -->
                                        <img src="{{ asset('images/image7.png')}}" class="image">
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                    <section class="section-container">
                        <h2 class="section-title">What will You Do</h2>
                        <div class="underline"></div>
                
                        <div class="card-container">
                            <div class="card">
                                <img src="{{ asset('images/search.png')}}">
                                <p>Discover how a top fintech company reduces manual investigation and finds more fraud</p>
                            </div>
                            <div class="card">
                                <img src="{{ asset('images/brain.png')}}">
                                <p>Learn three flexible techniques for detecting shifting fraud patterns</p>
                            </div>
                            <div class="card">
                                <img src="{{ asset('images/graph.png')}}">
                                <p>Find out which graph algorithms to run – and why</p>
                            </div>
                            <div class="card">
                                <img src="{{ asset('images/chart.png')}}">
                                <p>See a sample graph data model</p>
                            </div>
                        </div>
                    </section>

                    <!-- Use Case Cards Section -->
                    <div>
                        <br>
                        <h2 class="section-title">Example of Use Case <br> "Bank Fraud Detection"</h2>
                        <!-- Card 1 -->
                        <div class="fraud-card">
                            <div class="fraud-text">
                                <h3>Introduction to Problem</h3>
                                <p>
                                    Banks and insurance companies lose a lot of money to fraud every year. 
                                    Old ways of finding fraud are still important, but criminals are getting better at hiding their crimes. 
                                    They work together and use different ways to make fake identities.
                                </p>
                            </div>
                            <div class="fraud-image">
                                <img src="{{ asset('images/image18.png') }}" alt="Fraud Introduction">
                            </div>
                        </div>

                        <!-- Card 2 -->
                        <div class="fraud-card">
                            <div class="fraud-text">
                                <h3>Explanation of Scenario</h3>
                                <p>
                                    No method of fraud prevention is perfect, but we can improve by looking at the relationships between data points 
                                    instead of just the data points themselves. These connections often go unnoticed until it's too late, 
                                    which is a shame because they often hold the most important clues.
                                </p>
                            </div>
                            <div class="fraud-image">
                                <img src="{{ asset('images/image19.png') }}" alt="Fraud Explanation">
                            </div>
                        </div>

                        <!-- Card 3 -->
                        <div class="fraud-card">
                            <div class="fraud-text">
                                <h3>Typical Scenario</h3>
                                <p>
                                    No method of fraud prevention is perfect, but we can improve by looking at the relationships between data points 
                                    instead of just the data points themselves. These connections often go unnoticed until it's too late, 
                                    which is a shame because they often hold the most important clues.
                                </p>
                            </div>
                            <div class="fraud-image">
                                <img src="{{ asset('images/image21.png') }}" alt="Fraud Typical Scenario">
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>
<!-- end blog-section -->

@endsection