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
        <!--Notice-->
        <section>
            <div class="container py-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <div class="events-content border-round box-shadow bg-white p-4 h-100">
                            <h2 class="poppin-bold">{{ $notice->subject }}</h2>
                            <p class="py-1"><span class="icon-calendar mr-2"></span>{{ $notice->getDate() }}</p>
                            <p>{!! $notice->description !!}</p>
                        </div>
                    </div>
                    
                    <!--Notice List-->
                    @if (count($noticeList) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                            <div class="box bg-white border-round box-shadow h-100">
                                <h2 class="poppin-bold p-3">NOTICES</h2>
                                <div class="notice-lst p-4">
                                    <ul>
                                        @foreach ($noticeList as $notice)
                                        <li>
                                            <p><span class="icon-calendar mr-3"></span>{{ $notice->getDate() }}</p>
                                            <a class="poppin-semibold" href="{{ route('notice.show', ['category' => 'school', 'slug' => $notice->slug]) }}">
                                                {{ str_limit(strip_tags($notice->subject), 80) }}
                                            </a>
                                        </li>
                                        <hr>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('notice.index', ['category' => 'school']) }}">
                                        <button class="btn btn-blue my-3">READ MORE ></button>
                                    </a>
                                </div>
                            </div>
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

@if ($param == 'bachelors')
    @section('dynamic-bachelors-data')
       <!--Notice-->
        <section>
            <div class="container py-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <div class="events-content border-round box-shadow bg-white p-4 h-100">
                            <h2 class="poppin-bold">{{ $notice->subject }}</h2>
                            <p class="py-1"><span class="icon-calendar mr-2"></span>{{ $notice->getDate() }}</p>
                            <p>{!! $notice->description !!}</p>
                        </div>
                    </div>
                    
                    <!--Notice List-->
                    @if (count($noticeList) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                            <div class="box bg-white border-round box-shadow h-100">
                                <h2 class="poppin-bold p-3">NOTICES</h2>
                                <div class="notice-lst p-4">
                                    <ul>
                                        @foreach ($noticeList as $notice)
                                        <li>
                                            <p><span class="icon-calendar mr-3"></span>{{ $notice->getDate() }}</p>
                                            <a class="poppin-semibold" href="{{ route('notice.show', ['category' => 'bachelors', 'slug' => $notice->slug]) }}">
                                                {{ str_limit(strip_tags($notice->subject), 80) }}
                                            </a>
                                        </li>
                                        <hr>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('notice.index', ['category' => 'bachelors']) }}">
                                        <button class="btn btn-blue my-3">READ MORE ></button>
                                    </a>
                                </div>
                            </div>
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
        <!--Notice-->
        <section>
            <div class="container py-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <div class="events-content border-round box-shadow bg-white p-4 h-100">
                            <h2 class="poppin-bold">{{ $notice->subject }}</h2>
                            <p class="py-1"><span class="icon-calendar mr-2"></span>{{ $notice->getDate() }}</p>
                            <p>{!! $notice->description !!}</p>
                        </div>
                    </div>
                    
                    <!--Notice List-->
                    @if (count($noticeList) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                            <div class="box bg-white border-round box-shadow h-100">
                                <h2 class="poppin-bold p-3">NOTICES</h2>
                                <div class="notice-lst p-4">
                                    <ul>
                                        @foreach ($noticeList as $notice)
                                        <li>
                                            <p><span class="icon-calendar mr-3"></span>{{ $notice->getDate() }}</p>
                                            <a class="poppin-semibold" href="{{ route('notice.show', ['category' => 'masters', 'slug' => $notice->slug]) }}">
                                                {{ str_limit(strip_tags($notice->subject), 80) }}
                                            </a>
                                        </li>
                                        <hr>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('notice.index', ['category' => 'masters']) }}">
                                        <button class="btn btn-blue my-3">READ MORE ></button>
                                    </a>
                                </div>
                            </div>
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

@if ($param == 'plus-two')
    @section('dynamic-plus-two-data')
        <!--Notice-->
        <section>
            <div class="container py-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <div class="events-content border-round box-shadow bg-white p-4 h-100">
                            <h2 class="poppin-bold">{{ $notice->subject }}</h2>
                            <p class="py-1"><span class="icon-calendar mr-2"></span>{{ $notice->getDate() }}</p>
                            <p>{!! $notice->description !!}</p>
                        </div>
                    </div>
                    
                    <!--Notice List-->
                    @if (count($noticeList) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                            <div class="box bg-white border-round box-shadow h-100">
                                <h2 class="poppin-bold p-3">NOTICES</h2>
                                <div class="notice-lst p-4">
                                    <ul>
                                        @foreach ($noticeList as $notice)
                                        <li>
                                            <p><span class="icon-calendar mr-3"></span>{{ $notice->getDate() }}</p>
                                            <a class="poppin-semibold" href="{{ route('notice.show', ['category' => 'plus-two', 'slug' => $notice->slug]) }}">
                                                {{ str_limit(strip_tags($notice->subject), 80) }}
                                            </a>
                                        </li>
                                        <hr>
                                        @endforeach
                                    </ul>
                                    <a href="{{ route('notice.index', ['category' => 'plus-two']) }}">
                                        <button class="btn btn-blue my-3">READ MORE ></button>
                                    </a>
                                </div>
                            </div>
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
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD Plus Two ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'plus-two']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                        <div class="result border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD Plus Two <br> RESULTS </h2>
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