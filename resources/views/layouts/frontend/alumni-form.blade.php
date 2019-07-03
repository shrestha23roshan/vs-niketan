@section('title', $seo->meta_title)
@section('meta_tags', $seo->meta_tags)
@section('meta_description', $seo->meta_description)

@extends('layouts.frontend.container')

@section('footer_js')
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('alumni-form')

    <!--Banner-->
    <section class="bread-img">
        <div class="container">
            <div class="row py-7">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <h1 class="poppin-bold text-white">Alumni</h1>
                    <!-- <P class="text-white"><a class="text-white" href="index.html">Home</a> > About Us</P> -->
                </div>
            </div>
        </div>
    </section>

    <!--Alumni-->
    <section>
        <div class="container">
            <div class="row my-5">
                <!--Alumni Form-->
                <div class="bg-white box-shadow border-round p-3">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h3 class="poppin-bold">Alumni resgistration form</h3>

                        @include('layouts.frontend.alert')
                        <form class=" mt-3" method="post" action="{{ route('alumni.store') }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="full_name" placeholder="Your Full Name *" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Your Email Address *" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="batch" placeholder="SLC/SEE Batch *" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="phone_no" placeholder="Phone No. *" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="occupation" placeholder="Occupation *" required>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6 mb-2">
                                    <div class="form-group">
                                        <input type="file" name="attachment">
                                        <label for="information"> <span class="note">Note :</span> Image size must be 300 X 320 pixel</label>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="g-recaptcha" data-sitekey="{!! env('RECAPTCHA_SITE_KEY') !!}"></div>
                                </div>
                                <div class="col-12 mb-3">
                                    <button class="btn btn-blue">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </section>

@endsection