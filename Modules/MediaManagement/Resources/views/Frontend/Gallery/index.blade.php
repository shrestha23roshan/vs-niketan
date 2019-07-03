@section('title', $seo->meta_title)
@section('meta_tags', $seo->meta_tags)
@section('meta_description', $seo->meta_description)

@extends('layouts.frontend.container')

@section('footer_js')
<script>
    $(document).ready(function() {
        // on load of the page: switch to the currently selected tab
        // get tab href hash value from url and store.
        let segments = window.location.href.split('/');
        localStorage.setItem('activeTab', '#'+segments[3]);

        // if tab is clicked, get tab href hash value and store.
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });

        let activeTab = localStorage.getItem('activeTab');
        if (activeTab) {
            $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
        }
    });
</script>
@endsection

@php
    $param = trim(Request::segment(1));
@endphp

@if ($param == 'school')
    @section('dynamic-school-data')
        <!--Banner-->
        <section class="bread-img">
            <div class="container">
                <div class="row py-7">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1 class="poppin-bold text-white">Gallery</h1>
                        <!-- <P class="text-white"><a class="text-white" href="index.html">Home</a> > About Us</P> -->
                    </div>
                </div>
            </div>
        </section>

        <!--Image Gallery-->
        <section class="bg-white">
            <div class="container member py-5">
                <div class="row">

                    @if (count($galleries) > 0)
                        @foreach ($galleries as $gallery)
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
                                <div class="content" data-aos="zoom-in" data-aos-duration="1500">
                                    <a href="{{ route('gallery.show', ['category' => 'school', 'slug' => $gallery->slug]) }}">
                                        <div class="content-overlay"></div>
                                            @if(file_exists('uploads/media-management/gallery/'.$gallery->attachment) && $gallery->attachment != '')
                                                <img class="d-block w-100 content-image"  src="{{ asset('uploads/media-management/gallery/'.$gallery->attachment) }}" alt="{{ $gallery->name }}" width="200">
                                            @else
                                                <img class="d-block w-100 content-image"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $gallery->name }}" width="200">
                                            @endif
                                        <div class="content-details fadeIn-bottom">
                                            <h5 class="content-title poppin-semibold">{{ $gallery->name }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                        <!--Pagination-->
                        <div class="col-12">
                            <div class="pagination-box my-4">
                                @include('layouts.pagination.default', ['paginator' => $galleries])
                            </div>
                        </div>
                    
                    @else
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h2 class="poppin-bold py-5">No Album Available</h2>
                        </div>
                    @endif
                    
                </div>
            </div>
        </section>

        <!--Testimonial-->
        @if (count($testimonials) > 0)
            <section class="bg-white">
                <div class="container testimonial">
                    <div class="row py-5">
                        <div class="col-12">
                            <h1 class="poppin-bold text-center my-2">TESTIMONIAL</h1>
                        </div>
                        <div class="col-12">
                            <div class="regular slider">
                                @foreach ($testimonials as $testimonial)
                                    <div class="testimonial-slide text-center mt-4 pad-lr">
                                        <p class="pad-4">{!! $testimonial->description !!}</p>
                                        <div class="text-center mt-3">
                                            @if(file_exists('uploads/testimonial/'.$testimonial->attachment) && $testimonial->attachment != '')
                                                <img src="{{ asset('uploads/testimonial/'.$testimonial->attachment) }}" alt="{{ $testimonial->full_name}}" width="200">
                                            @else
                                                <img src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $testimonial->full_name}}" width="200">
                                            @endif
                                            <p class="poppin-semibold">{!! $testimonial->full_name !!}</p>
                                            <small class="text-uppercase">- {!! $testimonial->designation !!}</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!--Downloads-->
        <section class="bg-gray py-5">
            <div class="container">
                <div class="row">
                    <!--Admission-->
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                        <div class="admission border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD HIGH SCHOOL ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'school']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                        <div class="result border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD HIGH SCHOOL <br> RESULTS </h2>
                            <p><a class="text-white" href="{{ route('result.index', ['category' => 'school']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    @endsection
@else
    @include('layouts.frontend.yield.school')
@endif

@if ($param == 'plus-two')
    @section('dynamic-plus-two-data')
        <!--Banner-->
        <section class="bread-img">
            <div class="container">
                <div class="row py-7">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1 class="poppin-bold text-white">Gallery</h1>
                        <!-- <P class="text-white"><a class="text-white" href="index.html">Home</a> > About Us</P> -->
                    </div>
                </div>
            </div>
        </section>

        <!--Image Gallery-->
        <section class="bg-white">
            <div class="container member py-5">
                <div class="row">

                    @if (count($galleries) > 0)
                        @foreach ($galleries as $gallery)
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
                                <div class="content" data-aos="zoom-in" data-aos-duration="1500">
                                    <a href="{{ route('gallery.show', ['category' => 'plus-two', 'slug' => $gallery->slug]) }}">
                                        <div class="content-overlay"></div>
                                            @if(file_exists('uploads/media-management/gallery/'.$gallery->attachment) && $gallery->attachment != '')
                                                <img class="d-block w-100 content-image"  src="{{ asset('uploads/media-management/gallery/'.$gallery->attachment) }}" alt="{{ $gallery->name }}" width="200">
                                            @else
                                                <img class="d-block w-100 content-image"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $gallery->name }}" width="200">
                                            @endif
                                        <div class="content-details fadeIn-bottom">
                                            <h5 class="content-title poppin-semibold">{{ $gallery->name }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    
                        <!--Pagination-->
                        <div class="col-12">
                            <div class="pagination-box my-4">
                                @include('layouts.pagination.default', ['paginator' => $galleries])
                            </div>
                        </div>

                    @else
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h2 class="poppin-bold py-5">No Album Available</h2>
                        </div>
                    @endif
                    
                </div>
            </div>
        </section>

        <!--Testimonial-->
        @if (count($testimonials) > 0)
            <section class="bg-white">
                <div class="container testimonial">
                    <div class="row py-5">
                        <div class="col-12">
                            <h1 class="poppin-bold text-center my-2">TESTIMONIAL</h1>
                        </div>
                        <div class="col-12">
                            <div class="regular slider">
                                @foreach ($testimonials as $testimonial)
                                    <div class="testimonial-slide text-center mt-4 pad-lr">
                                        <p class="pad-4">{!! $testimonial->description !!}</p>
                                        <div class="text-center mt-3">
                                            @if(file_exists('uploads/testimonial/'.$testimonial->attachment) && $testimonial->attachment != '')
                                                <img src="{{ asset('uploads/testimonial/'.$testimonial->attachment) }}" alt="{{ $testimonial->full_name}}" width="200">
                                            @else
                                                <img src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $testimonial->full_name}}" width="200">
                                            @endif
                                            <p class="poppin-semibold">{!! $testimonial->full_name !!}</p>
                                            <small class="text-uppercase">- {!! $testimonial->designation !!}</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif
        
        <!--Downloads-->
        <section class="bg-gray py-5">
            <div class="container">
                <div class="row">
                    <!--Admission-->
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                        <div class="admission border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD PLUS TWO ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'plus-two']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                        <div class="result border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD PLUS TWO <br> RESULTS </h2>
                            <p><a class="text-white" href="{{ route('result.index', ['category' => 'plus-two']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection
@else
    @include('layouts.frontend.yield.plus-two')
@endif

@if ($param == 'bachelors')
    @section('dynamic-bachelors-data')
        <!--Banner-->
        <section class="bread-img">
            <div class="container">
                <div class="row py-7">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1 class="poppin-bold text-white">Gallery</h1>
                        <!-- <P class="text-white"><a class="text-white" href="index.html">Home</a> > About Us</P> -->
                    </div>
                </div>
            </div>
        </section>

        <!--Image Gallery-->
        <section class="bg-white">
            <div class="container member py-5">
                <div class="row">

                    @if (count($galleries) > 0)
                        @foreach ($galleries as $gallery)
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
                                <div class="content" data-aos="zoom-in" data-aos-duration="1500">
                                    <a href="{{ route('gallery.show', ['category' => 'bachelors', 'slug' => $gallery->slug]) }}">
                                        <div class="content-overlay"></div>
                                            @if(file_exists('uploads/media-management/gallery/'.$gallery->attachment) && $gallery->attachment != '')
                                                <img class="d-block w-100 content-image"  src="{{ asset('uploads/media-management/gallery/'.$gallery->attachment) }}" alt="{{ $gallery->name }}" width="200">
                                            @else
                                                <img class="d-block w-100 content-image"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $gallery->name }}" width="200">
                                            @endif
                                        <div class="content-details fadeIn-bottom">
                                            <h5 class="content-title poppin-semibold">{{ $gallery->name }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    
                        <!--Pagination-->
                        <div class="col-12">
                            <div class="pagination-box my-4">
                                @include('layouts.pagination.default', ['paginator' => $galleries])
                            </div>
                        </div>

                    @else
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h2 class="poppin-bold py-5">No Album Available</h2>
                        </div>
                    @endif
                    
                </div>
            </div>
        </section>

        <!--Testimonial-->
        @if (count($testimonials) > 0)
            <section class="bg-white">
                <div class="container testimonial">
                    <div class="row py-5">
                        <div class="col-12">
                            <h1 class="poppin-bold text-center my-2">TESTIMONIAL</h1>
                        </div>
                        <div class="col-12">
                            <div class="regular slider">
                                @foreach ($testimonials as $testimonial)
                                    <div class="testimonial-slide text-center mt-4 pad-lr">
                                        <p class="pad-4">{!! $testimonial->description !!}</p>
                                        <div class="text-center mt-3">
                                            @if(file_exists('uploads/testimonial/'.$testimonial->attachment) && $testimonial->attachment != '')
                                                <img src="{{ asset('uploads/testimonial/'.$testimonial->attachment) }}" alt="{{ $testimonial->full_name}}" width="200">
                                            @else
                                                <img src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $testimonial->full_name}}" width="200">
                                            @endif
                                            <p class="poppin-semibold">{!! $testimonial->full_name !!}</p>
                                            <small class="text-uppercase">- {!! $testimonial->designation !!}</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!--Downloads-->
        <section class="bg-gray py-5">
            <div class="container">
                <div class="row">
                    <!--Admission-->
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                        <div class="admission border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD BACHELORS ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'bachelors']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                        <div class="result border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD BACHELORS <br> RESULTS </h2>
                            <p><a class="text-white" href="{{ route('result.index', ['category' => 'bachelors']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    
    @endsection
@else
    @include('layouts.frontend.yield.bachelors')
@endif

@if ($param == 'masters')
    @section('dynamic-masters-data')
        <!--Banner-->
        <section class="bread-img">
            <div class="container">
                <div class="row py-7">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1 class="poppin-bold text-white">Gallery</h1>
                        <!-- <P class="text-white"><a class="text-white" href="index.html">Home</a> > About Us</P> -->
                    </div>
                </div>
            </div>
        </section>

        <!--Image Gallery-->
        <section class="bg-white">
            <div class="container member py-5">
                <div class="row">

                    @if (count($galleries) > 0)
                        @foreach ($galleries as $gallery)
                            <div class="col-sm-12 col-md-6 col-lg-3 mb-5">
                                <div class="content" data-aos="zoom-in" data-aos-duration="1500">
                                    <a href="{{ route('gallery.show', ['category' => 'masters', 'slug' => $gallery->slug]) }}">
                                        <div class="content-overlay"></div>
                                            @if(file_exists('uploads/media-management/gallery/'.$gallery->attachment) && $gallery->attachment != '')
                                                <img class="d-block w-100 content-image"  src="{{ asset('uploads/media-management/gallery/'.$gallery->attachment) }}" alt="{{ $gallery->name }}" width="200">
                                            @else
                                                <img class="d-block w-100 content-image"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $gallery->name }}" width="200">
                                            @endif
                                        <div class="content-details fadeIn-bottom">
                                            <h5 class="content-title poppin-semibold">{{ $gallery->name }}</h5>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                        <!--Pagination-->
                        <div class="col-12">
                            <div class="pagination-box my-4">
                                @include('layouts.pagination.default', ['paginator' => $galleries])
                            </div>
                        </div>
                    
                    @else
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h2 class="poppin-bold py-5">No Album Available</h2>
                        </div>
                    @endif
                    
                </div>
            </div>
        </section>

        <!--Testimonial-->
        @if (count($testimonials) > 0)
            <section class="bg-white">
                <div class="container testimonial">
                    <div class="row py-5">
                        <div class="col-12">
                            <h1 class="poppin-bold text-center my-2">TESTIMONIAL</h1>
                        </div>
                        <div class="col-12">
                            <div class="regular slider">
                                @foreach ($testimonials as $testimonial)
                                    <div class="testimonial-slide text-center mt-4 pad-lr">
                                        <p class="pad-4">{!! $testimonial->description !!}</p>
                                        <div class="text-center mt-3">
                                            @if(file_exists('uploads/testimonial/'.$testimonial->attachment) && $testimonial->attachment != '')
                                                <img src="{{ asset('uploads/testimonial/'.$testimonial->attachment) }}" alt="{{ $testimonial->full_name}}" width="200">
                                            @else
                                                <img src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $testimonial->full_name}}" width="200">
                                            @endif
                                            <p class="poppin-semibold">{!! $testimonial->full_name !!}</p>
                                            <small class="text-uppercase">- {!! $testimonial->designation !!}</small>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

        <!--Downloads-->
        <section class="bg-gray py-5">
            <div class="container">
                <div class="row">
                    <!--Admission-->
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                        <div class="admission border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD MASTERS ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'masters']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                        <div class="result border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD MASTERS <br> RESULTS </h2>
                            <p><a class="text-white" href="{{ route('result.index', ['category' => 'masters']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @endsection
@else
    @include('layouts.frontend.yield.masters')
@endif