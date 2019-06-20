@extends('admin.home')
@section('content')
    <section class="content-header">
        <h1>
            Edit Product
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Product</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>
    <section class="content ">
        @if(count($errors) >0)
            <ul>
                @foreach($errors->all() as $error)
                    <li class="text-danger">{{ $error }}</li>
                @endforeach
            </ul>
    @endif
    <!-- enctype="multipart/form-data" class="dropzone dz-clickable" -->
        <form action="{{ url('admincp/product') }}" method="POST" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Info</h3>
                    </div>
                    <div class="box-body ">
                        <div class="form-group col-md-12">
                            <label>Name</label>
                            <input type="text" name="txtName" class="form-control" value="{{ old('txtName')}}">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Desc</label>
                            <textarea name="txtDesc" class="form-control">{{ old('txtDesc') }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Content</label>
                            <textarea name="txtContent" class="form-control">{{ old('txtContent') }}</textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Price</label>
                            <input name="txtPrice" class="form-control"
                                   value="@if(empty(old('txtPrice'))) 0 @else{{old('txtPrice')}}@endif">
                        </div>
                        <div class="form-group col-md-12">
                            <label>Category</label>
                            <select class="form-control" name="cate_id">
                                <option value="0">---</option>
                                @foreach($listCate as $cate)
                                    <option value="{{ $cate->id }}"
                                            @if ($cate->id == old('cate_id'))
                                            selected="selected"
                                            @endif
                                    >{{ $cate->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">SEO Infomation</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group col-md-12">
                            SEO Title <input type="text" name="meta_title" class="form-control"  value="{{ old('meta_title') }}">
                            Meta Keywords <input type="text" name="meta_keywords" class="form-control"  value="{{ old('meta_key') }}">
                            Meta Description <input type="text" name="meta_description" class="form-control"  value="{{ old('meta_desc') }}">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="dropzone" id="my-dropzone" name="myDropzone">

                </div>
            </div>
            <div class="col-md-12">
                <button type="submit" class="btn btn-success pull-right">
                    <i class="fa fa-save"></i>
                    <span>Save and back</span>
                </button>
            </div>
            <input id="image_id" type="hidden" name="image_id" value="{{ isset($image_id) ? $image_id : '' }}">
        </form>

    </section>
@endsection

@section('page-js-script')
    <link rel="stylesheet" href="{{ asset('admin/dist/css/dropzone.css') }}">
    <script src="{{ asset('admin/dist/js/dropzone.js') }}"></script>
    <script type="text/javascript">
{{--        làm thế nào để cho list image_id vào trong 1 mảng rồi cho vào input hidden--}}
            Dropzone.options.myDropzone= {
                url: '{{ url('admincp/uploadImg') }}',
                headers: {
                    'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                },
                autoProcessQueue: true,
                uploadMultiple: true,
                parallelUploads: 5,
                maxFiles: 10,
                maxFilesize: 5,
                acceptedFiles: ".jpeg,.jpg,.png,.gif",
                dictFileTooBig: 'Image is bigger than 5MB',
                addRemoveLinks: true,
                removedfile: function(file) {
                    var name = file.name;
                    name =name.replace(/\s+/g, '-').toLowerCase();    /*only spaces*/
                    $.ajax({
                        type: 'POST',
                        url: '{{ url('admincp/deleteImg') }}',
                        headers: {
                            'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                        },
                        data: "id="+name,
                        dataType: 'html',
                        success: function(data) {
                            $("#msg").html(data);
                        }
                    });
                    var _ref;
                    if (file.previewElement) {
                        if ((_ref = file.previewElement) != null) {
                            _ref.parentNode.removeChild(file.previewElement);
                        }
                    }
                    return this._updateMaxFilesReachedClass();
                },
                success: function(file, response){
                    var arrId = imgId.push(response.image_id);
                    console.log(arrId)
                    $('#image_id').val(arrId)
                },
                previewsContainer: null,
                hiddenInputContainer: "body",
            }
    </script>
    <style>
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
        }
    </style>
@endsection