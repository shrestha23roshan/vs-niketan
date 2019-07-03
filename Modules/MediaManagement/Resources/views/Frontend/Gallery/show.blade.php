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
        <!--Photo-->
        <section class="bg-white">
            <div class="container member py-5">
                <div class="row my-4">
                    <div class="col-sm-12 col-lg-12">
                        <div id="wrapper">
                            <ul id="image-list" class="clearfix">
                                @foreach ($photos as $photo)
                                    <li>
                                        <a href="{{ asset('uploads/media-management/gallery/photos/'.$photo->attachment) }}">
                                            <img class="w-100"  src="{{ asset('uploads/media-management/gallery/photos/'.$photo->attachment) }}" alt="photo gallery" >
                                        </a>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
        <!--Photo-->
        <section class="bg-white">
            <div class="container member py-5">
                <div class="row my-4">
                    <div class="col-sm-12 col-lg-12">
                        <div id="wrapper">
                            <ul id="image-list" class="clearfix">
                                @foreach ($photos as $photo)
                                    <li>
                                        <a href="{{ asset('uploads/media-management/gallery/photos/'.$photo->attachment) }}">
                                            <img class="w-100"  src="{{ asset('uploads/media-management/gallery/photos/'.$photo->attachment) }}" alt="photo gallery" >
                                        </a>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
        <!--Photo-->
        <section class="bg-white">
            <div class="container member py-5">
                <div class="row my-4">
                    <div class="col-sm-12 col-lg-12">
                        <div id="wrapper">
                            <ul id="image-list" class="clearfix">
                                @foreach ($photos as $photo)
                                    <li>
                                        <a href="{{ asset('uploads/media-management/gallery/photos/'.$photo->attachment) }}">
                                            <img class="w-100"  src="{{ asset('uploads/media-management/gallery/photos/'.$photo->attachment) }}" alt="photo gallery" >
                                        </a>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
        <!--Photo-->
        <section class="bg-white">
            <div class="container member py-5">
                <div class="row my-4">
                    <div class="col-sm-12 col-lg-12">
                        <div id="wrapper">
                            <ul id="image-list" class="clearfix">
                                @foreach ($photos as $photo)
                                    <li>
                                        <a href="{{ asset('uploads/media-management/gallery/photos/'.$photo->attachment) }}">
                                            <img class="w-100"  src="{{ asset('uploads/media-management/gallery/photos/'.$photo->attachment) }}" alt="photo gallery" >
                                        </a>
                                    </li>
                                @endforeach
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section> 

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