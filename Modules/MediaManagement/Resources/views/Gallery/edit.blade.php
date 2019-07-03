@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#galleryEditForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                    name: {
                        validators: {
                            notEmpty: {
                                message: 'Name field is required.'
                            }
                        }
                    },
               
                    attachment: {
                        validators: {
                            file: {
                                extension: 'jpg,jpeg,png',
                                maxSize: 2097152,   // 2 MB = 2097152 Bytes (in binary)
                                message: 'The selected file is not valid or file size greater than 1 MB.'
                            }
                        }
                    },
                }
        }).on('blur', '[name="name"]', function(e){
            $('#galleryEditForm').formValidation('revalidateField', 'name');
        })
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
            <h3 class="box-title">Edit Gallery</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="galleryEditForm" method="POST" action="{{ route('admin.media-management.gallery.update', $gallery->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')

            <div class="form-group">
                <label for="name">Name *</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name." value="{{ $gallery->name }}" >
            </div>
        
            <div class="form-group">
                <label for="attachment">Photo Attachment *</label>

                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" >
                        @if(file_exists('uploads/media-management/gallery/'.$gallery->attachment) && $gallery->attachment != '')
                            <img src="{{ asset('uploads/media-management/gallery/'.$gallery->attachment) }}" alt="{{ $gallery->name }}">
                        @else
                            <img src="{{ asset('uploads/media-management/gallery/default-img.jpg') }}" alt="default-image">
                        @endif
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail"
                        style="max-width: 600px; max-height: auto; line-height: 20px;">
                    </div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileupload-new"><i class="fa fa-file-pencil"></i> Change photo</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change photo</span>
                        <input type="file" name="attachment" class="default"/>
                        </span>
                    </div>
                </div>
                <span class="badge bg-red">NOTE!</span>
            </div>
    
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1" {{ ($gallery->is_active == 1) ? 'selected=selected' : '' }}>Published</option>
                <option value="0" {{ ($gallery->is_active == 0) ? 'selected=selected' : '' }}>Unpublished</option>
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