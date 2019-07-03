@extends('layouts.backend.containerform')

@section('footer_js')
<script type="text/javascript">
    var bachelorsEditor=false, mastersEditor, plus-twoEditor;

    $(document).ready(function () {
        /** School edit form validation */
        $('#messageHighSchoolEditForm').formValidation({
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
                        },
                    }
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: 'Name field is required.'
                        },
                    }
                }, 
                designation: {
                    validators: {
                        notEmpty: {
                            message: 'Designation field is required.'
                        },
                    }
                },
                description: {
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
        .find('[name="description"]')
        .each(function () {
            $(this)
                .ckeditor({
                    allowedContent: true,
                    removePlugins: 'sourcearea' // disable source area
                })
                .editor
                .on('change', function (e) {
                    $('#messageHighSchoolEditForm').formValidation('revalidateField', e.sender.name);
                });
        });
        /** School edit form validation end */

        /** Plus Two edit form validation */
        $('#messagePlusTwoEditForm').formValidation({
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
                        },
                    }
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: 'Name field is required.'
                        },
                    }
                }, 
                designation: {
                    validators: {
                        notEmpty: {
                            message: 'Designation field is required.'
                        },
                    }
                },
                description: {
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
        .find('[name="description"]')
        .each(function () {
            $(this)
                .ckeditor({
                    allowedContent: true,
                    removePlugins: 'sourcearea' // disable source area
                })
                .editor
                .on('change', function (e) {
                    $('#messagePlusTwoEditForm').formValidation('revalidateField', e.sender.name);
                });
        });
        /** Plus Two edit form validation end */

        /** Bachelors edit form validation */
        $('#messageBachelorsEditForm').formValidation({
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
                        },
                    }
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: 'Name field is required.'
                        },
                    }
                }, 
                designation: {
                    validators: {
                        notEmpty: {
                            message: 'Designation field is required.'
                        },
                    }
                },
                description: {
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
        .find('[name="description"]')
        .each(function () {
            $(this)
                .ckeditor({
                    allowedContent: true,
                    removePlugins: 'sourcearea' // disable source area
                })
                .editor
                .on('change', function (e) {
                    $('#messageBachelorsEditForm').formValidation('revalidateField', e.sender.name);
                });
        });
        /** Bachelors edit form validation end */

        /** Masters edit form validation */
        $('#messageMastersEditForm').formValidation({
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
                        },
                    }
                },
                name: {
                    validators: {
                        notEmpty: {
                            message: 'Name field is required.'
                        },
                    }
                }, 
                designation: {
                    validators: {
                        notEmpty: {
                            message: 'Designation field is required.'
                        },
                    }
                },
                description: {
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
        .find('[name="description"]')
        .each(function () {
            $(this)
                .ckeditor({
                    allowedContent: true,
                    removePlugins: 'sourcearea' // disable source area
                })
                .editor
                .on('change', function (e) {
                    $('#messageMastersEditForm').formValidation('revalidateField', e.sender.name);
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

                    <form id="messageHighSchoolEditForm" action="{{ route('admin.content-management.message.update', ['School', $highSchoolMessage->id]) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}

                        <div class="form-group">
                            <label for="heading">Heading *</label>
                            <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter Heading." value="{{ $highSchoolMessage->heading }}" >
                        </div>

                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name." value="{{ $highSchoolMessage->name }}" >
                        </div>

                        <div class="form-group">
                            <label for="designation">Designation *</label>
                            <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation." value="{{ $highSchoolMessage->designation }}" >
                        </div>

                        <div class="form-group">
                            <label class="control-label">Description *</label>
                            <textarea type="text" class="form-control" name="description" rows="5" placeholder="Enter description.">{{ $highSchoolMessage->description }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="attachment">Photo Attachment *</label>
            
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" >
                                    @if(file_exists('uploads/content-management/message/'.$highSchoolMessage->attachment) && $highSchoolMessage->attachment != '')
                                        <img src="{{ asset('uploads/content-management/message/'.$highSchoolMessage->attachment) }}" alt="{{ $highSchoolMessage->name }}">
                                    @else
                                        <img src="{{ asset('uploads/content-management/message/default-img.jpg') }}" alt="default-image">
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

                    <form id="messagePlusTwoEditForm" action="{{ route('admin.content-management.message.update', ['Plus Two', $plusTwoMessage->id]) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="heading">Heading *</label>
                            <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter Heading." value="{{ $plusTwoMessage->heading }}" >
                        </div>

                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name." value="{{ $plusTwoMessage->name }}" >
                        </div>

                        <div class="form-group">
                            <label for="designation">Designation *</label>
                            <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation." value="{{ $plusTwoMessage->designation }}" >
                        </div>

                        <div class="form-group">
                            <label class="control-label">Description *</label>
                            <textarea type="text" class="form-control" name="description" rows="5" placeholder="Enter description.">{{ $plusTwoMessage->description }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="attachment">Photo Attachment *</label>
            
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" >
                                    @if(file_exists('uploads/content-management/message/'.$plusTwoMessage->attachment) && $plusTwoMessage->attachment != '')
                                        <img src="{{ asset('uploads/content-management/message/'.$plusTwoMessage->attachment) }}" alt="{{ $plusTwoMessage->name }}">
                                    @else
                                        <img src="{{ asset('uploads/content-management/message/default-img.jpg') }}" alt="default-image">
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

                    <form id="messageBachelorsEditForm" action="{{ route('admin.content-management.message.update', ['Bachelors', $bachelorsMessage->id]) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="heading">Heading *</label>
                            <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter Heading." value="{{ $bachelorsMessage->heading }}" >
                        </div>

                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name." value="{{ $bachelorsMessage->name }}" >
                        </div>

                        <div class="form-group">
                            <label for="designation">Designation *</label>
                            <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation." value="{{ $bachelorsMessage->designation }}" >
                        </div>

                        <div class="form-group">
                            <label class="control-label">Description *</label>
                            <textarea type="text" class="form-control" name="description" rows="5" placeholder="Enter description.">{{ $bachelorsMessage->description }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="attachment">Photo Attachment *</label>
            
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" >
                                    @if(file_exists('uploads/content-management/message/'.$bachelorsMessage->attachment) && $bachelorsMessage->attachment != '')
                                        <img src="{{ asset('uploads/content-management/message/'.$bachelorsMessage->attachment) }}" alt="{{ $bachelorsMessage->name }}">
                                    @else
                                        <img src="{{ asset('uploads/content-management/message/default-img.jpg') }}" alt="default-image">
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

                    <form id="messageMastersEditForm" action="{{ route('admin.content-management.message.update', ['Masters', $mastersMessage->id]) }}" method="POST" enctype="multipart/form-data">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <label for="heading">Heading *</label>
                            <input type="text" name="heading" class="form-control" id="heading" placeholder="Enter Heading." value="{{ $mastersMessage->heading }}" >
                        </div>

                        <div class="form-group">
                            <label for="name">Name *</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name." value="{{ $mastersMessage->name }}" >
                        </div>

                        <div class="form-group">
                            <label for="designation">Designation *</label>
                            <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Designation." value="{{ $mastersMessage->designation }}" >
                        </div>

                        <div class="form-group">
                            <label class="control-label">Description *</label>
                            <textarea type="text" class="form-control" name="description" rows="5" placeholder="Enter description.">{{ $mastersMessage->description }}</textarea>
                        </div>
    
                        <div class="form-group">
                            <label for="attachment">Photo Attachment *</label>
            
                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                <div class="fileupload-new thumbnail" >
                                    @if(file_exists('uploads/content-management/message/'.$mastersMessage->attachment) && $mastersMessage->attachment != '')
                                        <img src="{{ asset('uploads/content-management/message/'.$mastersMessage->attachment) }}" alt="{{ $mastersMessage->name }}">
                                    @else
                                        <img src="{{ asset('uploads/content-management/message/default-img.jpg') }}" alt="default-image">
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