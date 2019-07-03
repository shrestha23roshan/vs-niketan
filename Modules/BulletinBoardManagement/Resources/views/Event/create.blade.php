@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#eventAddForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                category_id: {
                    validators: {
                        notEmpty: {
                            message: 'Category Id field is required.'
                        }
                    }
                },
                heading: {
                    validators: {
                        notEmpty: {
                            message: 'heading field is required.'
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
                            message: "venue Field is required."
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
            $('#eventAddForm').formValidation('revalidateField', 'heading');
            $('#eventAddForm').formValidation('revalidateField', 'description');
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
                            $('#eventAddForm').formValidation('revalidateField', e.sender.name);
                        });
                });
    });
</script>

@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Event</h3>
</div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="eventAddForm" method="POST" action="{{ route('admin.bulletin-board-management.event.store') }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')

            <div class="form-group">
                <label for="category_id">Category *</label>
                <select class="form-control" name="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="heading">Heading *</label>
                <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter Heading." value="{{ old('heading') }}" >
            </div>

            <div class="form-group">
                <div class="form-group has-feedback">
                    <label for="date">Date *</label>
                    <input type="text" class="form-control" name="date" id="datepicker" placeholder="Select date.">
                    <span class="fa fa-calendar form-control-feedback"></span>
                </div>
            </div>

            <div class="form-group">
                <label for="venue">Venue *</label>
                <input type="text" name="venue" class="form-control" id="venue" placeholder="Enter Venue." value="{{ old('venue') }}" >
            </div>

            <div class="form-group">
                <label for="description">Description *</label>
                <textarea class="form-control" id="description" name="description">{!! old('description') !!}</textarea>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1">Published</option>
                <option value="0">Unpublished</option>
                </select>
            </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>

@endsection