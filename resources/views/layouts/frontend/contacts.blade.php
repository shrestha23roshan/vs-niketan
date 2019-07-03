@section('title', $seo->meta_title)
@section('meta_tags', $seo->meta_tags)
@section('meta_description', $seo->meta_description)

@extends('layouts.frontend.container')

@section('footer_js')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('contacts')
    <!--Banner-->
    <section class="bread-img">
        <div class="container">
            <div class="row py-7">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1 class="poppin-bold text-white">CONTACTS US</h1>
                    <!-- <P class="text-white"><a class="text-white" href="index.html">Home</a> > About Us</P> -->
                </div>
            </div>
        </div>
    </section>

    <!--Contact-->
    <section>
        <div class="container videos py-5">
            <div class="row">
                <div class="col-sm-12 col-md-9 col-lg-9 mb-4">
                    <div class="bg-white border-round box-shadow p-4">
                        <h2 class="poppin-bold"> Get In Touch</h2>
                        <p>You can contact us any way that is convenient for you. We are available 24/7 via fax or
                            email.
                            You can also use a quick contact form below or visit our office personally. We would be
                            happy
                            to answer your questions.</p>

                        @include('layouts.frontend.alert')
                        <!--Form-->
                        <form class="mt-4" id="contactForm" role="form" method="POST" action="{{ route('contact.mail') }}">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                                    <input type="text" class="form-control" name="full_name" placeholder="Full name" required>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                                    <input type="number" class="form-control" name="phone_number" placeholder="Phone Number" required>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                                    <input type="email" class="form-control" name="email" placeholder="Email address" required>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                                    <input type="text" class="form-control" name="subject" placeholder="subject" required>
                                </div>
                                <div class="col-sm-12 col-md-12 col-lg-12 mb-4">
                                    <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                        required></textarea>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="g-recaptcha" data-sitekey="{!! env('RECAPTCHA_SITE_KEY') !!}"></div>
                                </div>
                                <div class="col-12 mb-3">
                                    <button class="btn btn-blue">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <div class="bg-white border-round box-shadow p-4">
                        <h6 class="poppin-semibold">Phone</h6>
                        <ul>
                            <li><a class="text-gray" href="tel:{{ $setting->site_phone1 }}">{{ $setting->site_phone1 }}</a></li>
                            <li><a class="text-gray" href="tel:{{ $setting->site_phone2 }}">{{ $setting->site_phone2 }}</a></li>
                        </ul>

                        <h6 class="poppin-semibold mt-4">Our Branch</h6>
                        <ul>
                            <li class="text-gray">Minbhanwan, Kathmandu</li>
                            <li class="text-gray">Thapathali, Kathmandu</li>
                        </ul>

                        <h6 class="poppin-semibold mt-4">Email Address</h6>
                        <ul>
                            <li><a class="text-gray" href="mailto:{{ $setting->site_email }}">{{ $setting->site_email }}</a></li>
                            {{-- <li><a class="text-gray" href="mailto:{{ $setting->site_phone1 }}">{{ $setting->site_phone1 }}</a></li> --}}
                        </ul>

                        <h6 class="poppin-semibold mt-4">Opening Hour</h6>
                        <ul>
                            <li>Sun-Thu: 8:00am-8:00pm</li>
                            <li>Fri: 8:00am-3:00pm</li>
                            <li>Sat: Closed</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 px-0">
                    <div class="mapouter">
                        <div class="gmap_canvas"><iframe width="100%" height="450" id="gmap_canvas" src="https://maps.google.com/maps?q=vs%20niketan%20school&t=&z=15&ie=UTF8&iwloc=&output=embed"
                                frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection

    