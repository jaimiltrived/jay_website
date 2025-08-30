@extends('master')
@section('nav')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
        <style>
            body {
                background-color: #f0ece4;
                color: #a37645 !important;
            }

            .aboutus-page-section {
                padding-top: 0;
                padding-bottom: 70px;
            }

            .about-page-text {
                margin-bottom: 65px;
            }

            .about-page-text .ap-title {
                margin-bottom: 30px;
            }

            .about-page-text .ap-title h2 {
                font-size: 44px;
                color: #19191a;
                margin-bottom: 18px;
            }

            .about-page-text .ap-title p {
                font-size: 18px;
                color: #707079;
                line-height: 28px;
            }

            .about-page-text .ap-services li {
                list-style: none;
                font-size: 20px;
                color: #707079;
                line-height: 42px;
            }

            .about-page-text .ap-services li i {
                color: #dfa974;
                margin-right: 5px;
            }

            .about-page-services .ap-service-item {
                position: relative;
                height: 420px;
                border-radius: 5px;
                margin-bottom: 30px;
            }

            .about-page-services .ap-service-item .api-text {
                position: absolute;
                left: 0;
                bottom: 40px;
                width: 100%;
                text-align: center;
            }

            .about-page-services .ap-service-item .api-text h3 {
                color: #ffffff;
            }

            .about-text {
                text-align: center;
                padding: 0 35px;
            }

            .about-text p {
                color: #595960;
                font-weight: 500;
            }

            .about-text p.f-para {
                margin-bottom: 10px;
            }

            .about-text p.s-para {
                margin-bottom: 35px;
            }

            .about-text .about-btn {
                color: #19191a;
            }

            .about-pic img {
                min-width: 100%;
                border-radius: 10px;
            }

            .spad {
                padding-top: 60px;
                padding-bottom: 60px;
            }

            .video-section {
                height: 500px;
                padding-top: 140px;
            }

            .video-section .video-text {
                text-align: center;
            }

            .video-section .video-text h2 {
                font-size: 48px;
                color: #ffffff;
                margin-bottom: 16px;
            }

            .video-section .video-text p {
                font-size: 20px;
                color: #ffffff;
                margin-bottom: 40px;
            }

            .video-section .video-text .play-btn {
                display: inline-block;
            }
        </style>
    </head>

    <body>

        <section class="aboutus-page-section spad">
            <div class="container">
                <div class="about-page-text">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="ap-title">
                                <h2>{{ $about->title }}</h2>
                                <p>{{ $about->description }}</p>
                            </div>
                        </div>
                        <div class="col-lg-5 offset-lg-1">
                            <ul class="ap-services">
                                @foreach($about->service_list as $item)
                                    <li><i class="icon_check"></i> {{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="about-page-services">
                    <div class="row">
                        @foreach($services as $service)
                            <div class="col-md-4">
                                <div class="ap-service-item set-bg"
                                    style="background-image: url('{{ asset('img/banner/' . $service->image) }}');">
                                    <div class="api-text">
                                        <h3>{{ $service->title }}</h3>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>

        <!-- About Us Page Section End -->


        <section class="aboutus-section spad" style="margin-top:3%">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 mb-4 mb-lg-0">
                        <div class="about-text">
                            <div class="section-title">
                                <div class="d-flex x flex-column"><span>{{ $contents->section_title }}</span>
                                    <h2>{{ $contents->hotel_name }}</h2>
                                </div>

                            </div>
                            <p class="f-para">{{ $contents->description }}</p>
                            <a href="#" class="btn btn-warning about-btn">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="about-pic">
                            <div class="row">
                                <div class="col-6 mb-2">
                                    <img src="{{ asset("storage/hotel_images/{$contents->main_image}")  }}"
                                        class="img-fluid" alt="">
                                </div>
                                <div class="col-6 mb-2">
                                    <img src="{{ asset("storage/hotel_images/{$contents->side_image}")  }}" class="img-fluid"
                                        alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Video Section Begin -->
        <!-- <section class="video-section set-bg" style="background-image: url('img/video-bg.jpg')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="video-text">
                                <h2>Discover Our Hotel & Services.</h2>
                                <p>It S Hurricane Season But We Are Visiting Hilton Head Island</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->


        <section class="video-section set-bg"
            style="background-image: url('{{ asset('img/' . $videoSection->background_image) }}')">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="video-text">
                            <h2>{{ $videoSection->title }}</h2>
                            <p>{{ $videoSection->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </html>


@endsection