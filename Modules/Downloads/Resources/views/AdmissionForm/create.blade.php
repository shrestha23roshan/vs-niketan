@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#admissionformAddForm').formValidation({
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
                            message: 'Category field is required.'
                        }
                    }
                },
                download_caption: {
                        validators: {
                            notEmpty: {
                                message: 'caption field is required.'
                            }
                        }
                    },
                download_attachment: {
                    validators: {
                        notEmpty: {
                            message: 'Attachment field is required.'
                        },
                        file: {
                            extension: 'jpg,jpeg,gif,png,doc,docx,xls,xlsx,pdf,txt,zip',
                            maxSize: 2097152,   // 2 MB = 2097152 Bytes (in binary)
                            message: 'The selected file is not valid or file size greater than 2 MB.'
                        }
                    }
                },
                
            }
        }).on('blur', '[name="download_caption"]', function(e){
            $('#admissionformAddForm').formValidation('revalidateField', 'download_caption');
            
        })
    });
</script>

@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Create Admission Form</h3>
</div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="admissionformAddForm" method="POST" action="{{ route('admin.download.admission-form.store') }}" enctype="multipart/form-data">
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
                <label for="download_caption">File Caption*</label>
                <input type="text" name="download_caption" class="form-control" id="download_caption" placeholder="Enter caption." value="{{ old('download_caption') }}" >
            </div>
           
            <div class="form-group">
                <label for="download_attachment">File Attachment *</label>
    
                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-preview fileupload-exists thumbnail"
                        style="max-width: 600px; max-height: auto; line-height: 20px;">
                    </div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileupload-new"><i class="fa fa-file-pencil"></i> Select File</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change File</span>
                        <input type="file" name="download_attachment" class="default"/>
                        </span>
                    </div>
                </div>
                <span class="badge bg-red">NOTE!</span>
                <span>file format should be in jpg, jpeg, doc, pdf and png.</span>
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