@extends('layouts.backend.containerlist') @section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebar li').removeClass('active');
        $('#sidebar a').removeClass('active');
        $('#sidebar').find('#contents').addClass('active');
        $('#sidebar').find('#downloads').addClass('active');

        var oTable = $('#alumni-table').dataTable();

        $('#alumni-table').on('click','.change-status',function(e){
            e.preventDefault();
            $object = $(this);
            var id = $object.attr('id');
            swal({
              title: 'Are you sure?',
              text: "You are going to change the status!",
              type: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, change it!'
            }).then(function () {
                $.ajax({
                    type: "PUT",
                    url: "{{ url('/admin/alumni/change/status/') }}",
                    data:{id:id},
                    dataType: 'json',
                    success: function(response){
                        swal('Success',response.message, 'success');
                        if (response.alumni.is_active == 1) {
                            $($object).children().removeClass('bg-red').html('<i class="fa fa-ban"></i>');
                            $($object).children().addClass('bg-blue').html('<i class="fa fa-check"></i>');
                            $($object).attr('title', 'Deactivate');
                        } else {
                            $($object).children().removeClass('bg-blue').html('<i class="fa fa-check"></i>');
                            $($object).children().addClass('bg-red').html('<i class="fa fa-ban"></i>');
                            $($object).attr('title', 'Activate');
                        }
                    },
                    error: function(e){
                        swal('Oops...','Something went wrong!','error');
                    }
                });
            });            
        });

        $('#alumni-table').on('click', '.delete-alumni', function (e) {
            e.preventDefault();
            $object = $(this);
            var id = $object.attr('id');
            debugger;
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then(function () {
                $.ajax({
                    type: "DELETE",
                    url: "{{ url('/admin/alumni/') }}" + "/" + id,
                    dataType: 'json',
                    success: function (response) {
                        if (response.type == 'success') {
                            var nRow = $($object).parents('tr')[0];
                            oTable.fnDeleteRow(nRow);
                            swal('Success', response.message, 'success');
                        } else {
                            swal('Warning', response.message, 'error');
                        }
                    },
                    error: function (e) {
                        swal('Oops...', 'Something went wrong!', 'error');
                    }
                });
            });
        });
    });
</script>
@endsection @section('dynamicdata')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <!-- /.box-header -->
            <div class="box-body">
                <table id="alumni-table" class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>
                                SN
                            </th>
                            <th>
                                Full Name
                            </th>
                            <th>
                                Batch
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Options
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tablebody">
                        @foreach($alumni as $index=>$record)
                        <tr class="gradeX" id="download_{{ $record->id }}">
                            <td>
                                {{ $index+1 }}
                            </td>
                            <td>
                                {{ $record->full_name }}
                            </td>
                            <td>
                                {{ $record->batch }}
                            </td>
                            <td class="center is_active">
                                @if($record->is_active == 1)
                                <a href="javascript:;" class="change-status" title="Deactivate" id="{{ $record->id }}"><button type="button" class="btn bg-blue btn-circle waves-effect waves-circle waves-float"><i class="fa fa-check"></i></button></a>
                                @else
                                <a href="javascript:;" class="change-status" title="Activate" id="{{ $record->id }}"><button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float"><i class="fa fa-ban"></i></button></a>
                                @endif
                            </td>
                            <td>
                                <a href="{!! route('admin.alumni.show', $record->id) !!}" title="View Alumni">
                                    <button type="button" class="btn bg-purple btn-circle waves-effect waves-circle waves-float">
                                        <i class="fa fa-eye"></i>
                                    </button>
                                </a>&nbsp;
                                <a class="delete-alumni" href="javascript:;" id="{{ $record->id }}" title="Delete Alumni">
                                    <button type="button" class="btn bg-red btn-circle waves-effect waves-circle waves-float">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>
                                SN
                            </th>
                            <th>
                                Full Name
                            </th>
                            <th>
                                Batch
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                                Options
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        @stop
