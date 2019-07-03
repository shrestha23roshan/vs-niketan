@php 
    $countBanners = Modules\MediaManagement\Entities\Banner::count();
    $countNews = Modules\BulletinBoardManagement\Entities\News::count(); 
    $countNotices = Modules\BulletinBoardManagement\Entities\Notice::count(); 
    $countTestimonials = Modules\Testimonial\Entities\Testimonial::count(); 
@endphp 

@extends('layouts.backend.container')

@section('dynamicdata')

    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-aqua" style="margin: 20px; padding: 30px">
                <div class="inner">
                    <h3>{{ $countBanners }}</h3>

                    <p>Banners</p>
                </div>
                <div class="icon">
                    <i class="ion ion-images" style="padding: 10px;"></i>
                </div>
                <a href="{{ route('admin.media-management.banner.index') }}" class="small-box-footer" style="padding: 10px;">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-green" style="margin: 20px; padding:  30px ">
                <div class="inner">
                    <h3>{{ $countNews }}</h3>

                    <p>News</p>
                </div>
                <div class="icon">
                    <i class="fa fa-newspaper-o" style="padding: 10px;"></i>
                </div>
                <a href="{{ route('admin.bulletin-board-management.news.index') }}" class="small-box-footer" style="padding: 10px;">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-yellow" style="margin: 20px; padding:  30px">
                <div class="inner">
                    <h3>{{ $countNotices }}</h3>

                    <p>Notices</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bell-o" style="padding: 10px;"></i>
                </div>
                <a href="{{ route('admin.bulletin-board-management.notice.index') }}" class="small-box-footer" style="padding: 10px;">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-6 col-xs-12">
            <!-- small box -->
            <div class="small-box bg-red" style="margin: 20px; padding:  30px">
                <div class="inner">
                    <h3>{{ $countTestimonials }}</h3>

                    <p>Testimonials</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users" style="padding: 10px;"></i>
                </div>
                <a href="{{ route('admin.testimonial.index') }}" class="small-box-footer" style="padding: 10px;">More info
                    <i class="fa fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->
    
@endsection