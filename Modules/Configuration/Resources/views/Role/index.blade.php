@extends('layouts.backend.containerlist') 

@section('dynamicdata')

<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">ROLES</h3>
        <ul class="header-dropdown m-r--5 pull-right">
            <li class="dropdown" style="list-style : none;">
               <a href="{{ route('admin.privilege.role.create') }}"><button type="button" class="btn btn-primary waves-effect">ADD NEW <b>+</b></button></a>
            </li>
        </ul>
      </div>

      <!-- /.box-header -->
      <div class="box-body">
      
      @include('layouts.backend.alert')

        <table id="example1" class="table table-bordered table-hover role-table">
          <thead>
            <tr>
              <th>SN</th>
              <th>RoleName</th>
              <th>Option</th>
            </tr>
          </thead>
          <tbody id="tablebody">
   
          @foreach($roles as $index=>$role)
              <tr class="gradeX" id="row_{{ $role->id }}">
                <td class="index">
                      {{ ++$index }}
              </td>
              <td class="name">
                    {{ $role->role }}
              </td>
              <td>
                {{-- <a class="edit-role" href="{{ route('admin.privilege.role.edit', $role->id) }}" id="{{ $role->id }}" title="Edit Role">
                  &nbsp;<i class="fa fa-pencil"></i>
                </a>&nbsp; --}}

                <a href="{{ route('admin.privilege.role.edit', $role->id) }}" id="{{ $role->id }}" title="Edit Role"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;

                <a href="javascript:;" title="Delete role" class="delete-role" id="{{ $role->id }}"><button type="button" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button></a>

              </td>
              </tr>
          @endforeach
          </tbody>
            <tfoot>
              <tr>
                <th>SN</th>
                <th>RoleName</th>
                <th>Option</th>
              </tr>
            </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
    @endsection

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function() {
        var oTable = $('.role-table').dataTable();

        $('#tablebody').on('click', '.delete-role', function(e){
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
                url: "{{ url('/admin/privilege/role') }}"+"/"+id,
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
    });
</script>
@endsection
