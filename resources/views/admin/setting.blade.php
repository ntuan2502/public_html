@extends('layouts.admin')
@section('header')
<title>Setting</title>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
@endsection

@section('body')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-10">
        <h2>Cài đặt</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a>Cài đặt</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Cài đặt</strong>
            </li>
        </ol>
    </div>
    <div class="col-lg-2">

    </div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5>Cài đặt</h5>
                    <div class="ibox-tools">
                        <a class="collapse-link">
                            <i class="fa fa-chevron-up"></i>
                        </a>
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-wrench"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#" class="dropdown-item">Config option 1</a>
                            </li>
                            <li><a href="#" class="dropdown-item">Config option 2</a>
                            </li>
                        </ul>
                        <a class="close-link">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="ibox-content">
                    <form action="" method="POST" class="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="download">Hiển thị nút Download</label>
                            <div class="col-sm-4">
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" class="onoffswitch-checkbox" id="download" name="download" {{$download->value ? 'checked' :''}}>
                                        <label class="onoffswitch-label" for="download">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <label class="col-sm-2 col-form-label" for="maintenance">Bảo trì trang web</label>
                            <div class="col-sm-4">
                                <div class="switch">
                                    <div class="onoffswitch">
                                        <input type="checkbox" class="onoffswitch-checkbox" id="maintenance" name="maintenance" {{$maintenance->value ? 'checked' :''}}>
                                        <label class="onoffswitch-label" for="maintenance">
                                            <span class="onoffswitch-inner"></span>
                                            <span class="onoffswitch-switch"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="version">Phiên bản</label>
                            <div class="col-sm-4">
                                <input type="text" id="version" name="version" class="form-control" value="{{$version->value}}">
                            </div>
                            <label class="col-sm-2 col-form-label" for="name_version">Tên phiên bản</label>
                            <div class="col-sm-4">
                                <input type="text" id="name_version" name="name_version" class="form-control" value="{{$name_version->value}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="update_time">Ngày cập nhật</label>
                            <div class="col-sm-4">
                                <input type="text" id="update_time" name="update_time" class="form-control" value="{{$update_time->value}}">
                            </div>
                            <label class="col-sm-2 col-form-label" for="discord">Discord</label>
                            <div class="col-sm-4">
                                <input type="text" id="discord" name="discord" class="form-control" value="{{$discord->value}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="facebook">Facebook</label>
                            <div class="col-sm-4">
                                <input type="text" id="facebook" name="facebook" class="form-control" value="{{$facebook->value}}">
                            </div>
                            <label class="col-sm-2 col-form-label" for="youtube">Youtube</label>
                            <div class="col-sm-4">
                                <input type="text" id="youtube" name="youtube" class="form-control" value="{{$youtube->value}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="background">Background</label>
                            <div class="col-sm-4">
                                <input type="text" id="background" name="background" class="form-control" value="{{$background->value}}">
                            </div>
                            <label class="col-sm-2 col-form-label" for="file_background">Upload background</label>
                            <div class="col-sm-4">
                                <div class="custom-file">
                                    <input id="file_background" name="file_background" type="file" class="custom-file-input">
                                    <label for="file_background" id="name_file_background" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="patch_note">Patch Note</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="patch_note" id="patch_note">{{$patch_note->value}}</textarea>
                            </div>
                        </div>
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
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script>
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
        $('input[name="update_time"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true,
            locale: {
                format: 'DD/MM/YYYY'
            }
        });

        $('#file_background').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('#name_file_background').addClass("selected").html(fileName);
        });

        $('#patch_note').summernote({
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