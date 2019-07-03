<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light pad-lr py-2 box-shadow" id="mastersNav">
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
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle poppin-semibold" href="http://example.com" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Masters
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'masters') && (trim(Request::segment(2)) === 'about-us') ) { echo 'active'; } ?>" href="{{ route('about-us.index', ['category' => 'masters']) }}">About Masters</a>
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'masters') && (trim(Request::segment(2)) === 'extra') ) { echo 'active'; } ?>" href="{{ route('extra', ['category' => 'masters', 'slug' => 'emba-course-structure']) }}">EMBA Course Structure</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'masters') && (trim(Request::segment(2)) === 'facilities') ) { echo 'active'; } ?>" href="{{ route('facilities.index', ['category' => 'masters']) }}">Facilities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'masters') && (trim(Request::segment(2)) === 'event') ) { echo 'active'; } ?>" href="{{ route('event.index', ['category' => 'masters']) }}">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'masters') && (trim(Request::segment(2)) === 'news') ) { echo 'active'; } ?>" href="{{ route('news.index', ['category' => 'masters']) }}">News & Updates</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle poppin-semibold" href="http://example.com" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gallery
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'masters') && (trim(Request::segment(2)) === 'gallery') ) { echo 'active'; } ?>" href="{{ route('gallery.index', ['category' => 'masters']) }}">Images</a>
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'masters') && (trim(Request::segment(2)) === 'video') ) { echo 'active'; } ?>" href="{{ route('video.index', ['category' => 'masters']) }}">Videos</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'masters') && (trim(Request::segment(2)) === 'alumni') ) { echo 'active'; } ?>" href="{{ route('alumni.index', ['category' => 'masters']) }}">Alumni</a>
            </li>
            
        </ul>
    </div>
</nav>