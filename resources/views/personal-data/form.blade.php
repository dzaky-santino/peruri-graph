@extends('layouts.app')

@section('title', 'Form - Peruri Graph Analytics')

@section('content')

<style>
    input[type="number"]::-webkit-outer-spin-button,
    input[type="number"]::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    
    input[type="number"] {
        -moz-appearance: textfield;
    }
</style>    

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
<section class="contact-pg-section section-padding" style="margin-top: 0 ">
    <div class="container">
        <div class="row">
            <div class="col col-lg-5 col-12">
                <div class="contact-title">
                    <div class="ch-top-title-s3">
                        <h2 class="site-split-text ch-split-in-right" style="text-align: left">Let’s Get You Set Up</h2>
                        <p class="blog-item wow fadeInUp">You'll be able to try the product in just a few minutes</p>
                    </div>
                </div>
            </div>
            <div class="col col-lg-7 col-12">
                <div class="contact-form-area">
                    <form method="POST" action="{{ route('personal-data.store') }}" class="contact-activation" id="contact-form-mejor" novalidate="novalidate">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 col-12 form-field">
                                <label for="first" style="color: #3639DF; font-weight:bold; margin-bottom:5px;">First Name</label>
                                <input type="text" class="form-control" name="first" id="first"
                                    placeholder="Dzaky" autocomplete="name" required>
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <label for="last" style="color: #3639DF; font-weight:bold; margin-bottom:5px;">Last Name</label>
                                <input type="text" class="form-control" name="last" id="last"
                                    placeholder="Santino" autocomplete="name" required>
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <label for="email" style="color: #3639DF; font-weight:bold; margin-bottom:5px;">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="email@gmail.com" required>
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <label for="company" style="color: #3639DF; font-weight:bold; margin-bottom:5px;">Company</label>
                                <input type="text" class="form-control" name="company" id="company"
                                    placeholder="Peruri" required>
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <label for="job-title" style="color: #3639DF; font-weight:bold; margin-bottom:5px;">Job Title</label>
                                <input type="text" class="form-control" name="job-title" id="job-title"
                                    placeholder="Product Management Developer" required>
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <label for="job-function" style="color: #3639DF; font-weight:bold; margin-bottom:5px;">Job Function</label>
                                <input type="text" class="form-control" name="job-function" id="job-function"
                                    placeholder="Developing new user-facing features" required>
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <label for="phone" style="color: #3639DF; font-weight:bold; margin-bottom:5px;">Phone</label>
                                <input type="number" class="form-control" name="phone" id="phone"
                                    placeholder="+6281234567890" required>
                            </div>
                            <div class="col-md-6 col-12 form-field">
                                <label for="country" style="color: #3639DF; font-weight:bold; margin-bottom:5px;">Country</label>
                                <input type="text" class="form-control" name="country" id="country"
                                    placeholder="Indonesia" required>
                            </div>
                            <div class="col-md-12 col-12 form-field">
                                <p>
                                    The information you provide will be used in accordance
                                    with the terms of our <a href="{{ url('/privacy-policy') }}" target="_blank">Privacy Policy</a>.
                                </p>
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