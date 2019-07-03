@extends('layouts.backend.containerform')

@section('footer_js')
    <script type="text/javascript">
        $(document).ready(function () {
            
            $('#videoEditForm').formValidation({
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
                                message: 'heading field is required.'
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
                    video_url: {
                        validators: {
                            notEmpty: {
                                message: 'Video URL field is required.'
                            },
                            uri: {
                                message: 'Youtube URL link is not valid.'
                            }
                        }
                    },
                }
            }).on('blur', '[name="heading"]', function(e){
                $('#videoEditForm').formValidation('revalidateField', 'heading');
                $('#videoEditForm').formValidation('revalidateField', 'description');
            }).find('[name="description"]')
                .each(function () {
                    $(this)
                        .ckeditor({
                            allowedContent: true, // for allowing tags
                            removePlugins: 'sourcearea' // disable source area
                        })
                        .editor
                        .on('change', function (e) {
                            $('#videoEditForm').formValidation('revalidateField', e.sender.name);
                        });
                });
        });
    </script>
@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
            <h3 class="box-title">Edit Video</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="videoEditForm" method="POST" action="{{ route('admin.media-management.video.update', $video->id) }}">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')

            <div class="form-group">
                <label for="heading">Heading *</label>
                <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter Heading." value="{{ $video->heading }}">
            </div>

            <div class="form-group">
                <label for="description">Description *</label>
                <textarea class="form-control" name="description">{!! $video->description !!}</textarea>
            </div>

            <div class="form-group">
                <label for="video_url">Video URL *</label>
                <input type="text" class="form-control" id="video_url" name="video_url"  placeholder="Enter youtube video url."  value="https://www.youtube.com/watch?v={!! $video->video_url !!}"/>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1" {{ ($video->is_active == 1) ? 'selected=selected' : '' }}>Published</option>
                <option value="0" {{ ($video->is_active == 0) ? 'selected=selected' : '' }}>Unpublished</option>
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