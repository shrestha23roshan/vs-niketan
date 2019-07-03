<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light pad-lr py-2 box-shadow" id="plus-twoNav">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ asset('uploads/settings/'.$setting->site_logo) }}" alt="site-logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05"
        aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample05">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link poppin-semibold" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'plus-two') && (trim(Request::segment(2)) === 'about-us') ) { echo 'active'; } ?>" href="{{ route('about-us.index', ['category' => 'plus-two']) }}">About Us</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle poppin-semibold" href="#" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Plus Two
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'plus-two') && (trim(Request::segment(2)) === 'about-us') ) { echo 'active'; } ?>" href="{{ route('about-us.index', ['category' => 'plus-two']) }}">About Plus Two</a>
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'plus-two') && (trim(Request::segment(2)) === 'academic-programmes') ) { echo 'active'; } ?>" href="{{ route('extra', ['category' => 'plus-two', 'slug' => 'academic-programmes']) }}">Academic Programmes</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'plus-two') && (trim(Request::segment(2)) === 'facilities') ) { echo 'active'; } ?>" href="{{ route('facilities.index', ['category' => 'plus-two']) }}">Facilities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'plus-two') && (trim(Request::segment(2)) === 'event') ) { echo 'active'; } ?>" href="{{ route('event.index', ['category' => 'plus-two']) }}">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'plus-two') && (trim(Request::segment(2)) === 'news') ) { echo 'active'; } ?>" href="{{ route('news.index', ['category' => 'plus-two']) }}">News & Updates</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle poppin-semibold" href="http://example.com" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gallery
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'plus-two') && (trim(Request::segment(2)) === 'gallery') ) { echo 'active'; } ?>" href="{{ route('gallery.index', ['category' => 'plus-two']) }}">Images</a>
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'plus-two') && (trim(Request::segment(2)) === 'video') ) { echo 'active'; } ?>" href="{{ route('video.index', ['category' => 'plus-two']) }}">Videos</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'plus-two') && (trim(Request::segment(2)) === 'alumni') ) { echo 'active'; } ?>" href="{{ route('alumni.index', ['category' => 'plus-two']) }}">Alumni</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle poppin-semibold" href="http://example.com" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Downloads
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'plus-two') && (trim(Request::segment(2)) === 'result') ) { echo 'active'; } ?>" href="{{ route('result.index', ['category' => 'plus-two']) }}">Results</a>
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'plus-two') && (trim(Request::segment(2)) === 'admission-form') ) { echo 'active'; } ?>" href="{{ route('admission-form.index', ['category' => 'plus-two']) }}">Admission Form</a>
                </div>
            </li>
            
        </ul>
    </div>
</nav>