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
        <!--Videos-->
        <section class="bg-black">
            <div class="container videos py-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 mb-5">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php $original_url = "https://www.youtube.com/watch?v=".$video->video_url."&modestbranding=1&autohide=1&showinfo=0&controls=0"; ?>
                            <?php $embed = Embed::make($original_url)->parseUrl() ?>
                            @if($embed)
                                {!! Embed::make($original_url)->setAttribute(['modestbranding'=> '1', 'autohide' => '1', 'showinfo' => '0', 'controls' => '0'])->parseUrl()->getIframe(); !!}
                            @else
                                <p style="color: red;">Invalid Video Url Provided</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <h5 class="poppin-semibold text-white mt-2 text-captilize">{{ $video->heading }}</h5>
                        <p>{!! $video->description !!}</p>
                        {{-- <div class="social-links mt-2">
                            <ul>
                                <li class="text-white"><span class="icon-facebook mr-3"></span>Share on Facebook</li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
    
        <!--Other Videos-->
        <section>
            <div class="container member py-5">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                        <h2 class="poppin-bold">OTHER VIDEOS</h2>
                  </div>

                  @if (count($videos) > 0)
                    @foreach ($videos as $video)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-5">
                            <div class="bg-white border-round p-3">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <?php $original_url = "https://www.youtube.com/watch?v=".$video->video_url."&modestbranding=1&autohide=1&showinfo=0&controls=0"; ?>
                                    <?php $embed = Embed::make($original_url)->parseUrl() ?>
                                    @if($embed)
                                        {!! Embed::make($original_url)->setAttribute(['modestbranding'=> '1', 'autohide' => '1', 'showinfo' => '0', 'controls' => '0'])->parseUrl()->getIframe(); !!}
                                    @else
                                        <p style="color: red;">Invalid Video Url Provided</p>
                                    @endif
                                </div>
                                <h4 class="text-center mt-2 poppin-semibold text-uppercase"><a href="{{ route('video.show', ['category' => 'school', 'slug' => $video->slug]) }}">{{ $video->heading }}</a></h4>
                            </div>
                        </div>
                    @endforeach
                    
                  @else
                      <div class="col-12">
                          <h2 class="poppin-bold">No videos</h2>
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
        <!--Videos-->
        <section class="bg-black">
            <div class="container videos py-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 mb-5">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php $original_url = "https://www.youtube.com/watch?v=".$video->video_url."&modestbranding=1&autohide=1&showinfo=0&controls=0"; ?>
                            <?php $embed = Embed::make($original_url)->parseUrl() ?>
                            @if($embed)
                                {!! Embed::make($original_url)->setAttribute(['modestbranding'=> '1', 'autohide' => '1', 'showinfo' => '0', 'controls' => '0'])->parseUrl()->getIframe(); !!}
                            @else
                                <p style="color: red;">Invalid Video Url Provided</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <h5 class="poppin-semibold text-white mt-2 text-captilize">{{ $video->heading }}</h5>
                        <p>{!! $video->description !!}</p>
                        {{-- <div class="social-links mt-2">
                            <ul>
                                <li class="text-white"><span class="icon-facebook mr-3"></span>Share on Facebook</li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
    
        <!--Other Videos-->
        <section>
            <div class="container member py-5">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                        <h2 class="poppin-bold">OTHER VIDEOS</h2>
                  </div>

                  @if (count($videos) > 0)
                    @foreach ($videos as $video)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-5">
                            <div class="bg-white border-round p-3">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <?php $original_url = "https://www.youtube.com/watch?v=".$video->video_url."&modestbranding=1&autohide=1&showinfo=0&controls=0"; ?>
                                    <?php $embed = Embed::make($original_url)->parseUrl() ?>
                                    @if($embed)
                                        {!! Embed::make($original_url)->setAttribute(['modestbranding'=> '1', 'autohide' => '1', 'showinfo' => '0', 'controls' => '0'])->parseUrl()->getIframe(); !!}
                                    @else
                                        <p style="color: red;">Invalid Video Url Provided</p>
                                    @endif
                                </div>
                                <h4 class="text-center mt-2 poppin-semibold text-uppercase"><a href="{{ route('video.show', ['category' => 'bachelors', 'slug' => $video->slug]) }}">{{ $video->heading }}</a></h4>
                            </div>
                        </div>
                    @endforeach
                    
                  @else
                      <div class="col-12">
                          <h2 class="poppin-bold">No videos</h2>
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
        <!--Videos-->
        <section class="bg-black">
            <div class="container videos py-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 mb-5">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php $original_url = "https://www.youtube.com/watch?v=".$video->video_url."&modestbranding=1&autohide=1&showinfo=0&controls=0"; ?>
                            <?php $embed = Embed::make($original_url)->parseUrl() ?>
                            @if($embed)
                                {!! Embed::make($original_url)->setAttribute(['modestbranding'=> '1', 'autohide' => '1', 'showinfo' => '0', 'controls' => '0'])->parseUrl()->getIframe(); !!}
                            @else
                                <p style="color: red;">Invalid Video Url Provided</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <h5 class="poppin-semibold text-white mt-2 text-captilize">{{ $video->heading }}</h5>
                        <p>{!! $video->description !!}</p>
                        {{-- <div class="social-links mt-2">
                            <ul>
                                <li class="text-white"><span class="icon-facebook mr-3"></span>Share on Facebook</li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
    
        <!--Other Videos-->
        <section>
            <div class="container member py-5">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                        <h2 class="poppin-bold">OTHER VIDEOS</h2>
                  </div>

                  @if (count($videos) > 0)
                    @foreach ($videos as $video)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-5">
                            <div class="bg-white border-round p-3">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <?php $original_url = "https://www.youtube.com/watch?v=".$video->video_url."&modestbranding=1&autohide=1&showinfo=0&controls=0"; ?>
                                    <?php $embed = Embed::make($original_url)->parseUrl() ?>
                                    @if($embed)
                                        {!! Embed::make($original_url)->setAttribute(['modestbranding'=> '1', 'autohide' => '1', 'showinfo' => '0', 'controls' => '0'])->parseUrl()->getIframe(); !!}
                                    @else
                                        <p style="color: red;">Invalid Video Url Provided</p>
                                    @endif
                                </div>
                                <h4 class="text-center mt-2 poppin-semibold text-uppercase"><a href="{{ route('video.show', ['category' => 'bachelors', 'slug' => $video->slug]) }}">{{ $video->heading }}</a></h4>
                            </div>
                        </div>
                    @endforeach
                    
                  @else
                      <div class="col-12">
                          <h2 class="poppin-bold">No videos</h2>
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
        <!--Videos-->
        <section class="bg-black">
            <div class="container videos py-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8 mb-5">
                        <div class="embed-responsive embed-responsive-16by9">
                            <?php $original_url = "https://www.youtube.com/watch?v=".$video->video_url."&modestbranding=1&autohide=1&showinfo=0&controls=0"; ?>
                            <?php $embed = Embed::make($original_url)->parseUrl() ?>
                            @if($embed)
                                {!! Embed::make($original_url)->setAttribute(['modestbranding'=> '1', 'autohide' => '1', 'showinfo' => '0', 'controls' => '0'])->parseUrl()->getIframe(); !!}
                            @else
                                <p style="color: red;">Invalid Video Url Provided</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-4">
                        <h5 class="poppin-semibold text-white mt-2 text-captilize">{{ $video->heading }}</h5>
                        <p>{!! $video->description !!}</p>
                        {{-- <div class="social-links mt-2">
                            <ul>
                                <li class="text-white"><span class="icon-facebook mr-3"></span>Share on Facebook</li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
    
        <!--Other Videos-->
        <section>
            <div class="container member py-5">
                <div class="row">
                  <div class="col-sm-12 col-md-12 col-lg-12">
                        <h2 class="poppin-bold">OTHER VIDEOS</h2>
                  </div>

                  @if (count($videos) > 0)
                    @foreach ($videos as $video)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-5">
                            <div class="bg-white border-round p-3">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <?php $original_url = "https://www.youtube.com/watch?v=".$video->video_url."&modestbranding=1&autohide=1&showinfo=0&controls=0"; ?>
                                    <?php $embed = Embed::make($original_url)->parseUrl() ?>
                                    @if($embed)
                                        {!! Embed::make($original_url)->setAttribute(['modestbranding'=> '1', 'autohide' => '1', 'showinfo' => '0', 'controls' => '0'])->parseUrl()->getIframe(); !!}
                                    @else
                                        <p style="color: red;">Invalid Video Url Provided</p>
                                    @endif
                                </div>
                                <h4 class="text-center mt-2 poppin-semibold text-uppercase"><a href="{{ route('video.show', ['category' => 'plus-two', 'slug' => $video->slug]) }}">{{ $video->heading }}</a></h4>
                            </div>
                        </div>
                    @endforeach
                    
                  @else
                      <div class="col-12">
                          <h2 class="poppin-bold">No videos</h2>
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