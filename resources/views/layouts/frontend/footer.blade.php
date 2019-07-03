<!--Footer-->
<footer class="bg-white">
    <div class="container">
        <div class="row pt-5">
            {{-- <div class="col-sm-12 col-md-6 col-lg-2 mb-4">
                    <img src="{{ asset('uploads/settings/'.$setting->site_logo) }}" alt="site-logo">
                <p class="poppin-semibold mt-3">OUR SCHOOL BRANCH</p>
                <ul class="mt-2">
                    <li class="d-block mr-4"><span class="icon-location mr-2"></span>{{ $setting->site_address }}</li>
                    
                </ul>
                <div class="social-links mt-4">
                    <ul>
                        <li class="d-inline-block mr-2 box-shadow">
                            <a href="{{ $setting->facebook_url }}" target="_blank"><span class="icon-facebook"></span></a>
                        </li>
                        <li class="d-inline-block mr-2 box-shadow">
                            <a href="{{ $setting->twitter_url }}" target="_blank"><span class="icon-twitter"></span></a>
                        </li>
                        <li class="d-inline-block mr-2 box-shadow">
                            <a href="{{ $setting->youtube_url }}" target="_blank"><span class="icon-youtube"></span></a>
                        </li>
                    </ul>
                </div>
            </div> --}}

            <div class="col-sm-12 col-md-6 col-lg-2 mb-4">
                <p class="link-head poppin-semibold">SCHOOL</p>
                <ul class="mt-3 list">
                    <li class="d-block mr-4 ">
                        <a href="{{ route('about-us.index', ['category' => 'school']) }}">> About Us</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('event.index', ['category' => 'school']) }}">> Events</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('news.index', ['category' => 'school']) }}">> News and Updates</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('alumni.index', ['category' => 'school']) }}">> Alumni</a>
                    </li>
                    {{-- <li class="d-block mr-4 ">
                        <a href="">> Contacts</a>
                    </li> --}}
                </ul>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-2 mb-4">
                <p class="link-head poppin-semibold">Plus Two</p>
                <ul class="mt-3 list">
                    <li class="d-block mr-4 ">
                        <a href="{{ route('about-us.index', ['category' => 'plus-two']) }}">> About Us</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('event.index', ['category' => 'plus-two']) }}">> Events</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('news.index', ['category' => 'plus-two']) }}">> News and Updates</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('alumni.index', ['category' => 'plus-two']) }}">> Alumni</a>
                    </li>
                    {{-- <li class="d-block mr-4 ">
                        <a href="">> Contacts</a>
                    </li> --}}
                </ul>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-2 mb-4">
                <p class="link-head poppin-semibold">BBA</p>
                <ul class="mt-3 list">
                    <li class="d-block mr-4 ">
                        <a href="{{ route('about-us.index', ['category' => 'bachelors']) }}">> About Us</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('event.index', ['category' => 'bachelors']) }}">> Events</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('news.index', ['category' => 'bachelors']) }}">> News and Updates</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('alumni.index', ['category' => 'bachelors']) }}">> Alumni</a>
                    </li>
                    {{-- <li class="d-block mr-4 ">
                        <a href="">> Contacts</a>
                    </li> --}}
                </ul>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-2 mb-4">
                <p class="link-head poppin-semibold">EMBA</p>
                <ul class="mt-3 list">
                    <li class="d-block mr-4 ">
                        <a href="{{ route('about-us.index', ['category' => 'masters']) }}">> About Us</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('event.index', ['category' => 'masters']) }}">> Events</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('news.index', ['category' => 'masters']) }}">> News and Updates</a>
                    </li>
                    <li class="d-block mr-4 ">
                        <a href="{{ route('alumni.index', ['category' => 'masters']) }}">> Alumni</a>
                    </li>
                    {{-- <li class="d-block mr-4 ">
                        <a href="">> Contacts</a>
                    </li> --}}
                </ul>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                <p class="link-head poppin-semibold mb-4">FIND US ON FACEBOOK</p>
                <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fvsnschool%2F&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId"
                    width="100%" height="200" style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                    allowTransparency="true" allow="encrypted-media"></iframe>
            </div>

        </div>
    </div>
</footer>
<section class="bg-blue">
    <div class="container">
        <div class="row py-2">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <p class="text-white">© 2019 VS Niketan School. All Rights Reserved. </p>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <p class="text-white float-right">Powered by: <a class="text-white" href="" target="_blank">Dradtech
                        Technology</a></p>
            </div>
        </div>
    </div>
</section>