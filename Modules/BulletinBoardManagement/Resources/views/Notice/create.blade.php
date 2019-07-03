@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#noticeAddForm').formValidation({
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
                subject: {
                    validators: {
                        notEmpty: {
                            message: 'Subject field is required.'
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
                description: {
                        validators: {
                            notEmpty: {
                                message: 'Description field is required.'
                            },
                        }
                    },
            }
        }).on('blur', '[name="subject"]', function(e){
            $('#noticeAddForm').formValidation('revalidateField', 'subject');
            $('#noticeAddForm').formValidation('revalidateField', 'description');
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
                            $('#noticeAddForm').formValidation('revalidateField', e.sender.name);
                        });
                });
    });
</script>

@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Notice</h3>
</div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="noticeAddForm" method="POST" action="{{ route('admin.bulletin-board-management.notice.store') }}" enctype="multipart/form-data">
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
                <label for="subject">Subject *</label>
                <input type="text" name="subject" class="form-control" id="subject" placeholder="Enter Subject." value="{{ old('subject') }}" >
            </div>

            <div class="form-group">
                <div class="form-group has-feedback">
                    <label for="date">Date *</label>
                    <input type="text" class="form-control" name="date" id="datepicker" placeholder="Select date.">
                    <span class="fa fa-calendar form-control-feedback"></span>
                </div>
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