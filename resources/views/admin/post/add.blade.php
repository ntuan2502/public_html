@extends('layouts.admin')
@section('header')
<title>Thêm bài viết</title>
@endsection
@section('body')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><strong>Thêm bài viết</strong></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin/post">Bài viết</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Thêm bài viết</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="/admin/post" class="btn btn-primary">Bài viết</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><strong>Thêm bài viết</strong></h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Chuyên mục</label>
                            <div class="col-sm-10">
                                <select class="select2_demo_3 form-control" name="category_id" required>
                                    <option></option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tên bài viết</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-10">
                                <input type="text" name="slug" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="content">Nội dung</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="content" id="content"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ảnh bìa</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input id="cover" name="cover" type="file" accept="image/*" class="custom-file-input" required>
                                    <label for="cover" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <img src="" class="d-block w-100" id="coverPreview">
                            </div>
                        </div>
                        <div class="hr-line-dashed"></div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary pull-right">Xác nhận</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#coverPreview').attr('src', e.target.result);
                $('#coverPreview').hide();
                $('#coverPreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: '/image/upload',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            success: function (data) {
                var image = $('<img>').attr({
                    src: window.location.protocol + '//' + window.location.hostname + data.url,
                    width: '100%'
                });
                $('#content').summernote("insertNode", image[0]);
                console.log('Upload hình thành công! ' + window.location.protocol + '//' + window.location.hostname + data.url);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    function deleteImage(url) {
        var data = new FormData();
        data.append("url", url);
        $.ajax({
            url: '/image/delete',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            success: function (data) {
                console.log('Xoá hình thành công! ' + data.url);
            },
            error: function (data) {
                console.log(data);
            }
        });
    }

    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $("#cover").change(function() {
            readURL(this);
        });

        $(".select2_demo_3").select2({
            placeholder: "Select a category",
            allowClear: true
        });

        $('#content').summernote({
            height: 300, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            callbacks: {
                onImageUpload: function (image) {
                    uploadImage(image[0]);
                },
                onMediaDelete: function ($target, $editable) {
                    deleteImage($target.attr('src'));

                },
                onPaste: function (e) {
                    var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                    e.preventDefault();
                    setTimeout(function () {
                        document.execCommand('insertText', false, bufferText);
                    }, 10);
                }
            }
        });
    });

</script>
@endsection