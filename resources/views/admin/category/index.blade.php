@extends('layouts.admin')
@section('header')
<title>Danh sách chuyên mục</title>
@endsection
@section('body')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><strong>Danh sách chuyên mục</strong></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin/category">Chuyên mục</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách chuyên mục</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="/admin/category/add" class="btn btn-rounded btn-primary">Thêm chuyên mục</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><strong>Danh sách chuyên mục</strong></h5>
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
                    <table class="footable table table-stripped toggle-arrow-tiny">
                        <thead>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination"></ul>
                                </td>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Tên chuyên mục</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td>
                                    <a href="/admin/category/{{$category->id}}/edit">
                                        <button class="btn btn-rounded btn-info">Sửa</button>
                                    </a>
                                    <button class="btn btn-rounded btn-danger btn-delete" data-id="{{$category->id}}">Xóa</button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="5">
                                    <ul class="pagination"></ul>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    $(document).ready(function() {
        $('.btn-delete').click(function() {
            var id = $(this).data('id');
            swal({
                title: "Bạn có chắc?",
                text: "Bạn không thể phục hồi thao tác này sau khi thực hiện!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                cancelButtonText: "Huỷ bỏ",
                confirmButtonText: "Xác nhận",
                closeOnConfirm: false
            }, function() {
                $.ajax({
                    url: '/admin/category/delete',
                    type: 'post',
                    data: {
                        id: id
                    },
                    error: function(err) {
                        console.log(err);
                    },
                    success: function(data) {
                        console.log(data);
                        setTimeout(function() {
                            window.location.href = data.redirect;
                        }, 3000);
                    }
                }).done(function(data) {
                    swal({
                        title: "Đã xoá!",
                        text: "Chuyên mục đã được xoá bỏ.",
                        type: "success"
                    }, function() {
                        window.location.href = data.redirect;
                    });
                });
            });
        });
    });
</script>
@endsection