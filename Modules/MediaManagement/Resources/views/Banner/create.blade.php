@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#bannerAddForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                // title: {
                //     validators: {
                //         notEmpty: {
                //             message: 'Title field is required.'
                //         }
                //     }
                // },
                attachment: {
                    validators: {
                        notEmpty: {
                            message: 'Attachment field is required.'
                        },
                        file: {
                            extension: 'jpg,jpeg,png',
                            maxSize: 2097152,   // 2 MB = 2097152 Bytes (in binary)
                            message: 'The selected file is not valid or file size greater than 2 MB.'
                        }
                    }
                },
                
            }
        }).on('blur', '[name="title"]', function(e){
            $('#bannerAddForm').formValidation('revalidateField', 'title');
        })
    });
</script>

@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Banner</h3>
</div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="bannerAddForm" method="POST" action="{{ route('admin.media-management.banner.store') }}" enctype="multipart/form-data">
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

            {{-- <div class="form-group">
                <label for="title">Title *</label>
                <input type="text" name="title" class="form-control" id="title" placeholder="Enter Title." value="{{ old('title') }}" >
            </div> --}}

            <div class="form-group">
                <label for="attachment">Photo Attachment *</label>
    
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" style="width: 600px; height: auto;">
                        <img src="{{ asset('uploads/media-management/banners/default-img.jpg') }}" alt="">
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail"
                        style="max-width: 600px; max-height: auto; line-height: 20px;">
                    </div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileupload-new"><i class="fa fa-file-pencil"></i> Select photo</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change photo</span>
                        <input type="file" name="attachment" class="default"/>
                        </span>
                    </div>
                </div>
                <span class="badge bg-red">NOTE!</span>
                <span>Photo file format should be in jpg, jpeg and png.</span>
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