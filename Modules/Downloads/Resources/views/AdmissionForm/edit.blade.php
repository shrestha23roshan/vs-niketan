@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    $(document).ready(function () {
        
        $('#admissionformEditForm').formValidation({
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
                        file: {
                            extension: 'jpg,jpeg,gif,png,doc,docx,xls,xlsx,pdf,txt,zip',
                            maxSize: 2097152,   // 2 MB = 2097152 Bytes (in binary)
                            message: 'The selected file is not valid or file size greater than 2 MB.'
                        }
                    }
                },
                
            }
        }).on('blur', '[name="download_caption"]', function(e){
            $('#admissionformEditForm').formValidation('revalidateField', 'download_caption');
            
        })
    });
</script>

@endsection 

@section('dynamicdata')

<div class="box box-primary">
    <div class="box-header with-border">
        <h3 class="box-title">Edit Admission Form</h3>
</div>
    <!-- /.box-header -->
    <!-- form start -->
    <form id="admissionformEditForm" method="POST" action="{{ route('admin.download.admission-form.update', $admissionForm->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="box-body">
        @include('layouts.backend.alert')

            <div class="form-group">
                <label for="download_caption">File Caption*</label>
                <input type="text" name="download_caption" class="form-control" id="download_caption" placeholder="Enter caption." value="{{ $admissionForm->download_caption }}" >
            </div>
           
            <div class="form-group">
                <label for="download_attachment">File Attachment *</label>

                <div class="fileupload fileupload-new" data-provides="fileupload">
                    <div class="fileupload-new thumbnail" >
                        @if(file_exists('uploads/downloads/admissionform/'.$admissionForm->download_attachment) & $admissionForm->download_attachment != '')
                        <a href="{!! asset('uploads/downloads/admissionform/'.$admissionForm->download_attachment) !!}" target="_blank">{{ $admissionForm->download_attachment }}</a>
                        @endif
                    </div>
                    <div class="fileupload-preview fileupload-exists thumbnail"
                        style="max-width: 600px; max-height: auto; line-height: 20px;">
                    </div>
                    <div>
                        <span class="btn btn-primary btn-file">
                        <span class="fileupload-new"><i class="fa fa-undo"></i> Select file</span>
                        <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                        <input type="file" name="download_attachment" class="default"/>
                        </span>
                    </div>
                </div>
                <span class="badge bg-red">NOTE!</span>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" name="is_active">
                <option value="1" {{ ($admissionForm->is_active == 1) ? 'selected=selected' : '' }}>Published</option>
                <option value="0" {{ ($admissionForm->is_active == 0) ? 'selected=selected' : '' }}>Unpublished</option>
                </select>
            </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
        <input type="hidden" name="_method" value="PUT">

    </form>
</div>

@endsection