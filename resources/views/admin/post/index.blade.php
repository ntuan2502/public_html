@extends('layouts.admin')
@section('header')
<title>Danh sách bài viết</title>
@endsection
@section('body')
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2><strong>Danh sách bài viết</strong></h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <a href="/admin/post">Bài viết</a>
            </li>
            <li class="breadcrumb-item active">
                <strong>Danh sách bài viết</strong>
            </li>
        </ol>
    </div>
    <div class="col-sm-8">
        <div class="title-action">
            <a href="/admin/post/add" class="btn btn-rounded btn-primary">Thêm bài viết</a>
        </div>
    </div>
</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox ">
                <div class="ibox-title">
                    <h5><strong>Danh sách bài viết</strong></h5>
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
                                <th>Tên bài viết</th>
                                <th>Chuyên mục</th>
                                <th>Tác giả</th>
                                <th>Trạng thái</th>
                                <th>Ảnh bìa</th>
                                <th>Lượt xem</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->name}}</td>
                                <td>{{$post->category_name}}</td>
                                <td>{{$post->user_name}}</td>
                                <td>
                                    @if($post->status == 0)
                                    <button class="btn btn-rounded btn-danger change_status" data-id="{{$post->id}}" data-status="1">Ẩn</button>
                                    @else
                                    <button class="btn btn-rounded btn-info change_status" data-id="{{$post->id}}" data-status="0">Hiện</button>
                                    @endif
                                </td>
                                <td>
                                    <a data-fancybox="gallery" href="/{{$post->cover}}"><img class="preview_icon" src="/{{$post->cover}}"></a>
                                </td>
                                <td>{{$post->view}}</td>
                                <td>
                                    <a href="/admin/post/{{$post->id}}/edit">
                                        <button class="btn btn-rounded btn-info">Sửa</button>
                                    </a>
                                    <button class="btn btn-rounded btn-danger btn-delete" data-id="{{$post->id}}">Xóa</button>
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
                    url: '/admin/post/delete',
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
                        text: "Bài viết đã được xoá bỏ.",
                        type: "success"
                    }, function() {
                        window.location.href = data.redirect;
                    });
                });
            });
        });

        $('.change_status').click(function() {
            var id = $(this).attr('data-id');
            var status = $(this).attr('data-status');
            $.ajax({
                url: '/admin/post/' + id + '/change_status',
                type: 'post',
                data: {
                    status: status
                },
                error: function(err) {
                    console.log(err);
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                }
            });
        });
    });
</script>
@endsection