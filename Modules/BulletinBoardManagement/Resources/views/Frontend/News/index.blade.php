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
                        <h1 class="poppin-bold text-white">NEWS & UPDATES</h1>
                        <!-- <P class="text-white"><a class="text-white" href="index.html">Home</a> > About Us</P> -->
                    </div>
                </div>
            </div>
        </section>
    
        <!--News-->
        <section>
            <div class="container pt-2 pb-5">
                <div class="row">

                    @if (count($news) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-12 my-4">
                            <h2 class="poppin-bold">NEWS AND UPDATES</h2>
                            <p>It is a long established fact that a reader will be distracted by the readable </p>
                        </div>
                        @foreach ($news as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                <div class="news-box bg-white border-round box-shadow h-100">
                                    <a href="{{ route('news.show', ['category' => 'school', 'slug' => $item->slug]) }}">
                                        @if(file_exists('uploads/bulletin-board-management/news/'.$item->attachment) && $item->attachment != '')
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$item->attachment) }}" alt="{{ $item->heading}}" width="200">
                                        @else
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $item->heading}}" width="200">
                                        @endif
                                    </a>
                                    <div class="p-3">
                                        <a class="poppin-semibold text-black" href="{{ route('news.show', ['category' => 'school', 'slug' => $item->slug]) }}">
                                            <h6 class="mb-1">{{ str_limit(strip_tags($item->heading), 40) }}</h6>
                                        </a>
                                        <p class="py-1"><span class="icon-user mr-2"></span>{{ $item->author }}<span class="icon-calendar ml-4 mr-2"></span> {{ $item->getDate() }}</p>
                                        <p class="mb-4">{{ str_limit(strip_tags($item->description), 125) }}</p>
                                        <a class="poppin-semibold" href="{{ route('news.show', ['category' => 'school', 'slug' => $item->slug]) }}">READ MORE ></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        <!--Pagination-->
                        <div class="col-12">
                            <div class="pagination-box my-4">
                                @include('layouts.pagination.default', ['paginator' => $news])
                            </div>
                        </div>

                    @else 
                        <div class="col-12">
                            <h2 class="poppin-bold">No News</h2>
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
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="admission border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD HIGH SCHOOL ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'school']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="result border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD HIGH SCHOOL<br> RESULTS </h2>
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
                        <h1 class="poppin-bold text-white">NEWS & UPDATES</h1>
                    </div>
                </div>
            </div>
        </section>
    
        <!--News-->
        <section>
            <div class="container pt-2 pb-5">
                <div class="row">

                    @if (count($news) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-12 my-4">
                            <h2 class="poppin-bold">NEWS AND UPDATES</h2>
                            <p>It is a long established fact that a reader will be distracted by the readable </p>
                        </div>
                        @foreach ($news as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                <div class="news-box bg-white border-round box-shadow h-100">
                                    <a href="{{ route('news.show', ['category' => 'plus-two', 'slug' => $item->slug]) }}">
                                        @if(file_exists('uploads/bulletin-board-management/news/'.$item->attachment) && $item->attachment != '')
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$item->attachment) }}" alt="{{ $item->heading}}" width="200">
                                        @else
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $item->heading}}" width="200">
                                        @endif
                                    </a>
                                    <div class="p-3">
                                        <a class="poppin-semibold text-black" href="{{ route('news.show', ['category' => 'plus-two', 'slug' => $item->slug]) }}">
                                            <h6 class="mb-1">{{ str_limit(strip_tags($item->heading), 40) }}</h6>
                                        </a>
                                        <p class="py-1"><span class="icon-user mr-2"></span>{{ $item->author }}<span class="icon-calendar ml-4 mr-2"></span> {{ $item->getDate() }}</p>
                                        <p class="mb-4">{{ str_limit(strip_tags($item->description), 125) }}</p>
                                        <a class="poppin-semibold" href="{{ route('news.show', ['category' => 'plus-two', 'slug' => $item->slug]) }}">READ MORE ></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!--Pagination-->
                        <div class="col-12">
                            <div class="pagination-box my-4">
                                @include('layouts.pagination.default', ['paginator' => $news])
                            </div>
                        </div>
                        
                    @else 
                        <div class="col-12">
                            <h2 class="poppin-bold">No News</h2>
                        </div>
                    @endif

                    <!--Pagination-->
                    <div class="pagination-box my-4">
                        @include('layouts.pagination.default', ['paginator' => $news])
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
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="admission border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD PLUS TWO ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'plus-two']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
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
                        <h1 class="poppin-bold text-white">NEWS & UPDATES</h1>
                        <!-- <P class="text-white"><a class="text-white" href="index.html">Home</a> > About Us</P> -->
                    </div>
                </div>
            </div>
        </section>
    
        <!--News-->
        <section>
            <div class="container pt-2 pb-5">
                <div class="row">

                    @if (count($news) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-12 my-4">
                            <h2 class="poppin-bold">NEWS AND UPDATES</h2>
                            <p>It is a long established fact that a reader will be distracted by the readable </p>
                        </div>
                        @foreach ($news as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                <div class="news-box bg-white border-round box-shadow h-100">
                                    <a href="{{ route('news.show', ['category' => 'bachelors', 'slug' => $item->slug]) }}">
                                        @if(file_exists('uploads/bulletin-board-management/news/'.$item->attachment) && $item->attachment != '')
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$item->attachment) }}" alt="{{ $item->heading}}" width="200">
                                        @else
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $item->heading}}" width="200">
                                        @endif
                                    </a>
                                    <div class="p-3">
                                        <a class="poppin-semibold text-black" href="{{ route('news.show', ['category' => 'bachelors', 'slug' => $item->slug]) }}">
                                            <h6 class="mb-1">{{ str_limit(strip_tags($item->heading), 40) }}</h6>
                                        </a>
                                        <p class="py-1"><span class="icon-user mr-2"></span>{{ $item->author }}<span class="icon-calendar ml-4 mr-2"></span> {{ $item->getDate() }}</p>
                                        <p class="mb-4">{{ str_limit(strip_tags($item->description), 125) }}</p>
                                        <a class="poppin-semibold" href="{{ route('news.show', ['category' => 'bachelors', 'slug' => $item->slug]) }}">READ MORE ></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <!--Pagination-->
                        <div class="col-12">
                            <div class="pagination-box my-4">
                                @include('layouts.pagination.default', ['paginator' => $news])
                            </div>
                        </div>
                    @else 
                        <div class="col-12">
                            <h2 class="poppin-bold">No News</h2>
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
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="admission border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD BACHELORS ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'bachelors']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
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
                        <h1 class="poppin-bold text-white">NEWS & UPDATES</h1>
                        <!-- <P class="text-white"><a class="text-white" href="index.html">Home</a> > About Us</P> -->
                    </div>
                </div>
            </div>
        </section>
    
        <!--News-->
        <section>
            <div class="container pt-2 pb-5">
                <div class="row">

                    @if (count($news) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-12 my-4">
                            <h2 class="poppin-bold">NEWS AND UPDATES</h2>
                            <p>It is a long established fact that a reader will be distracted by the readable </p>
                        </div>
                        @foreach ($news as $item)
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                <div class="news-box bg-white border-round box-shadow h-100">
                                    <a href="{{ route('news.show', ['category' => 'masters', 'slug' => $item->slug]) }}">
                                        @if(file_exists('uploads/bulletin-board-management/news/'.$item->attachment) && $item->attachment != '')
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$item->attachment) }}" alt="{{ $item->heading}}" width="200">
                                        @else
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $item->heading}}" width="200">
                                        @endif
                                    </a>
                                    <div class="p-3">
                                        <a class="poppin-semibold text-black" href="{{ route('news.show', ['category' => 'masters', 'slug' => $item->slug]) }}">
                                            <h6 class="mb-1">{{ str_limit(strip_tags($item->heading), 40) }}</h6>
                                        </a>
                                        <p class="py-1"><span class="icon-user mr-2"></span>{{ $item->author }}<span class="icon-calendar ml-4 mr-2"></span> {{ $item->getDate() }}</p>
                                        <p class="mb-4">{{ str_limit(strip_tags($item->description), 125) }}</p>
                                        <a class="poppin-semibold" href="{{ route('news.show', ['category' => 'masters', 'slug' => $item->slug]) }}">READ MORE ></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
                        <!--Pagination-->
                        <div class="col-12">
                            <div class="pagination-box my-4">
                                @include('layouts.pagination.default', ['paginator' => $news])
                            </div>
                        </div>

                    @else 
                        <div class="col-12">
                            <h2 class="poppin-bold">No News</h2>
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
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="admission border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD MASTERS ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'masters']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
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