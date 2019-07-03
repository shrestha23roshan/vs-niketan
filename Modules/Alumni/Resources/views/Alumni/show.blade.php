@extends('layouts.backend.containerlist') 

@section('footer_js')

@endsection 

@section('dynamicdata')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header bg-aqua-active">
                <h3 class="box-title">ALUMNI DETAIL</h3>
            </div>
          
            <div class="row">

                <div class="col-xs-12 col-lg-4">
                    <div class="image-section" style="padding: 15px;">
                        <img src="{{ asset('uploads/alumni/' . $alumni->attachment) }}" alt="alumni-image" style="width: 100%;">
                    </div>
                </div>
                    <div class="col-xs-12 col-lg-8">
                        <div class="box-body" style="margin-top: 10px; font-size: 16px;">
                                <p><label>Name: </label> {{ $alumni->full_name }}</p>
                                <p><label>Batch:</label> {{ $alumni->batch }}</p>
                                <p><label>Email:</label> {{ $alumni->email }}</p>
                                <p><label>Phone No:</label> {{ $alumni->phone_no }}</p>
                                <p><label>Address:</label> {{ $alumni->address }}</p>
                                <p><label>Occupation:</label> {{ $alumni->occupation }}</p>
                        </div>
                        <!-- /.box-body -->
                    </div>
            </div>
        </div>
        <!-- /.box -->

        @stop
