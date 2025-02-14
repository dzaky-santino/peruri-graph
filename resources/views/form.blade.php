@extends('layouts.app')

@section('title', 'Form - Peruri Graph Analytics')

@section('content')

<!-- start page-title -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col col-xs-12">
                <div class="breadcumb-wrap">
                    <h2>Form</h2>
                    <ol>
                        <li><a href="{{ url('/')}}"><i class="icon-36"></i> Home</a></li>
                        <li>Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end page-title -->

<!-- start contact-pg-section -->
<section class="contact-pg-section section-padding">
    <div class="container">
        <div class="row">
            <div class="col col-lg-5 col-12">
                <div class="contact-title">
                    <div class="ch-top-title-s3">
                        <h2 class="site-split-text ch-split-in-right">Let’s Get You Set Up</h2>
                        <p>You'll be able to try the product in just a few minutes</p>
                    </div>
                </div>
            </div>
            <div class="col col-lg-7 col-12">
                <div class="contact-form-area">
                    <form method="post" class="contact-activation" id="contact-form-mejor"
                        novalidate="novalidate">
                        <div class="row">
                            <div class="col-md-6 col-12 form-field">
                                <input type="text" class="form-control" name="first-name" id="fisrt-name"
                                    placeholder="Your First Name" autocomplete="name">
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <input type="text" class="form-control" name="last-name" id="last-name"
                                    placeholder="Your Last Name" autocomplete="name">
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Your Email">
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <input type="text" class="form-control" name="company" id="company"
                                    placeholder="Your Company Name">
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <input type="text" class="form-control" name="job-title" id="job-title"
                                    placeholder="Your Job Title">
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <input type="text" class="form-control" name="job-function" id="job-function"
                                    placeholder="Your Job Function">
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <input type="text" class="form-control" name="phone" id="phone"
                                    placeholder="Your Phone Number">
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <input type="text" class="form-control" name="country" id="country"
                                    placeholder="Your Country">
                            </div>
                            <div class="col-md-12 col-12">
                                <div class="submit-area">
                                    <button type="submit" class="ch-btn-style-2"><span>Submit</span></button>
                                    <div id="loader">
                                        <i class="ti-reload"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix error-handling-messages">
                            <div id="success">Thank you! Massage Sended</div>
                            <div id="error"> Error occurred while sending email. Please try again
                                later. </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end contact-pg-section -->

@endsection