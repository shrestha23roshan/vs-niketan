@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    var bachelorsEditor=false, mastersEditor, plus_twoEditor;

    $(document).ready(function () {
        /** School edit form validation */
        $('#aboutusSchoolEditForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                school_description: {
                    validators: {
                        notEmpty: {
                            message: 'Description field is required.'
                        },
                    }
                },
                attachment: {
                    validators: {
                        file: {
                            extension: 'jpg,jpeg,png',
                            maxSize: 2097152,   // 2 MB = 2097152 Bytes (in binary)
                            message: 'The selected file is not valid or file size greater than 2 MB.'
                        }
                    }
                },
            }
        })
        .find('[name="school_description"]')
        .each(function () {
            $(this)
                .ckeditor({
                    allowedContent: true,
                    removePlugins: 'sourcearea' // disable source area
                })
                .editor
                .on('change', function (e) {
                    $('#aboutusSchoolEditForm').formValidation('revalidateField', e.sender.name);
                });
        });
        /** School edit form validation end */

        /** Plus Two edit form validation */
        $('#aboutusplusTwoEditForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                plus_two_description: {
                    validators: {
                        notEmpty: {
                            message: 'Description field is required.'
                        },
                    }
                },
                attachment: {
                    validators: {
                        file: {
                            extension: 'jpg,jpeg,png',
                            maxSize: 2097152,   // 2 MB = 2097152 Bytes (in binary)
                            message: 'The selected file is not valid or file size greater than 2 MB.'
                        }
                    }
                },
            }
        })
        .find('[name="plus_two_description"]')
        .each(function () {
            $(this)
                .ckeditor({
                    allowedContent: true,
                    removePlugins: 'sourcearea' // disable source area
                })
                .editor
                .on('change', function (e) {
                    $('#aboutusplusTwoEditForm').formValidation('revalidateField', e.sender.name);
                });
        });
        /** Plus Two edit form validation end */

        /** BBA edit form validation */
        $('#aboutusBachelorsEditForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                bachelors_description: {
                    validators: {
                        notEmpty: {
                            message: 'Description field is required.'
                        },
                    }
                },
                attachment: {
                    validators: {
                        file: {
                            extension: 'jpg,jpeg,png',
                            maxSize: 2097152,   // 2 MB = 2097152 Bytes (in binary)
                            message: 'The selected file is not valid or file size greater than 2 MB.'
                        }
                    }
                },
            }
        })
        .find('[name="bachelors_description"]')
        .each(function () {
            $(this)
                .ckeditor({
                    allowedContent: true,
                    removePlugins: 'sourcearea' // disable source area
                })
                .editor
                .on('change', function (e) {
                    $('#aboutusBachelorsEditForm').formValidation('revalidateField', e.sender.name);
                });
        });
        /** BBA edit form validation end */

        /** Masters edit form validation */
        $('#aboutusMastersEditForm').formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                masters_description: {
                    validators: {
                        notEmpty: {
                            message: 'Description field is required.'
                        },
                    }
                },
                attachment: {
                    validators: {
                        file: {
                            extension: 'jpg,jpeg,png',
                            maxSize: 2097152,   // 2 MB = 2097152 Bytes (in binary)
                            message: 'The selected file is not valid or file size greater than 2 MB.'
                        }
                    }
                },
            }
        })
        .find('[name="masters_description"]')
        .each(function () {
            $(this)
                .ckeditor({
                    allowedContent: true,
                    removePlugins: 'sourcearea' // disable source area
                })
                .editor
                .on('change', function (e) {
                    $('#aboutusMastersEditForm').formValidation('revalidateField', e.sender.name);
                });
        });
        /** Masters edit form validation end */

    });
</script>
@endsection 

@section('dynamicdata')
<div class="box">
    
    <!-- /.box-header -->
    <div id="tabs" class="box-body">
        @include('layouts.backend.alert')

            <!--Nav-tab-->
            <ul class="nav nav-tabs">
                <li class="active">
                    <a  href="#school" data-toggle="tab">School</a>
                </li>
                <li>
                    <a href="#plus_two" data-toggle="tab">Plus Two</a>
                </li>
                <li>
                    <a  href="#bachelors" data-toggle="tab">BBA</a>
                </li>
                <li>
                    <a href="#masters" data-toggle="tab">EMBA</a>
                </li>
            </ul>
        
            <!-- Tab panes -->
            <div class="tab-content">
                
                <div role="tabpanel" class="tab-pane fade in active" id="school">
                    <br/>

                    <form id="aboutusSchoolEditForm" action="{{ route('admin.content-management.about-us.update', ['School', $highSchoolAboutUs->id]) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label">Description *</label>
                            <textarea type="text" class="form-control" name="school_description" rows="5" placeholder="Enter description.">{{ $highSchoolAboutUs->description }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="attachment">Photo Attachment *</label>
            
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" >
                                    @if(file_exists('uploads/content-management/about-us/'.$highSchoolAboutUs->attachment) && $highSchoolAboutUs->attachment != '')
                                        <img src="{{ asset('uploads/content-management/about-us/'.$highSchoolAboutUs->attachment) }}" alt="{{ $highSchoolAboutUs->name }}">
                                    @else
                                        <img src="{{ asset('uploads/content-management/about-us/default-img.jpg') }}" alt="default-image">
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
                            <span>Photo file format should be in jpg, jpeg and png.</span>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="plus_two">
                    <br/>

                    <form id="aboutusplusTwoEditForm" action="{{ route('admin.content-management.about-us.update', ['Plus Two', $plusTwoAboutUs->id]) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label">Description *</label>
                            <textarea type="text" class="form-control" name="plus_two_description" rows="5" placeholder="Enter description.">{{ $plusTwoAboutUs->description }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="attachment">Photo Attachment *</label>
            
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" >
                                    @if(file_exists('uploads/content-management/about-us/'.$plusTwoAboutUs->attachment) && $plusTwoAboutUs->attachment != '')
                                        <img src="{{ asset('uploads/content-management/about-us/'.$plusTwoAboutUs->attachment) }}" alt="{{ $plusTwoAboutUs->name }}">
                                    @else
                                        <img src="{{ asset('uploads/content-management/about-us/default-img.jpg') }}" alt="default-image">
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
                            <span>Photo file format should be in jpg, jpeg and png.</span>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="bachelors">
                    <br/>

                    <form id="aboutusBachelorsEditForm" action="{{ route('admin.content-management.about-us.update', ['Bachelors', $bachelorsAboutUs->id]) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label">Description *</label>
                            <textarea type="text" class="form-control" name="bachelors_description" rows="5" placeholder="Enter description.">{{ $bachelorsAboutUs->description }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="attachment">Photo Attachment *</label>
            
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" >
                                    @if(file_exists('uploads/content-management/about-us/'.$bachelorsAboutUs->attachment) && $bachelorsAboutUs->attachment != '')
                                        <img src="{{ asset('uploads/content-management/about-us/'.$bachelorsAboutUs->attachment) }}" alt="{{ $bachelorsAboutUs->name }}">
                                    @else
                                        <img src="{{ asset('uploads/content-management/about-us/default-img.jpg') }}" alt="default-image">
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
                            <span>Photo file format should be in jpg, jpeg and png.</span>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>

                <div role="tabpanel" class="tab-pane fade" id="masters">
                    <br/>

                    <form id="aboutusMastersEditForm" action="{{ route('admin.content-management.about-us.update', ['Masters', $mastersAboutUs->id]) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label class="control-label">Description *</label>
                            <textarea type="text" class="form-control" name="masters_description" rows="5" placeholder="Enter description.">{{ $mastersAboutUs->description }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="attachment">Photo Attachment *</label>
            
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" >
                                    @if(file_exists('uploads/content-management/about-us/'.$mastersAboutUs->attachment) && $mastersAboutUs->attachment != '')
                                        <img src="{{ asset('uploads/content-management/about-us/'.$mastersAboutUs->attachment) }}" alt="{{ $mastersAboutUs->name }}">
                                    @else
                                        <img src="{{ asset('uploads/content-management/about-us/default-img.jpg') }}" alt="default-image">
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
                            <span>Photo file format should be in jpg, jpeg and png.</span>
                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>

                </div>
              
            </div>
    </div>
</div>
@endsection