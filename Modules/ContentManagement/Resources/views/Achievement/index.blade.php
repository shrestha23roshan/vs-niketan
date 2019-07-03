@extends('layouts.backend.containerlist')

@section('dynamicdata')
<div class="box">
    <!-- /.box-header -->
    <div class="box-body">
      @include('layouts.backend.alert')
      <table id="example" class="table table-bordered table-striped achievement-table">
        <thead>
        <tr>
            <th>SN</th>
            <th>Certified Teacher</th>
            <th>Graduated Students</th>
            <th>Awards Winner</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        </thead>
       
        <tbody id="tablebody">
               @foreach ($achievements as $index => $record)
                   <tr>
                      <td>{{ $index + 1}}</td>
                      <td>{{ $record->certified_teacher }}</td>
                      <td>{{ $record->graduated_student }}</td>
                      <td>{{ $record->award_winner }}</td>
                      <td>
                          @if($record->is_active == '1')
                          <small class="label bg-green">Published</small>
                          @else
                          <small class="label bg-red">Unpublished</small>
                          @endif
                      </td>
                      <td>
                          <a href="{{ route('admin.content-management.achievements.edit', $record->id) }}" title="Edit message"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></button></a>&nbsp;
                      </td>
                   </tr>
               @endforeach
        </tbody>

        <tfoot>
        <tr>
            <th>SN</th>
            <th>Certified Teacher</th>
            <th>Graduated Students</th>
            <th>Awards Winner</th>
            <th>Status</th>
            <th>Options</th>
        </tr>
        </tfoot>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->
@endsection