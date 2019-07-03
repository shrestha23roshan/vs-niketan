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

    @if (trim(Request::segment(2)) === 'academic-programmes')

        @section('dynamic-school-data')
            <!--Breadcrumb image-->
            <section class="bread-img">
                <div class="container">
                    <div class="row py-7">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <h1 class="poppin-bold text-white">Accademic Programmes</h1>
                        </div>
                    </div>
                </div>
            </section>

        <!--Content-->
        <section>
            <div class="container">
               <div class="row">
                   <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="bg-white border-round box-shadow my-4 p-4">
                            <div class="my-3">
                                <h5>Academic Programmes</h5>
                                <p>VSN offers Grade XI and XII in SCIENCE, MANAGEMENT & Humanities streams.</p>
                            </div>
        
                            <div class="my-3">
                                <h5>For Higher Education</h5>
                                <p>BBA Programme (four years) and EMBA Program affiliated to Pokhara University.</p>
                            </div>
        
                            <div class="my-3">
                                <h5>Courses Offered</h5>
                                <p>The regular courses for the facul­ties of Science & Management for class XI & XII are being offered as per NEB Curriculum.</p>
                            </div>
        
                            <div class="my-3">
                                <h5>Admission Procedure</h5>
                                <p>Admission form along with the prospectus and other information is available from the college of­fice.</p>
        
                                <ul>
                                    <li>
                                        <h6>For Science Stream</h6>
                                        <p>
                                            * GPA “B” in SEE exam with good english background.
        
                                            * Must qualify the written exam and oral test
                                        </p>
                                    </li>
                                    <li>
                                        <h6>For Management Stream</h6>
                                        <p>
                                            * GPA “C” in SEE exam with good english background.
        
                                            * Must qualify the wirtten exam and oral test.
                                        </p>
                                    </li>
                                    <li>
                                        <h6>For Humainities Stream</h6>
                                        <p>
                                            * GPA “D+” in SEE exam.
        
                                            * Must qualify the written exam and oral test
                                        </p>
                                    </li>
                                </ul>
                            </div>
        
                            <div class="my-3">
                                <h5>10 Good Reasons to study at the VSN</h5>
                                <p>
                                    <ul>
                                        <li>> Ranked as the leading, reputed and the biggest institution.</li>
                                        <li>> Outstanding academic performance with excellent board results.</li>
                                        <li>> Dedicated, friendly and highly qualified teaching faculties.</li>
                                        <li>> A good deal of facilities with modernised library and labs.</li>
                                        <li>> Standard world class education at affordable fee structure.</li>
                                        <li>> A planned programme of teaching and assessment.</li>
                                        <li>> Regular reports and interaction on students progress.</li>
                                        <li>> Ongoing commitment to provide quality education.</li>
                                        <li>> Healthy academic environment and high degree of discipline.</li>
                                        <li>> Comprehensive career counselling throughout the time in college.</li>
                                    </ul>
                                </p>
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
                    </div>
                </div>
            </section>
        @endsection

    @else
        @include('layouts.frontend.static.branch')
    @endif
    
@else
    @include('layouts.frontend.yield.school')
@endif

@if ($param == 'bachelors')
    @section('dynamic-bachelors-data')
        <!--Breadcrrumb-image-->
        <section class="bread-img">
            <div class="container">
                <div class="row py-7">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <h1 class="poppin-bold text-white">{{ (trim(Request::segment(2)) == 'programme-objective-and-features') ? 'Programme Objective and Features' :  'BBA Semester Wise Course Distribution' }}</h1>
                    </div>
                </div>
            </div>
        </section>

        <!--Content-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="bg-white border-round box-shadow my-4 p-4">
                        <div class="static-content">
                            @if (trim(Request::segment(2)) == 'programme-objective-and-features')
                                <p>To equip aspiring managers with a broad range of modern management tools.</p>
                                <p>To understand the functions of business units and their interdependence within an organization.</p>
                                <p>To develop the analytical and managerial skill required to tackle challenges in today’s business age.</p>
                                <p>To impart both theoretical foundation and practical knowledge in business administration in their real work situations</p>
                                <p>To prepare students for meeting the needs of trades and industries in this competent world.</p>
                                <p>To develop decision-making ability and thinking independently in the student.</p>
                                

                                <h5 class="mt-4 text-red">PROGRAM FEATURES OF BBA</h5>
                                <p>Classical methods of teaching will be supported by case group discussion, project assignment field visits and class presentation.</p>
                                <p>Audio-video and internet will be mode accessible as per the demand of the subject.</p>
                                <p>Student’s participation, group discussion, individual presentations are emphasized to increase the confidence level and develop leadership and communication skills in the student.</p>
                            @else
                                <h5 class="mb-4">BBA SEMESTER WISE COURSE DISTRIBUTION</h5>
                                <img class="d-block w-100" src="{{ asset('images/course.png') }}" alt="">
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
                        <h1 class="poppin-bold text-white">EMBA Course Structure</h1>
                    </div>
                </div>
            </div>
        </section>

        <!--Content-->
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg=12">
                    <div class="bg-white border-round box-shadow my-4 p-4">
                        <p>The program requires participants to complete 48 credit hours, 45 credits in course work and 3 credits in preparing a comprehensive business development plan towards the end of the program.</p>
                        
                        <h5 class="py-3">SEMESTER ONE</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Module 1: Foundation Courses</th>
                                        <th> Units  10 </th>
                                        <th>Cr. Hr. 15</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Data Analysis I</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Managerial Economics</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Financial Reporting Systems</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Organizational Management</td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Managerial Communication</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Organizational Behavior</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="py-3">SEMESTER TWO</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Module 2: Functional Area Course</th>
                                        <th> Units  10 </th>
                                        <th>Cr. Hr. 15</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Human Resources Management</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Data Analysis II </td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Management Information Systems</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Marketing Management</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Seminars in Contemporary Mgmt. Issues </td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Mgmt. Accounting & Control Systems</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Operations Management</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Business Environment</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Corporate Financial Decisions </td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h5 class="py-3">SEMESTER THREE</h5>
                        <div class="table-responsive">
                            <table class="table table-hover table-bordered">
                                <thead>
                                    <tr>
                                        <th>Module 3: Integrative and Specialization Area Course</th>
                                        <th> Units  10 </th>
                                        <th>Cr. Hr. 15</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Strategic Management  </td>
                                        <td>2</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>Strategic Marketing </td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Economic Environment Analysis</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>International Business</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Corporate Governance</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Specialization Area Course I</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Specialization Area Course II</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Specialization Area Course III </td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Specialization Area Course IV </td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                    <tr>
                                        <td>Business Development Plan</td>
                                        <td>1</td>
                                        <td>1.5</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        

       

        <!--Downloads-->
        <section class="bg-gray py-5">
            <div class="container">
                <div class="row">
                    <!--Admission-->
                    <div class="col-sm-11 col-md-6 col-lg-6">
                        <div class="admi1.5sion border-round box-shadow p-4">
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
                </div>
            </div>
        </section>

    @endsection
@else
    @include('layouts.frontend.yield.masters')
@endif

@if ($param != 'plus-two')
    @include('layouts.frontend.yield.plus-two')
@endif

