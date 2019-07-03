@section('title', $seo->meta_title)
@section('meta_tags', $seo->meta_tags)
@section('meta_description', $seo->meta_description)
@extends('layouts.frontend.container')

@section('footer_js')
<script>
    $(document).ready(function() {
        // on load of the page: switch to the currently selected tab
        $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
            localStorage.setItem('activeTab', $(e.target).attr('href'));
        });
        
        let activeTab = localStorage.getItem('activeTab');
        if(activeTab){
            $('.nav-tabs a[href="' + activeTab + '"]').tab('show');
        }
    });
</script>    
@endsection

<!--School-->
@include('layouts.frontend.yield.school')

<!--Plus Two-->
@include('layouts.frontend.yield.plus-two')

<!--Bachelors-->
@include('layouts.frontend.yield.bachelors')

<!--Masters-->
@include('layouts.frontend.yield.masters')

