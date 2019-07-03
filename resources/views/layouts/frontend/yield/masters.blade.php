@section('dynamic-masters-data')
    <!--Banner-->
    @if (count($masterBanners) > 0)
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $count = 1; ?>
                @if( count($masterBanners) > 0)
                    @foreach($masterBanners as $banner)
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
    @if ($masterMessages)
        <section class="bg-white  py-5">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-8">
                        <p class="text-red">{!! $masterMessages->designation !!} Message</p>
                        <h1 class="poppin-bold text-black text-uppercase">{!! $masterMessages->heading !!}</h1>
                        <p>{!! $masterMessages->description !!}</p>
                        <p class="poppin-semibold">{!! $masterMessages->name !!}</p>
                        <p>- {!! $masterMessages->designation !!}</p>
                    </div>

                    <div class="col-sm-12 col-md-12 col-lg-4">
                        @if(file_exists('uploads/content-management/message/'.$masterMessages->attachment) && $masterMessages->attachment != '')
                            <img class="w-100 d-block box-shadow border-round"  src="{{ asset('uploads/content-management/message/'.$masterMessages->attachment) }}" alt="{{ $masterMessages->heading }}" width="200">
                        @else
                            <img class="w-100 d-block box-shadow border-round"  src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $masterMessages->heading }}" width="200">
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
                                    <div id="masters-calendar"></div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6 col-lg-6 mb-4">
                                @if (count($masterEvents) > 0)
                                    @foreach ($masterEvents as $event)
                                        <div class="row mb-4">
                                            <div class="col-3">
                                                <div class="border-blue border-round text-center">
                                                    <h3 class="poppin-bold mb-0 text-blue">{{ $event->getDate() }}</h3>
                                            </div>
                                            <div class="col-9">
                                                <h4><a class="poppin-medium text-black" href="{{ route('event.show', ['category' => 'school', 'slug' => $event->slug]) }}">{{ str_limit(strip_tags($event->heading), 60) }}</a></h4>
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
                @if (count($masterNotices) > 0)
                    <div class="col-sm-12 col-md-12 col-lg-4 mb-4">
                        <div class="box bg-white border-round box-shadow h-100">
                            <h2 class="poppin-bold p-3">NOTICES</h2>
                            <div class="notice-lst p-4">
                                <ul>
                                    @foreach ($masterNotices as $notice)
                                    <li>
                                        <p><span class="icon-calendar mr-3"></span>{{ $notice->getDate() }}</p>
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

    <!--About Us-->
    @if ($masterAboutUs)
        <section>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 px-0">
                        <div class="about-us-content">
                            <div class="img-gradient">
                                @if(file_exists('uploads/content-management/about-us/'.$masterAboutUs->attachment) && $masterAboutUs->attachment != '')
                                    <img class="w-100 h-100 d-block"  src="{{ asset('uploads/content-management/about-us/'.$masterAboutUs->attachment) }}" alt="about-us-img">
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
                                            <p class="text-white py-4">{{ str_limit(strip_tags($masterAboutUs->description),300)}}</p>
                                            <a href="{{ route('about-us.index', ['category' => 'masters']) }}">
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
    @if (count($masterNews) > 0)
        <section>
            <div class="container py-5">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 my-4">
                        <h2 class="poppin-bold">NEWS AND UPDATES</h2>
                        <p>It is a long established fact that a reader will be distracted by the readable </p>
                    </div>
                    @foreach ($masterNews as $news)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                            <div class="news-box bg-white border-round box-shadow">
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
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
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
                <div class="row py-4 text-center">
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
    @if (count($masterTestimonials) > 0)
        <section class="bg-white">
            <div class="container testimonial">
                <div class="row py-5">
                    <div class="col-12">
                        <h1 class="poppin-bold text-center my-2">TESTIMONIAL</h1>
                    </div>
                    <div class="col-12">
                        <div class="regular slider">
                            @foreach ($masterTestimonials as $testimonial)
                                <div class="testimonial-slide text-center mt-4">
                                    <p class="pad-4">{{ strip_tags($testimonial->description) }}</p>
                                    <div class="text-center mt-3">
                                        @if(file_exists('uploads/testimonial/'.$testimonial->attachment) && $testimonial->attachment != '')
                                            <img src="{{ asset('uploads/testimonial/'.$testimonial->attachment) }}" alt="{{ $testimonial->full_name}}">
                                        @else
                                            <img src="{{ asset('uploads/noimage.jpg') }}" alt="{{ $testimonial->full_name}}">
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
                <div class="col-sm-12 col-md-4 col-lg-4">
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