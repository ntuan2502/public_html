@extends('layouts.page')
@section('header')
<style>
    .avatar {
        width: 148px;
        border-radius: 50%;
    }

    @media (max-width: 767px) {
        .avatar {
            width: 80px;
        }
    }

    .float_r {
        float: right;
    }

    .wheat_color {
        color: wheat !important;
    }

    .inline_block {
        display: inline-block;
    }

    .audio_custom {
        width: 50%;
        float: right;
    }

    .music_area .music_field .audio_name .name {
        margin-bottom: 0px;
    }

    @media (max-width: 425px) {
        .avatar {
            width: 80px;
        }

        .music_area .music_field .thumb {
            margin-right: 26px;
        }

        .music_area .music_field .audio_name .name h4 {
            font-size: 24px;
        }

    }

    @media (max-width: 375px) {
        .avatar {
            width: 70px;
        }

        .music_area .music_field .thumb {
            margin-right: 23px;
        }

        .music_area .music_field .audio_name .name h4 {
            font-size: 21px;
        }

        .wheat_color a {
            font-size: 16px;
        }

        .music a .wheat_color {
            font-size: 18px;
        }
    }

    @media (max-width: 320px) {
        .avatar {
            width: 60px;
        }

        .music_area .music_field .thumb {
            margin-right: 20px;
        }

        .music_area .music_field .audio_name .name h4 {
            font-size: 18px;
        }

        .wheat_color a {
            font-size: 13px;
        }

        .music a .wheat_color {
            font-size: 15px;
        }
    }

    .input-group-icon .icon {
        left: unset;
        right: 30px;
    }

    .input-group-icon .single-input {
        padding-left: 20px;
        padding-right: 45px;
    }

    .color_green {
        color: green;
        font-weight: 600;
    }

    .error_message {
        color: red;
        display: none;
    }

    .success_message {
        color: green;
        display: none;
    }
</style>
<title>Tài khoản</title>
@endsection
@section('body')

<div class="bradcam_area breadcam_bg_2">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3></h3>
                </div>
            </div>
        </div>
    </div>
</div>

@if($vsp_user)
<div class="music_area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-12">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="music_field">
                            <div class="thumb">
                                <img src="{{$vsp_user->avatar}}" class="avatar" alt="">
                            </div>
                            <div class="audio_name">
                                <div class="name">
                                    <h4>
                                        <a>{{$vsp_user->name}}</a>
                                    </h4>
                                    <div class="wheat_color">
                                        <a>Point: {{$vsp_user->point}} | </a>
                                        <a>Join: {{$vsp_user->join}}</a>
                                    </div>
                                    <div class="music">
                                        <a href="{{$vsp_music->link}}" target="_blank">
                                            <marquee class="wheat_color">Playing: {{$vsp_music->title}} - {{$vsp_music->artist}}</marquee>
                                        </a>
                                    </div>
                                </div>

                                <audio id="audio" preload="auto" controls {{$vsp_music->auto_play == 1? 'autoplay' : ''}} {{$vsp_music->loop == 1? 'loop' : ''}}>
                                    <source src="{{$vsp_music->audio}}">
                                </audio>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-xl-3 col-md-3">
                        <div class="music_btn">
                            <a href="#" class="boxed-btn">buy albam</a>
                        </div>
                    </div> -->
                </div>
            </div>

        </div>
    </div>
</div>
@endif

<div class="whole-wrap">
    <div class="container box_1170">
        <div class="section-top-border">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                        <a class="nav-link active" id="infomation-tab" data-toggle="pill" href="#infomation">Infomation</a>
                        <a class="nav-link" id="change-password-tab" data-toggle="pill" href="#change-password">Change Password</a>
                        <a class="nav-link" id="change-music-tab" data-toggle="pill" href="#change-music">Change Music</a>
                        <!-- <a class="nav-link" id="other-tab" data-toggle="pill" href="#other">Other</a> -->
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="infomation" role="tabpanel" aria-labelledby="infomation-tab">
                            <h3 class="mb-30">Infomation</h3>
                            <form action="">
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Username</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$vsp_user->username}}" id="username" {{$vsp_user->username != '' ? 'disabled' : '' }} placeholder="Username will not be changed" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username will not be changed'" required class="single-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$vsp_user->name}}" id="name" placeholder="Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Name'" required class="single-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Email</label>
                                        <div class="col-sm-9">
                                            <input type="email" value="{{$vsp_user->email}}" disabled class="single-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <label class="col-form-label error_message" id="infomation_status"></label>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="genric-btn info circle change_infomation">Submit</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                            <form action="">
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Last changed</label>
                                        <div class="col-sm-9">
                                            <label class="col-form-label color_green">{{$vsp_user->change_pass_at}}</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Old Password</label>
                                        <div class="input-group-icon col-sm-9">
                                            <input type="password" id="old_password" placeholder="Old password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Old password'" required class="single-input">
                                            <div class="icon"><a class="pointer eye_old_password"><i class="fa fa-eye-slash" aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">New Password</label>
                                        <div class="input-group-icon col-sm-9">
                                            <input type="password" id="new_password" placeholder="New password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New password'" required class="single-input">
                                            <div class="icon"><a class="pointer eye_new_password"><i class="fa fa-eye-slash" aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Confirm Password</label>
                                        <div class="input-group-icon col-sm-9">
                                            <input type="password" id="confirm_password" placeholder="Confirm password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm password'" required class="single-input">
                                            <div class="icon"><a class="pointer eye_confirm_password"><i class="fa fa-eye-slash" aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label"></label>
                                        <div class="col-sm-9">
                                            <label class="col-form-label error_message" id="status_label"></label>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="genric-btn info circle change_password">Submit</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="change-music" role="tabpanel" aria-labelledby="change-music-tab">
                            <div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Song</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$vsp_music->title}}" disabled class="single-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Artist</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$vsp_music->artist}}" disabled class="single-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Audio</label>
                                        <div class="input-group-icon col-sm-9">
                                            <input type="text" value="{{$vsp_music->audio}}" disabled class="single-input">
                                            <div class="icon"><a href="{{$vsp_music->audio}}"><i class="fa fa-download" aria-hidden="true"></i></a></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    -------
                                </div>
                            </div>
                            <form id="default-select">
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Link ZingMp3</label>
                                        <div class="col-sm-9">
                                            <input type="text" value="{{$vsp_music->link}}" id="music_link" placeholder="Link" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Link'" required class="single-input">
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Auto Play</label>
                                        <div class="col-sm-9">
                                            <div class="default-select">
                                                <select id="auto_play">
                                                    <option value="0">No</option>
                                                    <option value="1" {{$vsp_music->auto_play == 1 ? 'selected' : ''}}>Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-10">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Loop</label>
                                        <div class="col-sm-9">
                                            <div class="default-select">
                                                <select id="loop">
                                                    <option value="0">No</option>
                                                    <option value="1" {{$vsp_music->loop == 1 ? 'selected' : ''}}>Yes</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="genric-btn info circle change_music">Submit</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="other" role="tabpanel" aria-labelledby="other-tab">4</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    $(document).ready(function() {
        $('audio').audioPlayer();

        $('#music_link').focus(function() {
            if ($('#music_link').css('color') == "rgb(255, 0, 0)") {
                $('#music_link').val('')
                $('#music_link').css('color', 'black');
            }
        });

        $('.change_music').click(function() {
            var link = $('#music_link').val();
            $.ajax({
                url: '/zingMp3_post',
                type: 'post',
                data: {
                    link: link,
                    auto_play: $('#auto_play').val(),
                    loop: $('#loop').val(),
                },
                error: function(err) {
                    console.log(err);
                    $('#music_link').val('Invalid URL!')
                    $('#music_link').css('color', 'red');
                },
                success: function(data) {
                    console.log(data);
                    location.reload();
                }
            });
        });

        $('.change_password').click(function() {
            $('#status_label').css('display', 'none');
            $('#status_label').removeClass('success_message');
            $('#status_label').addClass('error_message');

            var old_password = $('#old_password').val();
            var new_password = $('#new_password').val();
            var confirm_password = $('#confirm_password').val();
            if (old_password.length == 0) {
                $('#status_label').text('Old Password is required');
                $('#status_label').css('display', 'block');
            } else if (new_password.length == 0) {
                $('#status_label').text('New Password is required');
                $('#status_label').css('display', 'block');
            } else if (confirm_password.length == 0) {
                $('#status_label').text('Confirm Password is required');
                $('#status_label').css('display', 'block');
            } else if (new_password !== confirm_password) {
                $('#status_label').text('New Password and Confirm Password do not match!');
                $('#status_label').css('display', 'block');
            } else {
                $.ajax({
                    url: '/change_password_post',
                    type: 'post',
                    data: {
                        old_password: old_password,
                        new_password: new_password,
                    },
                    error: function(err) {
                        console.log(err);
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 0) {
                            $('#status_label').text('Old password is wrong. Please try again!');
                            $('#status_label').css('display', 'block');
                            $('#old_password').val('');
                        } else {
                            $('#status_label').removeClass('error_message');
                            $('#status_label').addClass('success_message');
                            $('#status_label').text('Password changed successfully!');
                            $('#status_label').css('display', 'block');

                            $('#old_password').val('');
                            $('#new_password').val('');
                            $('#confirm_password').val('');
                        }
                    }
                });
            }
        });

        $('.change_infomation').click(function() {
            $('#infomation_status').css('display', 'none');
            $('#infomation_status').removeClass('success_message');
            $('#infomation_status').addClass('error_message');

            var username = $('#username').val();
            var name = $('#name').val();
            if (username.length == 0) {
                $('#infomation_status').text('Username is required');
                $('#infomation_status').css('display', 'block');
            } else if (name.length == 0) {
                $('#infomation_status').text('Name is required');
                $('#infomation_status').css('display', 'block');
            } else {
                $.ajax({
                    url: '/change_infomation_post',
                    type: 'post',
                    data: {
                        username: username,
                        name: name,
                    },
                    error: function(err) {
                        console.log(err);
                    },
                    success: function(data) {
                        console.log(data);
                        if (data == 0) {
                            $('#infomation_status').text('This username already in use. Please choose another username!');
                            $('#infomation_status').css('display', 'block');
                        } else {
                            $('#infomation_status').removeClass('error_message');
                            $('#infomation_status').addClass('success_message');
                            $('#infomation_status').text('Information change successful!');
                            $('#infomation_status').css('display', 'block');
                            $('#username').attr('disabled', 'true');

                            setTimeout(function() {
                                location.reload();
                            }, 1000);
                        }
                    }
                });
            }
        });

        $('.eye_old_password').mousedown(function() {
            $(this).find('i').removeClass('fa-eye-slash');
            $(this).find('i').addClass('fa-eye');
            $('#old_password').attr('type', 'text');
        });

        $('.eye_old_password').mouseup(function() {
            $(this).find('i').removeClass('fa-eye');
            $(this).find('i').addClass('fa-eye-slash');
            $('#old_password').attr('type', 'password');
        });

        $('.eye_new_password').mousedown(function() {
            $(this).find('i').removeClass('fa-eye-slash');
            $(this).find('i').addClass('fa-eye');
            $('#new_password').attr('type', 'text');
        });

        $('.eye_new_password').mouseup(function() {
            $(this).find('i').removeClass('fa-eye');
            $(this).find('i').addClass('fa-eye-slash');
            $('#new_password').attr('type', 'password');
        });

        $('.eye_confirm_password').mousedown(function() {
            $(this).find('i').removeClass('fa-eye-slash');
            $(this).find('i').addClass('fa-eye');
            $('#confirm_password').attr('type', 'text');
        });

        $('.eye_confirm_password').mouseup(function() {
            $(this).find('i').removeClass('fa-eye');
            $(this).find('i').addClass('fa-eye-slash');
            $('#confirm_password').attr('type', 'password');
        });
    });
</script>
@endsection