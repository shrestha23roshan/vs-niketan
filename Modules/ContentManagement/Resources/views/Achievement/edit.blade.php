@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#achievementEditForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                    certified_teacher: {
                            validators: {
                                notEmpty: {
                                    message: 'Certified Teacher field is required.'
                                },
                            }
                        },
                    graduated_student: {
                        validators: {
                            notEmpty: {
                                message: 'Graduated Student field is required.'
                            },
                        }
                    },
                    award_winner: {
                            validators: {
                                notEmpty: {
                                    message: 'Award Winner field is required.'
                                },
                            }
                        },
                }
        })
            
    });

</script>

@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
            <h3 class="box-title">Edit Achievement</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="achievementEditForm" method="POST" action="{{ route('admin.content-management.achievements.update', $achievement->id) }}">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')
            <div class="form-group">
                <label for="certified_teacher">Certified Teacher *</label>
                <input type="text" name="certified_teacher" class="form-control" id="certified_teacher" placeholder="Enter Certified Teacher." value="{{ $achievement->certified_teacher }}" >
            </div>

            <div class="form-group">
                <label for="graduated_student">Graduated Student *</label>
                <input type="text" name="graduated_student" class="form-control" id="graduated_student" placeholder="Enter Graduated Student." value="{{ $achievement->graduated_student }}" >
            </div>

            <div class="form-group">
                <label for="award_winner">Award Winner *</label>
                <input type="text" name="award_winner" class="form-control" id="award_winner" placeholder="Enter Award Winner." value="{{ $achievement->award_winner }}" >
            </div>
            
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1" {{ ($achievement->is_active == 1) ? 'selected=selected' : '' }}>Published</option>
                <option value="0" {{ ($achievement->is_active == 0) ? 'selected=selected' : '' }}>Unpublished</option>
                </select>
            </div>
        </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <input type="hidden" name="_method" value="PUT">
    </form>
</div>
@endsection