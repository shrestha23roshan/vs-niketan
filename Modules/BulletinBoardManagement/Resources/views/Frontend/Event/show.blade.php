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
        <!--Events-->
        <section>
            <div class="container my-4 p-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 mb-4">
                        <div class="events-content border-round box-shadow bg-white p-4 h-100">
                            <h2 class="poppin-bold">{{ $event->heading }}</h2>
                            <p class="py-1"><span class="icon-calendar mr-2"></span>{{ $event->getDate() }}<span class="icon-location ml-4 mr-2"></span>{{ $event->venue }}</p>
                            <p>{!! $event->description !!}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                        <div class="border-round box-shadow bg-white p-4 h-100">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="poppin-bold">UPCOMING EVENTS</h2>
                                </div>
                            </div>

                            @if (count($events) > 0)
                                @foreach ($events as $event)
                                    <div class="row mb-4">
                                        <div class="col-4 col-md-2 col-lg-4">
                                            <div class="border-blue border-round text-center">
                                                <h3 class="poppin-bold mb-0 text-blue p-2">{{ $event->getDate() }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-8 col-md-10 col-lg-8">
                                            <h4><a class="poppin-medium text-black" href="{{ route('event.show', ['category' => 'school', 'slug' => $event->slug]) }}">{{ str_limit(strip_tags($event->heading), 45) }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('event.index', ['category' => 'school']) }}">
                                                <button class="btn btn-blue box-shadow">View All</button>
                                            </a>
                                        </div>
                                    </div>
                            @else
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="poppin-bold">No Events</h2>
                                </div>
                            </div>
                               
                            @endif
                        </div>
                    </div>
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
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD SCHOOL ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'school']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                        <div class="result border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD HIGH SCHOOL <br> RESULTS</h2>
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
        <!--Events-->
        <section>
            <div class="container my-4 p-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 mb-4">
                        <div class="events-content border-round box-shadow bg-white p-4 h-100">
                            <h2 class="poppin-bold">{{ $event->heading }}</h2>
                            <p class="py-1"><span class="icon-calendar mr-2"></span>{{ $event->getDate() }}<span class="icon-location ml-4 mr-2"></span>{{ $event->venue }}</p>
                            <p>{!! $event->description !!}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                        <div class="border-round box-shadow bg-white p-4 h-100">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="poppin-bold">UPCOMING EVENTS</h2>
                                </div>
                            </div>

                            @if (count($events) > 0)
                                @foreach ($events as $event)
                                    <div class="row mb-4">
                                        <div class="col-4 col-md-2 col-lg-4">
                                            <div class="border-blue border-round text-center">
                                                <h3 class="poppin-bold mb-0 text-blue p-2">{{ $event->getDate() }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-8 col-md-10 col-lg-8">
                                            <h4><a class="poppin-medium text-black" href="{{ route('event.show', ['category' => 'bachelors', 'slug' => $event->slug]) }}">{{ str_limit(strip_tags($event->heading), 45) }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('event.index', ['category' => 'bachelors']) }}">
                                                <button class="btn btn-blue box-shadow">View All</button>
                                            </a>
                                        </div>
                                    </div>
                            @else
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="poppin-bold">No Events</h2>
                                </div>
                            </div>
                                
                            @endif
                        </div>
                    </div>
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
         <!--Events-->
         <section>
            <div class="container my-4 p-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 mb-4">
                        <div class="events-content border-round box-shadow bg-white p-4 h-100">
                            <h2 class="poppin-bold">{{ $event->heading }}</h2>
                            <p class="py-1"><span class="icon-calendar mr-2"></span>{{ $event->getDate() }}<span class="icon-location ml-4 mr-2"></span>{{ $event->venue }}</p>
                            <p>{!! $event->description !!}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                        <div class="border-round box-shadow bg-white p-4 h-100">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="poppin-bold">UPCOMING EVENTS</h2>
                                </div>
                            </div>

                            @if (count($events) > 0)
                                @foreach ($events as $event)
                                    <div class="row mb-4">
                                        <div class="col-4 col-md-2 col-lg-4">
                                            <div class="border-blue border-round text-center">
                                                <h3 class="poppin-bold mb-0 text-blue p-2">{{ $event->getDate() }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-8 col-md-10 col-lg-8">
                                            <h4><a class="poppin-medium text-black" href="{{ route('event.show', ['category' => 'masters', 'slug' => $event->slug]) }}">{{ str_limit(strip_tags($event->heading), 45) }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('event.index', ['category' => 'masters']) }}">
                                                <button class="btn btn-blue box-shadow">View All</button>
                                            </a>
                                        </div>
                                    </div>
                            @else
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="poppin-bold">No Events</h2>
                                </div>
                            </div>
                                
                            @endif
                        </div>
                    </div>
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
        <!--Events-->
        <section>
            <div class="container my-4 p-4">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 mb-4">
                        <div class="events-content border-round box-shadow bg-white p-4 h-100">
                            <h2 class="poppin-bold">{{ $event->heading }}</h2>
                            <p class="py-1"><span class="icon-calendar mr-2"></span>{{ $event->getDate() }}<span class="icon-location ml-4 mr-2"></span>{{ $event->venue }}</p>
                            <p>{!! $event->description !!}</p>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                        <div class="border-round box-shadow bg-white p-4 h-100">
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="poppin-bold">UPCOMING EVENTS</h2>
                                </div>
                            </div>

                            @if (count($events) > 0)
                                @foreach ($events as $event)
                                    <div class="row mb-4">
                                        <div class="col-4 col-md-2 col-lg-4">
                                            <div class="border-blue border-round text-center">
                                                <h3 class="poppin-bold mb-0 text-blue p-2">{{ $event->getDate() }}</h3>
                                            </div>
                                        </div>
                                        <div class="col-8 col-md-10 col-lg-8">
                                            <h4><a class="poppin-medium text-black" href="{{ route('event.show', ['category' => 'plus-two', 'slug' => $event->slug]) }}">{{ str_limit(strip_tags($event->heading), 45) }}</a></h4>
                                        </div>
                                    </div>
                                @endforeach
                                    <div class="row">
                                        <div class="col-12">
                                            <a href="{{ route('event.index', ['category' => 'plus-two']) }}">
                                                <button class="btn btn-blue box-shadow">View All</button>
                                            </a>
                                        </div>
                                    </div>
                            @else
                            <div class="row">
                                <div class="col-12">
                                    <h2 class="poppin-bold">No Events</h2>
                                </div>
                            </div>
                                
                            @endif
                        </div>
                    </div>
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