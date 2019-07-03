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
        <!--News-->
        <section class="bg-white">
            <div class="container py-4">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8 mb-4">
                        <div class="bg-white">
                            @if(file_exists('uploads/bulletin-board-management/news/'.$news->attachment) && $news->attachment != '')
                                <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$news->attachment) }}" alt="{{ $news->heading}}" width="200">
                            @else
                                <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $news->heading}}" width="200">
                            @endif
                            <div class="news-content pt-4">
                                <h6 class="poppin-bold">{{ $news->heading }}</h6>
                                <p class="py-1"><span class="icon-user mr-2"></span>{{ $news->author }}<span class="icon-calendar ml-4 mr-2"></span>{{ $news->getDate() }}</p>
                                <p>{!! $news->description !!}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!--Notices-->
                    @if (count($highSchoolNotices) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                            <div class="box bg-white border-round box-shadow h-100">
                                <h2 class="poppin-bold p-3">NOTICES</h2>
                                <div class="notice-lst p-4">
                                    <ul>
                                        @foreach ($highSchoolNotices as $notice)
                                        <li>
                                            <p><span class="icon-calendar mr-3"></span>{{ $notice->date }}</p>
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
    
        <!--News List-->
        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 my-4">
                        <h2 class="poppin-bold">NEWS AND UPDATES</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable </p>
                    </div>

                    @if (count($newsList) > 0)

                        @foreach ($newsList as $news)
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                <div class="news-box bg-white border-round box-shadow h-100">
                                    <a href="{{ route('news.show', ['category' => 'school', 'slug' => $news->slug]) }}">
                                        @if(file_exists('uploads/bulletin-board-management/news/'.$news->attachment) && $news->attachment != '')
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$news->attachment) }}" alt="{{ $news->heading}}" width="200">
                                        @else
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $news->heading}}" width="200">
                                        @endif
                                    </a>
                                    <div class="p-3">
                                        <a class="poppin-semibold text-black" href="{{ route('news.show', ['category' => 'school', 'slug' => $news->slug]) }}">
                                            <h6 class="mb-1">{{ str_limit(strip_tags($news->heading), 40) }}</h6>
                                        </a>
                                        <p class="py-1"><span class="icon-user mr-2"></span>{{ $news->author }}<span class="icon-calendar ml-4 mr-2"></span> {{ $news->getDate() }}</p>
                                        <p class="mb-4">{{ str_limit(strip_tags($news->description), 125) }}</p>
                                        <a class="poppin-semibold" href="{{ route('news.show', ['category' => 'school', 'slug' => $news->slug]) }}">READ MORE ></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
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
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'school']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="result border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD ALL TERMINALS <br> RESULTS </h2>
                            <p><a class="text-white" href="{{ route('result.index', ['category' => 'school']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    {{-- <!--Newsletter-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="newsletter border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white">SUBSCRIBE TO NEWSLETTER</h2>
                            <form action="" class="mt-3">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="" id="" placeholder="Your email address"
                                        required>
                                </div>
                                <button class="btn btn-blue box-shadow w-100 text-center">SUBSCRIBE US</button>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
    
    @endsection
@else
    @include('layouts.frontend.yield.school')
@endif

@if ($param == 'bachelors')
    @section('dynamic-bachelors-data')
        <!--News-->
        <section class="bg-white">
            <div class="container py-4">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8 mb-4">
                        <div class="bg-white">
                            @if(file_exists('uploads/bulletin-board-management/news/'.$news->attachment) && $news->attachment != '')
                                <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$news->attachment) }}" alt="{{ $news->heading}}" width="200">
                            @else
                                <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $news->heading}}" width="200">
                            @endif
                            <div class="news-content pt-4">
                                <h6 class="poppin-bold">{{ $news->heading }}</h6>
                                <p class="py-1"><span class="icon-user mr-2"></span>{{ $news->author }}<span class="icon-calendar ml-4 mr-2"></span>{{ $news->getDate() }}</p>
                                <p>{!! $news->description !!}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!--Notices-->
                    @if (count($bachelorNotices) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                            <div class="box bg-white border-round box-shadow h-100">
                                <h2 class="poppin-bold p-3">NOTICES</h2>
                                <div class="notice-lst p-4">
                                    <ul>
                                        @foreach ($bachelorNotices as $notice)
                                        <li>
                                            <p><span class="icon-calendar mr-3"></span>{{ $notice->date }}</p>
                                            <a href="{{ route('notice.show', ['category' => 'bachelors', 'slug' => $notice->slug]) }}">
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
    
        <!--News List-->
        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 my-4">
                        <h2 class="poppin-bold">NEWS AND UPDATES</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable </p>
                    </div>

                    @if (count($newsList) > 0)

                        @foreach ($newsList as $news)
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                <div class="news-box bg-white border-round box-shadow h-100">
                                    <a href="{{ route('news.show', ['category' => 'bachelors', 'slug' => $news->slug]) }}">
                                        @if(file_exists('uploads/bulletin-board-management/news/'.$news->attachment) && $news->attachment != '')
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$news->attachment) }}" alt="{{ $news->heading}}" width="200">
                                        @else
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $news->heading}}" width="200">
                                        @endif
                                    </a>
                                    <div class="p-3">
                                        <a class="poppin-semibold text-black" href="{{ route('news.show', ['category' => 'bachelors', 'slug' => $news->slug]) }}">
                                            <h6 class="mb-1">{{ str_limit(strip_tags($news->heading), 40) }}</h6>
                                        </a>
                                        <p class="py-1"><span class="icon-user mr-2"></span>{{ $news->author }}<span class="icon-calendar ml-4 mr-2"></span> {{ $news->getDate() }}</p>
                                        <p class="mb-4">{{ str_limit(strip_tags($news->description), 125) }}</p>
                                        <a class="poppin-semibold" href="{{ route('news.show', ['category' => 'bachelors', 'slug' => $news->slug]) }}">READ MORE ></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
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
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'bachelors']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="result border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD ALL TERMINALS <br> RESULTS </h2>
                            <p><a class="text-white" href="{{ route('result.index', ['category' => 'bachelors']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    {{-- <!--Newsletter-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="newsletter border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white">SUBSCRIBE TO NEWSLETTER</h2>
                            <form action="" class="mt-3">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="" id="" placeholder="Your email address"
                                        required>
                                </div>
                                <button class="btn btn-blue box-shadow w-100 text-center">SUBSCRIBE US</button>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
    
    @endsection
@else
    @include('layouts.frontend.yield.bachelors')
@endif

@if ($param == 'masters')
    @section('dynamic-masters-data')
        <!--News-->
        <section class="bg-white">
            <div class="container py-4">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8 mb-4">
                        <div class="bg-white">
                            @if(file_exists('uploads/bulletin-board-management/news/'.$news->attachment) && $news->attachment != '')
                                <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$news->attachment) }}" alt="{{ $news->heading}}" width="200">
                            @else
                                <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $news->heading}}" width="200">
                            @endif
                            <div class="news-content pt-4">
                                <h6 class="poppin-bold">{{ $news->heading }}</h6>
                                <p class="py-1"><span class="icon-user mr-2"></span>{{ $news->author }}<span class="icon-calendar ml-4 mr-2"></span>{{ $news->getDate() }}</p>
                                <p>{!! $news->description !!}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!--Notices-->
                    @if (count($masterNotices) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                            <div class="box bg-white border-round box-shadow h-100">
                                <h2 class="poppin-bold p-3">NOTICES</h2>
                                <div class="notice-lst p-4">
                                    <ul>
                                        @foreach ($masterNotices as $notice)
                                        <li>
                                            <p><span class="icon-calendar mr-3"></span>{{ $notice->date }}</p>
                                            <a href="{{ route('notice.show', ['category' => 'masters', 'slug' => $notice->slug]) }}">
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
    
        <!--News List-->
        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 my-4">
                        <h2 class="poppin-bold">NEWS AND UPDATES</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable </p>
                    </div>

                    @if (count($newsList) > 0)

                        @foreach ($newsList as $news)
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                <div class="news-box bg-white border-round box-shadow h-100">
                                    <a href="{{ route('news.show', ['category' => 'masters', 'slug' => $news->slug]) }}">
                                        @if(file_exists('uploads/bulletin-board-management/news/'.$news->attachment) && $news->attachment != '')
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$news->attachment) }}" alt="{{ $news->heading}}" width="200">
                                        @else
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $news->heading}}" width="200">
                                        @endif
                                    </a>
                                    <div class="p-3">
                                        <a class="poppin-semibold text-black" href="{{ route('news.show', ['category' => 'masters', 'slug' => $news->slug]) }}">
                                            <h6 class="mb-1">{{ str_limit(strip_tags($news->heading), 40) }}</h6>
                                        </a>
                                        <p class="py-1"><span class="icon-user mr-2"></span>{{ $news->author }}<span class="icon-calendar ml-4 mr-2"></span> {{ $news->getDate() }}</p>
                                        <p class="mb-4">{{ str_limit(strip_tags($news->description), 125) }}</p>
                                        <a class="poppin-semibold" href="{{ route('news.show', ['category' => 'masters', 'slug' => $news->slug]) }}">READ MORE ></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
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
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'masters']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="result border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD ALL TERMINALS <br> RESULTS </h2>
                            <p><a class="text-white" href="{{ route('result.index', ['category' => 'masters']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    {{-- <!--Newsletter-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="newsletter border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white">SUBSCRIBE TO NEWSLETTER</h2>
                            <form action="" class="mt-3">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="" id="" placeholder="Your email address"
                                        required>
                                </div>
                                <button class="btn btn-blue box-shadow w-100 text-center">SUBSCRIBE US</button>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

    @endsection
@else
    @include('layouts.frontend.yield.masters')
@endif

@if ($param == 'plus-two')
    @section('dynamic-plus-two-data')
        <!--News-->
        <section class="bg-white">
            <div class="container py-4">
                <div class="row">
                    <div class="col-sm-12 col-md-8 col-lg-8 mb-4">
                        <div class="bg-white">
                            @if(file_exists('uploads/bulletin-board-management/news/'.$news->attachment) && $news->attachment != '')
                                <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$news->attachment) }}" alt="{{ $news->heading}}" width="200">
                            @else
                                <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $news->heading}}" width="200">
                            @endif
                            <div class="news-content pt-4">
                                <h6 class="poppin-bold">{{ $news->heading }}</h6>
                                <p class="py-1"><span class="icon-user mr-2"></span>{{ $news->author }}<span class="icon-calendar ml-4 mr-2"></span>{{ $news->getDate() }}</p>
                                <p>{!! $news->description !!}</p>
                            </div>
                        </div>
                    </div>
                    
                    <!--Notices-->
                    @if (count($plusTwoNotices) > 0)
                        <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                            <div class="box bg-white border-round box-shadow h-100">
                                <h2 class="poppin-bold p-3">NOTICES</h2>
                                <div class="notice-lst p-4">
                                    <ul>
                                        @foreach ($plusTwoNotices as $notice)
                                        <li>
                                            <p><span class="icon-calendar mr-3"></span>{{ $notice->date }}</p>
                                            <a href="{{ route('notice.show', ['category' => 'plus-two', 'slug' => $notice->slug]) }}">
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
        
        <!--News List-->
        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 my-4">
                        <h2 class="poppin-bold">NEWS AND UPDATES</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable </p>
                    </div>

                    @if (count($newsList) > 0)

                        @foreach ($newsList as $news)
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                <div class="news-box bg-white border-round box-shadow h-100">
                                    <a href="{{ route('news.show', ['category' => 'school', 'slug' => $news->slug]) }}">
                                        @if(file_exists('uploads/bulletin-board-management/news/'.$news->attachment) && $news->attachment != '')
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$news->attachment) }}" alt="{{ $news->heading}}" width="200">
                                        @else
                                            <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $news->heading}}" width="200">
                                        @endif
                                    </a>
                                    <div class="p-3">
                                        <a class="poppin-semibold text-black" href="{{ route('news.show', ['category' => 'school', 'slug' => $news->slug]) }}">
                                            <h6 class="mb-1">{{ str_limit(strip_tags($news->heading), 40) }}</h6>
                                        </a>
                                        <p class="py-1"><span class="icon-user mr-2"></span>{{ $news->author }}<span class="icon-calendar ml-4 mr-2"></span> {{ $news->getDate() }}</p>
                                        <p class="mb-4">{{ str_limit(strip_tags($news->description), 125) }}</p>
                                        <a class="poppin-semibold" href="{{ route('news.show', ['category' => 'school', 'slug' => $news->slug]) }}">READ MORE ></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        
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
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD ADMISSION <br> FORM</h2>
                            <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'plus-two']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    <!--Results-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="result border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white mb-5">DOWNLOAD ALL TERMINALS <br> RESULTS </h2>
                            <p><a class="text-white" href="{{ route('result.index', ['category' => 'plus-two']) }}">Click here to download ></a></p>
                        </div>
                    </div>
                    {{-- <!--Newsletter-->
                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="newsletter border-round box-shadow p-4">
                            <h2 class="poppin-bold text-white">SUBSCRIBE TO NEWSLETTER</h2>
                            <form action="" class="mt-3">
                                <div class="form-group">
                                    <input class="form-control" type="email" name="" id="" placeholder="Your email address"
                                        required>
                                </div>
                                <button class="btn btn-blue box-shadow w-100 text-center">SUBSCRIBE US</button>
                            </form>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>

    @endsection
@else
    @include('layouts.frontend.yield.plus-two')
@endif