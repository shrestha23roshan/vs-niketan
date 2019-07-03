@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#eventEditForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                    heading: {
                        validators: {
                            notEmpty: {
                                message: 'Heading field is required.'
                            }
                        }
                    },
                    date: {
                        validators: {
                            notEmpty: {
                                message: "Date Field is required."
                            }
                        }
                    },
                    venue: {
                        validators: {
                            notEmpty: {
                                message: 'Venue field is required.'
                            }
                        }
                    },
                    description: {
                            validators: {
                                notEmpty: {
                                    message: 'Description field is required.'
                                },
                            }
                        },
               
                }
        }).on('blur', '[name="heading"]', function(e){
            $('#eventEditForm').formValidation('revalidateField', 'heading');
            $('#eventEditForm').formValidation('revalidateField', 'description');
        })
        .find('[name="description"]')
                .each(function () {
                    $(this)
                        .ckeditor({
                            allowedContent: true, // for allowing tags
                            removePlugins: 'sourcearea' // disable source area
                        })
                        .editor
                        .on('change', function (e) {
                            $('#eventEditForm').formValidation('revalidateField', e.sender.name);
                        });
                });
    });
</script>

<script>
    $("#file-upload").change(function(){
        $("#file-name").text(this.files[0].name);
    });
</script>
@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
            <h3 class="box-title">Edit Event</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="eventEditForm" method="POST" action="{{ route('admin.bulletin-board-management.event.update', $event->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')

            <div class="form-group">
                <label for="heading">Heading *</label>
                <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter Heading." value="{{ $event->heading }}" >
            </div>

            <div class="form-group">
                <div class="form-group has-feedback">
                    <label for="date">Date *</label>
                <input type="text" class="form-control" name="date" id="datepicker" placeholder="Select date." value="{{ $event->date}}">
                    <span class="fa fa-calendar form-control-feedback"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="venue">Venue *</label>
                <input type="text" name="venue" class="form-control" id="venue" placeholder="Enter Venue." value="{{ $event->venue }}" >
            </div>
        
            <div class="form-group">
                <label for="description">Description *</label>
                <textarea class="form-control" id="description" name="description">{!! $event->description !!}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1" {{ ($event->is_active == 1) ? 'selected=selected' : '' }}>Published</option>
                <option value="0" {{ ($event->is_active == 0) ? 'selected=selected' : '' }}>Unpublished</option>
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