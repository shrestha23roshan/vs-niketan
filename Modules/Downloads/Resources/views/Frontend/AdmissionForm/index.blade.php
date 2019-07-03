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
    
        <!--Admission Form-->
        <section>
            <div class="container border-round box-shadow bg-white my-5 p-4">
                <div class="row mb-4">
                    <div class="col-12">
                        <h2 class="poppin-bold">ADMISSION PROCEDURE</h2>
                        <p>Qualified students who desire to take up management can apply for admission. V.S. Niketan is
                            committed in its pursuit of academic excellence and pro-active and inclusive approach to quality
                            education. The prospective students may come from a variety of disciplines i.e. Science, Management, Humanities or Education.
                            The final decision is taken on the basis of <br> <br>
                        <ul>
                            <li>a. Scores on the admission tests administered by respective faculties</li>
                            <li>b. Interviews and</li>
                            <li>c. Past academic performance of the applicant.</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </section>
        @if (count($admissionForm) > 0)
            <section>
                <div class="container border-round box-shadow bg-white my-5 p-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="poppin-bold">DOWNLOAD ADMISSION FORM</h2>
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
                                        @foreach ($admissionForm as $admissionForm)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admissionForm->download_caption }}</td>
                                                <td>{{ $admissionForm->created_at }}</td>
                                                <td><a class="bg-blue text-white poppin-semibold border-round box-shadow py-2 px-4" href="{{ asset('uploads/downloads/admissionform/'.$admissionForm->download_attachment) }}" download="">Download</a></td>
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
                        <h1 class="poppin-bold text-white">Downloads</h1>
                    </div>
                </div>
            </div>
        </section>
    
        <!--Admission Form-->
        @if (count($admissionForm) > 0)
            <section>
                <div class="container border-round box-shadow bg-white my-5 p-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="poppin-bold">DOWNLOAD ADMISSION FORM</h2>
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
                                        @foreach ($admissionForm as $admissionForm)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admissionForm->download_caption }}</td>
                                                <td>{{ $admissionForm->created_at }}</td>
                                                <td><a class="bg-blue text-white poppin-semibold border-round box-shadow py-2 px-4" href="{{ asset('uploads/downloads/admissionform/'.$admissionForm->download_attachment) }}" download="">Download</a></td>
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

        <!--Admission Procedure-->
        <section>
            <div class="container border-round box-shadow bg-white my-5 p-4">
                <div class="row mb-4">
                    <div class="col-12">
                        <h2 class="poppin-bold">ADMISSION PROCEDURE</h2>
                        <p>Qualified students who desire to take up management can apply for admission. V.S. Niketan is
                            committed in its pursuit of academic excellence and pro-active and inclusive approach to quality
                            education. The prospective students may come from a variety of disciplines i.e. Science, Management, Humanities or Education.
                            The final decision is taken on the basis of <br> <br>
                        <ul>
                            <li>a. Scores on the admission tests administered by respective faculties</li>
                            <li>b. Interviews and</li>
                            <li>c. Past academic performance of the applicant.</li>
                        </ul>
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!--Admission Form-->
        @if (count($admissionForm) > 0)
            <section>
                <div class="container border-round box-shadow bg-white my-5 p-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="poppin-bold">DOWNLOAD ADMISSION FORM</h2>
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
                                        @foreach ($admissionForm as $admissionForm)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admissionForm->download_caption }}</td>
                                                <td>{{ $admissionForm->created_at }}</td>
                                                <td><a class="bg-blue text-white poppin-semibold border-round box-shadow py-2 px-4" href="{{ asset('uploads/downloads/admissionform/'.$admissionForm->download_attachment) }}" download="">Download</a></td>
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
    
        <!--Admission Form-->
        @if (count($admissionForm) > 0)
            <section>
                <div class="container border-round box-shadow bg-white my-5 p-4">
                    <div class="row mb-4">
                        <div class="col-12">
                            <h2 class="poppin-bold">DOWNLOAD ADMISSION FORM</h2>
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
                                        @foreach ($admissionForm as $admissionForm)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $admissionForm->download_caption }}</td>
                                                <td>{{ $admissionForm->created_at }}</td>
                                                <td><a class="bg-blue text-white poppin-semibold border-round box-shadow py-2 px-4" href="{{ asset('uploads/downloads/admissionform/'.$admissionForm->download_attachment) }}" download="">Download</a></td>
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