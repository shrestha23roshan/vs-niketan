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
                        <h1 class="poppin-bold text-white">Downloads</h1>
                    </div>
                </div>
            </div>
        </section>
    
        <!--Results-->
        @if (count($results) > 0)
            <section>
                <div class="container border-round box-shadow bg-white my-5 p-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="poppin-bold">DOWNLOAD RESULTS</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="bg-blue text-white">
                                            <th>S.N</th>
                                            <th>File Name</th>
                                            <th>Added At</th>
                                            <th>Downlaod</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($results as $result)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $result->download_caption }}</td>
                                                <td>{{ $result->created_at }}</td>
                                                <td><a class="bg-blue text-white poppin-semibold border-round box-shadow py-2 px-4" href="{{ asset('uploads/downloads/results/'.$result->download_attachment) }}" download>Download</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

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
                        <h1 class="poppin-bold text-white">Results</h1>
                    </div>
                </div>
            </div>
        </section>
    
        <!--Admission Form-->
        @if (count($results) > 0)
            <section>
                <div class="container border-round box-shadow bg-white my-5 p-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="poppin-bold">DOWNLOAD RESULTS</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="bg-blue text-white">
                                            <th>S.N</th>
                                            <th>File Name</th>
                                            <th>Added At</th>
                                            <th>Downlaod</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($results as $result)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $result->download_caption }}</td>
                                                <td>{{ $result->created_at }}</td>
                                                <td><a class="bg-blue text-white poppin-semibold border-round box-shadow py-2 px-4" href="{{ asset('uploads/downloads/results/'.$result->download_attachment) }}" download>Download</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

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
                        <h1 class="poppin-bold text-white">Downloads</h1>
                    </div>
                </div>
            </div>
        </section>

        <!--Results-->
        @if (count($results) > 0)
            <section>
                <div class="container border-round box-shadow bg-white my-5 p-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="poppin-bold">DOWNLOAD RESULTS</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="bg-blue text-white">
                                            <th>S.N</th>
                                            <th>File Name</th>
                                            <th>Added At</th>
                                            <th>Downlaod</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($results as $result)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $result->download_caption }}</td>
                                                <td>{{ $result->created_at }}</td>
                                                <td><a class="bg-blue text-white poppin-semibold border-round box-shadow py-2 px-4" href="{{ asset('uploads/downloads/results/'.$result->download_attachment) }}" download>Download</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

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
                        <h1 class="poppin-bold text-white">Downloads</h1>
                    </div>
                </div>
            </div>
        </section>
    
        <!--Results-->
        @if (count($results) > 0)
            <section>
                <div class="container border-round box-shadow bg-white my-5 p-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="poppin-bold">DOWNLOAD RESULTS</h2>
                            <p>Download our Publications and other useful folder</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                        <tr class="bg-blue text-white">
                                            <th>S.N</th>
                                            <th>File Name</th>
                                            <th>Added At</th>
                                            <th>Downlaod</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($results as $result)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $result->download_caption }}</td>
                                                <td>{{ $result->created_at }}</td>
                                                <td><a class="bg-blue text-white poppin-semibold border-round box-shadow py-2 px-4" href="{{ asset('uploads/downloads/results/'.$result->download_attachment) }}" download>Download</a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif

    @endsection
@else
    @include('layouts.frontend.yield.masters')
@endif