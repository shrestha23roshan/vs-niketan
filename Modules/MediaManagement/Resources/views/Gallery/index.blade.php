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
            <a href="{{ route('admin.media-management.gallery.create') }}"><button class="btn btn-primary">Add New &nbsp;<i class="fa fa-plus"></i></button></a>
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
                    <table id="gallery-table1" role="tabpanel" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Cover image</th>
                                <th>Status</th>
                                <th>Options</th>
                                <th>Others</th>
                            </tr>
                        </thead>
                        <tbody id="tablebody">
                           @foreach ($highSchoolGallery as $record)
                               <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $record->name}}</td>
                                    <td class="image">
                                        @if($record->attachment)
                                            <img src="{{ asset('uploads/media-management/gallery/' . $record->attachment) }}" alt="{{ $record->name }}" width="200">
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
                                        <a href="{{ route('admin.media-management.gallery.edit', $record->id) }}" title="Edit gallery"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;
                                        <a href="javascript:;" title="Delete gallery" class="delete-gallery" id="{{ $record->id }}"><button class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                    <td>
                                        <a href="{!! route('admin.media-management.gallery.photo.show', $record->id) !!}" title="View Photos" ><button type="button" class="btn bg-purple btn-circle waves-effect waves-circle waves-float"><i class="fa fa-eye"></i></button></a>&nbsp;
                                        <a href="{!! route('admin.media-management.gallery.photo.create', $record->id) !!}" title="Add Photo" ><button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float"><i class="fa fa-camera-retro"></i></button></a>
                                    </td>
                               </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SN</th>
                                <th>Name</th>
                                <th>Cover image</th>
                                <th>Status</th>
                                <th>Options</th>
                                <th>Others</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!--Plus Two-->
                <div class="tab-pane fade mt" id="plus_two">
                    <table id="gallery-table4"  class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Cover image</th>
                            <th>Status</th>
                            <th>Options</th>
                            <th>Others</th>
                        </tr>
                        </thead>
                        <tbody id="tablebody3">
                            @foreach ($plusTwoGallery as $record)
                                <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $record->name}}</td>
                                     <td class="image">
                                         @if($record->attachment)
                                             <img src="{{ asset('uploads/media-management/gallery/' . $record->attachment) }}" alt="{{ $record->name }}" width="200">
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
                                         <a href="{{ route('admin.media-management.gallery.edit', $record->id) }}" title="Edit gallery"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;
                                         <a href="javascript:;" title="Delete gallery" class="delete-gallery" id="{{ $record->id }}"><button class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>
                                     </td>
                                     <td>
                                        <a href="{!! route('admin.media-management.gallery.photo.show', $record->id) !!}" title="View Photos" ><button type="button" class="btn bg-purple btn-circle waves-effect waves-circle waves-float"><i class="fa fa-eye"></i></button></a>&nbsp;
                                        <a href="{!! route('admin.media-management.gallery.photo.create', $record->id) !!}" title="Add Photo" ><button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float"><i class="fa fa-camera-retro"></i></button></a>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Cover image</th>
                            <th>Status</th>
                            <th>Options</th>
                            <th>Others</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                <!--Bachelors-->
                <div class="tab-pane fade mt" id="bachelors">
                    <table id="gallery-table2" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Cover image</th>
                            <th>Status</th>
                            <th>Options</th>
                            <th>Others</th>
                        </tr>
                        </thead>
                        <tbody id="tablebody1">
                            @foreach ($bachelorsGallery as $record)
                               <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $record->name}}</td>
                                    <td class="image">
                                        @if($record->attachment)
                                            <img src="{{ asset('uploads/media-management/gallery/' . $record->attachment) }}" alt="{{ $record->name }}" width="200">
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
                                        <a href="{{ route('admin.media-management.gallery.edit', $record->id) }}" title="Edit gallery"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;
                                        <a href="javascript:;" title="Delete gallery" class="delete-gallery" id="{{ $record->id }}"><button class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                    <td>
                                        <a href="{!! route('admin.media-management.gallery.photo.show', $record->id) !!}" title="View Photos" ><button type="button" class="btn bg-purple btn-circle waves-effect waves-circle waves-float"><i class="fa fa-eye"></i></button></a>&nbsp;
                                        <a href="{!! route('admin.media-management.gallery.photo.create', $record->id) !!}" title="Add Photo" ><button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float"><i class="fa fa-camera-retro"></i></button></a>
                                    </td>
                               </tr>
                           @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Cover image</th>
                            <th>Status</th>
                            <th>Options</th>
                            <th>Others</th>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                    
                <!--Masters-->
                <div class="tab-pane fade mt" id="masters">
                    <table id="gallery-table3"  class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Cover image</th>
                            <th>Status</th>
                            <th>Options</th>
                            <th>Others</th>
                        </tr>
                        </thead>
                        <tbody id="tablebody2">
                            @foreach ($mastersGallery as $record)
                                <tr>
                                     <td>{{ $loop->iteration }}</td>
                                     <td>{{ $record->name}}</td>
                                     <td class="image">
                                         @if($record->attachment)
                                             <img src="{{ asset('uploads/media-management/gallery/' . $record->attachment) }}" alt="{{ $record->name }}" width="200">
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
                                         <a href="{{ route('admin.media-management.gallery.edit', $record->id) }}" title="Edit gallery"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;
                                         <a href="javascript:;" title="Delete gallery" class="delete-gallery" id="{{ $record->id }}"><button class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>
                                     </td>
                                     <td>
                                        <a href="{!! route('admin.media-management.gallery.photo.show', $record->id) !!}" title="View Photos" ><button type="button" class="btn bg-purple btn-circle waves-effect waves-circle waves-float"><i class="fa fa-eye"></i></button></a>&nbsp;
                                        <a href="{!! route('admin.media-management.gallery.photo.create', $record->id) !!}" title="Add Photo" ><button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float"><i class="fa fa-camera-retro"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <th>SN</th>
                            <th>Name</th>
                            <th>Cover image</th>
                            <th>Status</th>
                            <th>Options</th>
                            <th>Others</th>
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
<script type="text/javascript">
    $(document).ready(function() {
        var oTable = $('#gallery-table1').dataTable();
        var oTable1 = $('#gallery-table2').dataTable();
        var oTable2 = $('#gallery-table3').dataTable();
        var oTable3 = $('#gallery-table4').dataTable();

        /**--------for tablebody-----------------*/
        $('#tablebody').on('click', '.delete-gallery', function(e){
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
                    url: "{{ url('/admin/media-management/gallery') }}"+"/"+id,
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

        /**-----------for tablebody1--------------*/
        $('#tablebody1').on('click', '.delete-gallery', function(e){
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
                    url: "{{ url('/admin/media-management/gallery') }}"+"/"+id,
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

        /**-----------for tablebody2--------------*/
        $('#tablebody2').on('click', '.delete-gallery', function(e){
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
                    url: "{{ url('/admin/media-management/gallery') }}"+"/"+id,
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

        /**------------for tablebody3-------------*/
        $('#tablebody3').on('click', '.delete-gallery', function(e){
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
                    url: "{{ url('/admin/media-management/gallery') }}"+"/"+id,
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


