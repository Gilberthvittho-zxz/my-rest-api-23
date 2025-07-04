@extends('layouts.app-public')
@section('title', 'Home')
@section('content')

<div class="site-wrapper-reveal">
    <div class="hero-box-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Hero Slider Area Start -->
                    <div class="hero-area" id="product-preview">
                       
                    </div>
                    <!-- Hero Slider Area End -->
                </div>
            </div>
        </div>
    </div>

    <div class="about-us-area section-space--ptb_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="about-us-content_6 text-center">
                        <h2>B.R.A.V.E&nbsp;&nbsp;Store</h2>
                        <p>
                            <small>
                                Whether you're a professional aerial filmmaker, a tech enthusiast, or simply 
                                curious about the world of drones, our curated collection of high-performance 
                                drones has something for everyone. From cinematic shots to industrial-grade features, 
                                we offer cutting-edge technology that empowers your creativity and elevates your 
                                perspective.Our expert team is here to guide you in choosing the perfect drone, and 
                                our passion for innovation ensures you get the best in performance, safety, and design.✨ 
                                Join our drone community today — and experience the freedom of flight from a whole new angle! &#11088;
                            </small>
                        </p>
                        <p class="mt-5">Find your window to the world! Or, even,
                            <span class="text-color-primary">unlock hidden worlds, one page at a time!</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Banner Video Area Start -->
    <div class="banner-video-area overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-video-box">
                        <img src="https://img.youtube.com/vi/iUtnZpzkbG8/maxresdefault.jpg" alt="thumbnail" class="img-fluid" style="width:100%; height:auto; object-fit:cover;">
                        <div class="video-icon">
                            <a href="https://www.youtube.com/embed/iUtnZpzkbG8" class="popup-youtube">
                                <i class="linear-ic-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner Video Area End -->



    <!-- Our Brand Area Start -->
    <div class="our-brand-area section-space--pb_90">
        <div class="container">
            <div class="brand-slider-active">
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/brand/dronelogo1.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/brand/dronelogo2.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/brand/dronelogo1.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/brand/dronelogo1.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/brand/dronelogo2.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/brand/dronelogo1.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/brand/dronelogo2.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="single-brand-item">
                        <a href="#"><img src="assets/images/brand/dronelogo1.png" class="img-fluid" alt="Brand Images"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Brand Area End -->

   


    <!-- Our Member Area Start -->
    <div class="our-member-area section-space--pb_120">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="member-box">
                        <div class="row align-items-center">
                            <div class="col-lg-5 col-md-4">
                                <div class="section-title small-mb__40 tablet-mb__40">
                                    <h4 class="section-title">Join the community!</h4>
                                    <p>Become one of the member and get discount 50% off</p>
                                </div>
                            </div>
                            <div class="col-lg-7 col-md-8">
                                <div class="member-wrap">
                                    <form action="#" class="member--two">
                                        <input class="input-box" type="text" placeholder="Your email address">
                                        <button class="submit-btn"><i class="icon-arrow-right"></i></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Member Area End -->
</div>
@endsection

@section('addition_css')
@endsection

@section('addition_script')
    <script src="{{ asset('pages/js/home.js') }}"></script>
    <script src="{{ asset('pages/js/app.js') }}"></script> {{-- <<< tambahkan ini --}}
@endsection
