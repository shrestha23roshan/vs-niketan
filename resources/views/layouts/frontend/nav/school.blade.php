<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-light pad-lr py-2 box-shadow" id="highSchoolNav">
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
                <a class="nav-link dropdown-toggle poppin-semibold" href="#" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    School
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item poppin-semibold py-2 <?php if( (trim(Request::segment(1)) === 'school') && (trim(Request::segment(2)) === 'branch-1') ) { echo 'active'; } ?>" href="{{ route('extra', ['category' => 'school', 'slug' => 'vs-niketan-secondary-school-thapathali']) }}">Vs Niketan Secondary School Thapathali</a>
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'school') && (trim(Request::segment(2)) === 'branch-2') ) { echo 'active'; } ?>" href="{{ route('extra', ['category' => 'school', 'slug' => 'vs-niketan-elementory-school-tinkune']) }}">Vs Niketan Elementory School Tinkune</a>
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'school') && (trim(Request::segment(2)) === 'branch-3') ) { echo 'active'; } ?>" href="{{ route('extra', ['category' => 'school', 'slug' => 'vs-angels-world']) }}">VS Angels' World</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'school') && (trim(Request::segment(2)) === 'facilities') ) { echo 'active'; } ?>" href="{{ route('facilities.index', ['category' => 'school']) }}">Facilities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'school') && (trim(Request::segment(2)) === 'event') ) { echo 'active'; } ?>" href="{{ route('event.index', ['category' => 'school']) }}">Events</a>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'school') && (trim(Request::segment(2)) === 'news') ) { echo 'active'; } ?>" href="{{ route('news.index', ['category' => 'school']) }}">News & Updates</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle poppin-semibold" href="http://example.com" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Gallery
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item poppin-semibold py-2 <?php if( (trim(Request::segment(1)) === 'school') && (trim(Request::segment(2)) === 'gallery') ) { echo 'active'; } ?>" href="{{ route('gallery.index', ['category' => 'school']) }}">Images</a>
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'school') && (trim(Request::segment(2)) === 'video') ) { echo 'active'; } ?>" href="{{ route('video.index', ['category' => 'school']) }}">Videos</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link poppin-semibold <?php if( (trim(Request::segment(1)) === 'school') && (trim(Request::segment(2)) === 'alumni') ) { echo 'active'; } ?>" href="{{ route('alumni.index', ['category' => 'school']) }}">Alumni</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle poppin-semibold" href="http://example.com" id="navbarDropdownMenuLink"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Downloads
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'school') && (trim(Request::segment(2)) === 'result') ) { echo 'active'; } ?>" href="{{ route('result.index', ['category' => 'school']) }}">Results</a>
                    <a class="dropdown-item poppin-semibold py-2<?php if( (trim(Request::segment(1)) === 'school') && (trim(Request::segment(2)) === 'admission-form') ) { echo 'active'; } ?>" href="{{ route('admission-form.index', ['category' => 'school']) }}">Admission Form</a>
                </div>
            </li>
            
        </ul>
    </div>
</nav>