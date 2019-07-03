@extends('layouts.backend.containerlist')

@section('header_css')
<style>
.mt{
    margin-top: 20px;
}
</style>    
@endsection

@section('dynamicdata')
    <div class="box">

        <div class="box-header with-border">
            <a href="{{ route('admin.media-management.video.create') }}"><button class="btn btn-primary">Add New &nbsp;<i class="fa fa-plus"></i></button></a>
        </div>

        <!-- /.box-header -->
        <div class="box-body">
            @include('layouts.backend.alert')
            <!--Nav-tab-->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#school" data-toggle="tab">
                        School
                    </a>
                </li>

                <li role="presentation">
                    <a href="#plus_two" data-toggle="tab">
                        Plus Two
                    </a>
                </li>

                <li role="presentation">
                    <a href="#bachelors" data-toggle="tab">
                        BBA
                    </a>
                </li>
                
                <li role="presentation">
                    <a href="#masters" data-toggle="tab">
                        EMBA
                    </a>
                </li>
            </ul>

            <div class="tab-content ">
                <!--School-->
                <div class="tab-pane fade in active mt" id="school">
                    <table id="video-table1" role="tabpanel" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Heading</th>
                                <th>Video</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody id="tablebody">
                            @foreach ($highSchoolVideo as $record)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!! str_limit($record->heading, 40) !!}</td>
                                <td class="image">
                                    @if($record->video_url)
                                        <img src="http://img.youtube.com/vi/{{ $record->video_url }}/mqdefault.jpg" alt="{{ $record->heading }}" width="200">
                                    @endif
                                  </td>
                                <td>
                                    @if($record->is_active == '1')
                                        <small class="label bg-green">Published</small>
                                    @else
                                        <small class="label bg-red">Unpublished</small>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.media-management.video.edit', $record->id) }}" title="Edit video"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;
                                    <a href="javascript:;" title="Delete video" class="delete-video" id="{{ $record->id }}"><button class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr> 
                        @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>Heading</th>
                                <th>Video</th>
                                <th>Status</th>
                                <th>Options</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!--Plus Two-->
                <div class="tab-pane fade mt" id="plus_two">
                    <table id="video-table4"  class="table table-bordered table-striped ">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Heading</th>
                            <th>Video</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody id="tablebody3">
                            @foreach ($plusTwoVideo as $record)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!! str_limit($record->heading, 40) !!}</td>
                                <td class="image">
                                    @if($record->video_url)
                                        <img src="http://img.youtube.com/vi/{{ $record->video_url }}/mqdefault.jpg" alt="{{ $record->heading }}" width="200">
                                    @endif
                                  </td>
                                <td>
                                    @if($record->is_active == '1')
                                        <small class="label bg-green">Published</small>
                                    @else
                                        <small class="label bg-red">Unpublished</small>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.media-management.video.edit', $record->id) }}" title="Edit video"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;
                                    <a href="javascript:;" title="Delete video" class="delete-video" id="{{ $record->id }}"><button class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr> 
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Heading</th>
                            <th>Video</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                <!--Bachelors-->
                <div class="tab-pane fade mt" id="bachelors">
                    <table id="video-table2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Heading</th>
                            <th>Video</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody id="tablebody1">
                            @foreach ($bachelorsVideo as $record)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!! str_limit($record->heading, 40) !!}</td>
                                <td class="image">
                                    @if($record->video_url)
                                        <img src="http://img.youtube.com/vi/{{ $record->video_url }}/mqdefault.jpg" alt="{{ $record->heading }}" width="200">
                                    @endif
                                  </td>
                                <td>
                                    @if($record->is_active == '1')
                                        <small class="label bg-green">Published</small>
                                    @else
                                        <small class="label bg-red">Unpublished</small>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.media-management.video.edit', $record->id) }}" title="Edit video"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;
                                    <a href="javascript:;" title="Delete video" class="delete-video" id="{{ $record->id }}"><button class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr> 
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Heading</th>
                            <th>Video</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                    
                <!--Masters-->
                <div class="tab-pane fade mt" id="masters">
                    <table id="video-table3"  class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Heading</th>
                            <th>Video</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody id="tablebody2">
                            @foreach ($mastersVideo as $record)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{!! str_limit($record->heading, 40) !!}</td>
                                <td class="image">
                                    @if($record->video_url)
                                        <img src="http://img.youtube.com/vi/{{ $record->video_url }}/mqdefault.jpg" alt="{{ $record->heading }}" width="200">
                                    @endif
                                  </td>
                                <td>
                                    @if($record->is_active == '1')
                                        <small class="label bg-green">Published</small>
                                    @else
                                        <small class="label bg-red">Unpublished</small>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.media-management.video.edit', $record->id) }}" title="Edit video"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;
                                    <a href="javascript:;" title="Delete video" class="delete-video" id="{{ $record->id }}"><button class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>
                                </td>
                            </tr> 
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Heading</th>
                            <th>Video</th>
                            <th>Status</th>
                            <th>Options</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.box-body -->
    </div>
  <!-- /.box -->
@endsection

@section('footer_js')
<script>
    $(document).ready(function() {
        var oTable = $('#video-table1').dataTable();

        var oTable1 = $('#video-table2').dataTable();

        var oTable2 = $('#video-table3').dataTable();

        var oTable3 = $('#video-table4').dataTable();

        /**-------- for tablebody -----------------*/
        $('#tablebody').on('click', '.delete-video', function(e){
            e.preventDefault();
            $object = $(this);
            var id = $object.attr('id');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function() {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('/admin/media-management/video') }}"+"/"+id,
                    dataType: 'json',
                    success: function(response){
                        var nRow = $($object).parents('tr')[0];
                        oTable.fnDeleteRow(nRow);
                        swal('success', response.message, 'success').catch(swal.noop);
                    },
                    error: function(e){
                        swal('Oops...', 'Something went wrong!', 'error').catch(swal.noop);
                    }
                });
            }).catch(swal.noop);
        });

        /**----------- for tablebody1 --------------*/
        $('#tablebody1').on('click', '.delete-video', function(e){
            e.preventDefault();
            $object = $(this);
            var id = $object.attr('id');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function() {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('/admin/media-management/video') }}"+"/"+id,
                    dataType: 'json',
                    success: function(response){
                        var nRow = $($object).parents('tr')[0];
                        oTable1.fnDeleteRow(nRow);
                        swal('success', response.message, 'success').catch(swal.noop);
                    },
                    error: function(e){
                        swal('Oops...', 'Something went wrong!', 'error').catch(swal.noop);
                    }
                });
            }).catch(swal.noop);
        });

        /**----------- for tablebody2 --------------*/
        $('#tablebody2').on('click', '.delete-video', function(e){
            e.preventDefault();
            $object = $(this);
            var id = $object.attr('id');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function() {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('/admin/media-management/video') }}"+"/"+id,
                    dataType: 'json',
                    success: function(response){
                        var nRow = $($object).parents('tr')[0];
                        oTable2.fnDeleteRow(nRow);
                        swal('success', response.message, 'success').catch(swal.noop);
                    },
                    error: function(e){
                        swal('Oops...', 'Something went wrong!', 'error').catch(swal.noop);
                    }
                });
            }).catch(swal.noop);
        });

        /**------------ for tablebody3 -------------*/
        $('#tablebody3').on('click', '.delete-video', function(e){
            e.preventDefault();
            $object = $(this);
            var id = $object.attr('id');
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function() {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('/admin/media-management/video') }}"+"/"+id,
                    dataType: 'json',
                    success: function(response){
                        var nRow = $($object).parents('tr')[0];
                        oTable3.fnDeleteRow(nRow);
                        swal('success', response.message, 'success').catch(swal.noop);
                    },
                    error: function(e){
                        swal('Oops...', 'Something went wrong!', 'error').catch(swal.noop);
                    }
                });
            }).catch(swal.noop);
        });
    });
</script>
@endsection
