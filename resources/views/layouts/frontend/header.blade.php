<div class="bg-dark-red pad-lr">
    <div class="row">
        <div class="col-sm-12 col-md-9 col-lg-8">
            <div class="py-1 text-white">
                <ul>
                    <li class="d-inline-block d-md-inline"><i class="fas fa-phone-volume ml-2 mr-2"></i><a class="text-light-gray mr-2" href="tel:{{ $setting->site_phone1 }}">{{ $setting->site_phone2 }}</a>, <a class="text-light-gray" href="tel:{{ $setting->site_phone1 }}">{{ $setting->site_phone1 }}</a></li>
                    <li class="d-inline-block d-md-inline"><i class="fas fa-envelope ml-4 mr-3"></i><a class="text-light-gray" href="mailto:{{ $setting->site_email }}">{{ $setting->site_email }}</a></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-3 col-lg-4 d-none d-md-block">
            <div class="top-head mt-1 pull-right">
                <ul>
                    <li class="d-inline-block">
                        <a href="{{ $setting->facebook_url }}" target="_blank"><span class="icon-facebook ml-2"></span></a>
                    </li>
                    <li class="d-inline-block">
                        <a href="{{ $setting->twitter_url }}" target="_blank"><span class="icon-twitter ml-2"></span></a>
                    </li>
                    <li class="d-inline-block">
                        <a href="{{ $setting->youtube_url }}" target="_blank"><span class="icon-youtube ml-2"></span></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="bg-red pad-lr" id="tabs">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link poppin-medium" data-index="0" data-toggle="tab" href="#highschool" role="tab">SCHOOL</a>
                </li>
                <li class="nav-item">
                        <a class="nav-link" data-index="3" data-toggle="tab" href="#plus-two" role="tab">PLUS TWO</a>
                    </li>
                <li class="nav-item">
                    <a class="nav-link" data-index="1" data-toggle="tab" href="#bachelors" role="tab">BBA</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-index="2" data-toggle="tab" href="#masters" role="tab">EMBA</a>
                </li>
            </ul>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-6 d-none d-md-block">
            <ul class="float-right mt-2 ">
                <li class="d-inline">
                    <a class="text-white py-3 px-2 bg-light-red" href="{{ route('alumni') }}">Alumni Form</a>
                </li>
                <li class="d-inline">
                    <a class="text-white py-3 px-2 bg-light-red" href="{{ route('contacts') }}">Contacts Us</a>
                </li>
                <li class="d-inline"><a class="text-white py-3 px-2 bg-light-red" href="https://vsniketan.edu.np/webmail" target="_blank">Check Mail</a></li>
            </ul>
        </div>

    </div>
</div>