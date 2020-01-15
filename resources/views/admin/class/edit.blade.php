@extends('layouts.admin')
@section('header')
<title>Sửa hệ phái</title>
@endsection
@section('body')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><strong>Sửa hệ phái</strong></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin/class">Hệ phái</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Sửa hệ phái</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="/admin/class" class="btn btn-primary">Hệ phái</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><strong>Sửa hệ phái</strong></h5>
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
                            <label class="col-sm-2 col-form-label">Tên hệ phái</label>
                            <div class="col-sm-10">
                                <input type="text" name="name" class="form-control" value="{{$class->name}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Icon</label>
                            <div class="col-sm-10">
                                <div class="custom-file">
                                    <input id="icon" name="icon" type="file" accept="image/*" class="custom-file-input">
                                    <label for="icon" class="custom-file-label">Choose file...</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2">
                                <img src="{{$class->icon}}" class="preview_icon">
                            </label>
                            <div class="col-sm-10">
                                <img src="" class="preview_icon" id="iconPreview">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Mô tả</label>
                            <div class="col-sm-10">
                                <textarea name="description" class="form-control" rows="10">{{$class->description}}</textarea>
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
                $('#iconPreview').attr('src', e.target.result);
                $('#iconPreview').hide();
                $('#iconPreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });

        $("#icon").change(function() {
            readURL(this);
        });
    });
</script>
@endsection