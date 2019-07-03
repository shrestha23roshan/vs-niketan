@section('dynamic-school-data')
    <!--Banner-->
    @if (count($highSchoolBanners) > 0)
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $count = 1; ?>
                @if( count($highSchoolBanners) > 0)
                    @foreach($highSchoolBanners as $banner)
                        <div class="carousel-item <?php if($count == 1) { ?>active <?php } ?>">
                            @if(file_exists('uploads/media-management/banners/'.$banner->attachment) && $banner->attachment != '')
                                <img class="d-block w-100"  src="{{ asset('uploads/media-management/banners/'.$banner->attachment) }}" alt="{{ $banner->title }}" width="200">
                            @else
                                <img class="d-block w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $banner->title }}" width="200">
                            @endif
                            {{-- <div class="carousel-caption d-none d-md-block animated slideInLeft">
                                <p class="text-white">WELCOME TO VS NIKETAN</p>
                                <h1 class="text-capitalize poppin-extrabold text-white text-shadow mt-3">{{ $banner->title}}</h1>
                            </div> --}}
                        </div>
                    <?php $count++; ?>
                    @endforeach
                @endif
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @endif

    <!--Message-->
    @if ($highSchoolMessages)
        <section class="bg-white py-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <p class="text-red">{!! $highSchoolMessages->designation !!} Message</p>
                        <h1 class="poppin-bold text-black text-uppercase">{!! $highSchoolMessages->heading !!}</h1>
                        <p>{!! $highSchoolMessages->description !!}</p>
                        <p class="poppin-semibold">{!! $highSchoolMessages->name !!}</p>
                        <p>- {!! $highSchoolMessages->designation !!}</p>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4">
                        @if(file_exists('uploads/content-management/message/'.$highSchoolMessages->attachment) && $highSchoolMessages->attachment != '')
                            <img class="w-100 d-block box-shadow border-round"  src="{{ asset('uploads/content-management/message/'.$highSchoolMessages->attachment) }}" alt="{{ $highSchoolMessages->heading }}" width="200">
                        @else
                            <img class="w-100 d-block box-shadow border-round"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $highSchoolMessages->heading }}" width="200">
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!--Events and Notices-->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <!--Upcoming Events-->
                <div class="col-sm-12 col-md-12 col-lg-8 mb-4">
                    <div class="bg-white p-4 box-shadow border-round h-100">
                        <div class="row">
                            <div class="col-12">
                                <h2 class="poppin-bold">UP COMMING EVENTS</h2>
                            </div>
                        </div>
                        <div class="row">
                            <!--Calender-->
                            <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                                <div class="calender">
                                    <div id="school-calendar"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                                @if (count($highSchoolEvents) > 0)
                                    @foreach ($highSchoolEvents as $event)
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <div class="border-blue border-round text-center">
                                                    <h3 class="poppin-bold mb-0 text-blue">{{ $event->getDate() }}</h3>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <p class="poppin-semibold">{!! $event->heading !!}</p>
                                            </div>
                                            <div class="col-12">
                                                <p>{{ str_limit(strip_tags($event->description), 250) }}
                                                <a href="{{ route('event.show', ['category' => 'school', 'slug' => $event->slug]) }}">[Red More]</a>
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                    <a href="{{ route('event.index', ['category' => 'school']) }}">
                                        <button class="btn btn-blue box-shadow">VIEW ALL EVENTS ></button>
                                    </a>
                                @endif
                            </div>
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

    <!--About Us-->
    @if ($highSchoolAboutUs)
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 px-0">
                        <div class="about-us-content">
                            <div class="img-gradient">
                                @if(file_exists('uploads/content-management/about-us/'.$highSchoolAboutUs->attachment) && $highSchoolAboutUs->attachment != '')
                                    <img class="w-100 h-100 d-block"  src="{{ asset('uploads/content-management/about-us/'.$highSchoolAboutUs->attachment) }}" alt="about-us-img">
                                @else
                                    <img class="w-100 h-100 d-block"  src="{{ asset('uploads/noimage.jpg') }}" alt="about-us-img" width="200">
                                @endif
                            </div>
                            <div class="about-desc py-5">
                                <div class="container">
                                    <div class="row justify-content-start">
                                        <div class="col-sm-12 col-md-6 col-lg-6">
                                            <h2 class="poppin-bold text-white text-uppercase">EXPLORE THE <br>
                                                VS NIKETAN SCHOOL</h2>
                                            <p class="text-white py-4">{{ str_limit(strip_tags($highSchoolAboutUs->description),300)}}</p>
                                            <a href="{{ route('about-us.index', ['category' => 'school']) }}">
                                                <button class="btn btn-white text-blue">READ MORE ></button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!--News and Updates-->
    @if (count($highSchoolNews) > 0)
        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 my-4">
                        <h2 class="poppin-bold">NEWS AND UPDATES</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable </p>
                    </div>
                    @foreach ($highSchoolNews as $news)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                            <div class="news-box bg-white border-round box-shadow">
                                <a href="{{ route('news.show', ['category' => 'school', 'slug' => $news->slug]) }}">
                                    @if(file_exists('uploads/bulletin-board-management/news/'.$news->attachment) && $news->attachment != '')
                                        <img class="border-round-top w-100"  src="{{ asset('uploads/bulletin-board-management/news/'.$news->attachment) }}" alt="{{ $news->heading}}">
                                    @else
                                        <img class="border-round-top w-100"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $news->heading}}">
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
                </div>
            </div>
        </section>
    @endif

    <!--Facilities-->
    @if (count($facilities) > 0)
        <section class="bg-white">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 mb-4">
                        <h1 class="poppin-bold my-2">FACILITIES WE PROVIDE</h1>
                        <p>It is a long established fact that a reader will be distracted by the readable </p>
                    </div>

                    @foreach ($facilities as $facility)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-4" >
                            <div class="media bg-gray p-4 border-round">
                                @if(file_exists('uploads/content-management/facilities/'.$facility->attachment) && $facility->attachment != '')
                                    <img src="{{ asset('uploads/content-management/facilities/'.$facility->attachment) }}" alt="{{ $facility->heading}}">
                                @else
                                    <img src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $facility->heading}}">
                                @endif
                                <div class="media-body">
                                    <h6 class="poppin-semibold text-capitalize ml-3 mt-3">{{ $facility->title }}</h6>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                </div>
            </div>
        </section>
    @endif
    

    <!--Achievements-->
    @if ($achievements)
        <section class="bg-achievements">
            <div class="container py-5">
                <div class="row">
                    <div class="col-12 text-center mb-4">
                        <h1 class="poppin-bold text-center text-white my-2">OUR TEACHERS AND STUDENTS
                            ACHIEVEMENTS</h1>
                        <p class="text-white">It is a long established fact that a reader will be distracted by
                            the
                            readable </p>
                    </div>
                </div>
                <div class="row py-4 text-center" >
                    <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                        <h2 class="poppin-extrabold text-white">2038 B.S.</h2>
                        <p class="text-white">YEAR FOUNDED</p>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                        <h2 class="poppin-extrabold text-white">{{ $achievements->certified_teacher}}</h2>
                        <p class="text-white">CERTIFIED TEACHERS</p>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                        <h2 class="poppin-extrabold text-white">{{ $achievements->graduated_student}}</h2>
                        <p class="text-white">TOTAL STUDENTS</p>
                    </div>

                    <div class="col-sm-12 col-md-6 col-lg-3 mb-4">
                        <h2 class="poppin-extrabold text-white">{{ $achievements->award_winner}}</h2>
                        <p class="text-white">AWARDS WINNER</p>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!--Testimonial-->
    @if (count($highSchoolTestimonials) > 0)
    <section class="bg-white">
        <div class="container testimonial">
            <div class="row py-5">
                <div class="col-12">
                    <h1 class="poppin-bold text-center my-2">TESTIMONIAL</h1>
                </div>
                <div class="col-12">
                    <div class="regular slider">
                        @foreach ($highSchoolTestimonials as $testimonial)
                            <div class="testimonial-slide text-center mt-4">
                                <p class="pad-4">{{ strip_tags($testimonial->description) }}</p>
                                <div class="text-center mt-3">
                                    @if(file_exists('uploads/testimonial/'.$testimonial->attachment) && $testimonial->attachment != '')
                                        <img src="{{ asset('uploads/testimonial/'.$testimonial->attachment) }}" alt="{{ $testimonial->full_name}}">
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
                        <p><a class="text-white" href="{{ route('admission-form.index', ['category' => 'bachelors']) }}">Click here to download ></a></p>
                    </div>
                </div>
                <!--Results-->
                <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                    <div class="result border-round box-shadow p-4">
                        <h2 class="poppin-bold text-white mb-5">DOWNLOAD ALL HIGH SCHOOL TERMINALS <br> RESULTS </h2>
                        <p><a class="text-white" href="{{ route('result.index', ['category' => 'bachelors']) }}">Click here to download ></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
@endsection