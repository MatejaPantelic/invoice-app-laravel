@extends('layouts.app')
@section('content')
    <section id="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center"
                     data-aos="fade-up">
                    <div>
                        <h1>@lang('welcome')</h1>
                        <h2>@lang('welcome_text')</h2>
                        @if(Auth::user())
                            <a href="{{route('admin.panel')}}" class="btn-get-started scrollto">@lang('get_started')</a>
                        @else
                            <a href="{{route('register')}}" class="btn-get-started scrollto">@lang('get_started')</a>
                        @endif
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left">
                    <img src="assets/img/hero-img.png" class="img-fluid" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="row">
                <div class="col-lg-6" data-aos="zoom-in">
                    <img src="assets/img/about.jpg" class="img-fluid" alt="">
                </div>
                <div class="col-lg-6 d-flex flex-column justify-contents-center" data-aos="fade-left">
                    <div class="content pt-4 pt-lg-0">
                        <h3>@lang('learn_more')</h3>
                        <p class="fst-italic">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore
                            magna aliqua.
                        </p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat.
                            </li>
                            <li><i class="bi bi-check-circle"></i> Duis aute irure dolor in reprehenderit in voluptate
                                velit.
                            </li>
                            <li><i class="bi bi-check-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo
                                consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperd
                            </li>
                        </ul>
                        <p>
                            Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
                            reprehenderit in voluptate tera noden carma palorp mades tera.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="row">
                <div class="col-lg-6 mt-2 mb-tg-0 order-2 order-lg-1">
                    <ul class="nav nav-tabs flex-column">
                        <li class="nav-item" data-aos="fade-up">
                            <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                                <h4>Modi sit est</h4>
                                <p>Quis excepturi porro totam sint earum quo nulla perspiciatis eius.</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="100">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                                <h4>Unde praesentium sed</h4>
                                <p>Voluptas vel esse repudiandae quo excepturi.</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="200">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                                <h4>Pariatur explicabo vel</h4>
                                <p>Velit veniam ipsa sit nihil blanditiis mollitia natus.</p>
                            </a>
                        </li>
                        <li class="nav-item mt-2" data-aos="fade-up" data-aos-delay="300">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                                <h4>Nostrum qui quasi</h4>
                                <p>Ratione hic sapiente nostrum doloremque illum nulla praesentium id</p>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 order-1 order-lg-2" data-aos="zoom-in">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-1">
                            <figure>
                                <img src="assets/img/features-1.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="tab-pane" id="tab-2">
                            <figure>
                                <img src="assets/img/features-2.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="tab-pane" id="tab-3">
                            <figure>
                                <img src="assets/img/features-3.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                        <div class="tab-pane" id="tab-4">
                            <figure>
                                <img src="assets/img/features-4.png" alt="" class="img-fluid">
                            </figure>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Features Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>@lang('testimonials')</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit
                                rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam,
                                risus at semper.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                            <h3>Saul Goodman</h3>
                            <h4>Ceo &amp; Founder</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid
                                cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet
                                legam anim culpa.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                            <h3>Sara Wilsson</h3>
                            <h4>Designer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam
                                duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                            <h3>Jena Karlis</h3>
                            <h4>Store Owner</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat
                                minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore
                                labore illum veniam.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                            <h3>Matt Brandon</h3>
                            <h4>Freelancer</h4>
                        </div>
                    </div><!-- End testimonial item -->

                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster
                                veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam
                                culpa fore nisi cillum quid.
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                            <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                            <h3>John Larson</h3>
                            <h4>Entrepreneur</h4>
                        </div>
                    </div><!-- End testimonial item -->

                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>@lang('clients')</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia
                    fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row no-gutters clients-wrap clearfix wow fadeInUp">

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in">
                        <img src="assets/img/clients/client-1.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="100">
                        <img src="assets/img/clients/client-2.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="150">
                        <img src="assets/img/clients/client-3.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="200">
                        <img src="assets/img/clients/client-4.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="250">
                        <img src="assets/img/clients/client-5.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="300">
                        <img src="assets/img/clients/client-6.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6">
                    <div class="client-logo" data-aos="zoom-in" data-aos-delay="350">
                        <img src="assets/img/clients/client-7.png" class="img-fluid" alt="">
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-xs-6" data-aos="zoom-in" data-aos-delay="400">
                    <div class="client-logo">
                        <img src="assets/img/clients/client-8.png" class="img-fluid" alt="">
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Clients Section -->


    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
        <div class="container">

            <div class="section-title" data-aos="fade-up">
                <h2>@lang('contact_us')</h2>
            </div>

            <div class="row">

                <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-right">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>@lang('location'):</h4>
                            <p>Cacak</p>
                        </div>

                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4>@lang('email'):</h4>
                            <p>info@example.com</p>
                        </div>

                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4>@lang('call'):</h4>
                            <p>032421935</p>
                        </div>
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2875.5877454467272!2d20.35231765099543!3d43.8850924453201!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x475772388c694f27%3A0x4841a3dfdeb39771!2sQuantox%20Technology!5e0!3m2!1sen!2srs!4v1667385678330!5m2!1sen!2srs"
                            frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
                    </div>

                </div>

                <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-left">
                    <form action="" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name">@lang('your_name')</label>
                                <input type="text" name="name" class="form-control" id="name" required>
                            </div>
                            <div class="form-group col-md-6 mt-3 mt-md-0">
                                <label for="name">@lang('your_email')</label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">@lang('subject')</label>
                            <input type="text" class="form-control" name="subject" id="subject" required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="name">@lang('message')</label>
                            <textarea class="form-control" name="message" rows="10" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">@lang('loading')</div>
                            <div class="error-message"></div>
                            <div class="sent-message">@lang('success_mesasge')</div>
                        </div>
                        <div class="text-center">
                            <button type="submit">@lang('send_message')</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </section><!-- End Contact Section -->
    <!-- End #main -->
@endsection
