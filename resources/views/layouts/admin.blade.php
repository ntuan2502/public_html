<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/logo.png')}}">
    <link href="{{ asset('public/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/plugins/textSpinners/spinners.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/plugins/toastr/toastr.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/js/plugins/gritter/jquery.gritter.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/plugins/select2/select2.min.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/animate.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/style.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/plugins/summernote/summernote-bs4.css')}}" rel="stylesheet">
    <link href="{{ asset('public/admin/css/plugins/footable/footable.core.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <style>
        .error_status {
            color: red;
            display: none;
        }

        .success_status {
            color: green;
            display: none;
        }

        .avatar_image {
            width: 5rem;
        }

        .timer {
            display: inline-block;
            font-weight: 700;
        }

        .preview_icon {
            width: 10rem;
            height: auto;
            background-color: #2f4050;
        }
    </style>
    @yield('header')

</head>

<body class="">
    @csrf

    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element">
                            <img alt="image" class="rounded-circle avatar_image" src="{{$vsp_user->avatar}}" />
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="block m-t-xs font-bold">{{$vsp_user->name}}</span>
                                <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                            </a>
                            <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li class="dropdown-divider"></li>
                                <li><a class="dropdown-item logout">Logout</a></li>
                            </ul>
                        </div>
                        <div class="logo-element">
                            IN+
                        </div>
                    </li>

                    <li class="{{ (Route::currentRouteName() == 'admin' ? 'active' : '') }}">
                        <a href="#"><i class="fa fa-files-o"></i> <span class="nav-label">Other Pages</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li class="{{ (Route::currentRouteName() == 'admin' ? 'active' : '') }}">
                                <a href="/admin">404 Page</a>
                            </li>
                            <li><a href="#">Empty page</a></li>
                        </ul>
                    </li>
                    <li class="{{ (Route::currentRouteName() == 'setting' ? 'active' : '') }}">
                        <a href="/admin/setting">
                            <i class="fa fa-gear"></i>
                            <span class="nav-label">Cài đặt</span>
                        </a>
                    </li>
                    <li class="{{ (Route::currentRouteName() == 'class' ? 'active' : '') }}">
                        <a href="/admin/class">
                            <i class="fa fa-gear"></i>
                            <span class="nav-label">Hệ phái</span>
                            <span class="float-right label label-primary">SPECIAL</span>
                        </a>
                    </li>
                    <li class="{{ (Route::currentRouteName() == 'category' ? 'active' : '') }}">
                        <a href="/admin/category">
                            <i class="fa fa-gear"></i>
                            <span class="nav-label">Chuyên mục</span>
                            <!-- <span class="float-right label label-primary">SPECIAL</span> -->
                        </a>
                    </li>
                    <li class="{{ (Route::currentRouteName() == 'post' ? 'active' : '') }}">
                        <a href="/admin/post">
                            <i class="fa fa-gear"></i>
                            <span class="nav-label">Bài viết</span>
                            <!-- <span class="float-right label label-primary">SPECIAL</span> -->
                        </a>
                    </li>
                    <li class="{{ (Route::currentRouteName() == 'user' ? 'active' : '') }}">
                        <a href="/admin/user">
                            <i class="fa fa-gear"></i>
                            <span class="nav-label">Người dùng</span>
                            <!-- <span class="float-right label label-primary">SPECIAL</span> -->
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg">
            <div class="row border-bottom">
                <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                    <div class="navbar-header">
                        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary" href="#"><i class="fa fa-bars"></i> </a>
                        <!-- <form role="search" class="navbar-form-custom" action="search_results.html">
                            <div class="form-group">
                                <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                            </div>
                        </form> -->
                    </div>
                    <ul class="nav navbar-top-links navbar-right">
                        <div class="minimalize-styl-2">
                            <div class="timer" id="days"></div>
                            <div class="timer" id="months"></div>
                            <div class="timer" style="margin-right:10px;" id="years"></div>
                            <div class="timer" id="hours"></div>
                            <div class="timer" id="minutes"></div>
                            <div class="timer" id="seconds"></div>
                        </div>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-envelope"></i> <span class="label label-warning">16</span>
                            </a>
                            <ul class="dropdown-menu dropdown-messages">
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="{{asset('public/admin/img/a7.jpg')}}">
                                        </a>
                                        <div class="media-body">
                                            <small class="float-right">46h ago</small>
                                            <strong>Mike Loreipsum</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="{{asset('public/admin/img/a4.jpg')}}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right text-navy">5h ago</small>
                                            <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica
                                                Smith</strong>. <br>
                                            <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="dropdown-messages-box">
                                        <a class="dropdown-item float-left" href="profile.html">
                                            <img alt="image" class="rounded-circle" src="{{asset('public/admin/img/profile.jpg')}}">
                                        </a>
                                        <div class="media-body ">
                                            <small class="float-right">23h ago</small>
                                            <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                            <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                        </div>
                                    </div>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="mailbox.html" class="dropdown-item">
                                            <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                                <i class="fa fa-bell"></i> <span class="label label-primary">8</span>
                            </a>
                            <ul class="dropdown-menu dropdown-alerts">
                                <li>
                                    <a href="mailbox.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="profile.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                            <span class="float-right text-muted small">12 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <a href="grid_options.html" class="dropdown-item">
                                        <div>
                                            <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                            <span class="float-right text-muted small">4 minutes ago</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="dropdown-divider"></li>
                                <li>
                                    <div class="text-center link-block">
                                        <a href="notifications.html" class="dropdown-item">
                                            <strong>See All Alerts</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="logout">
                                <i class="fa fa-sign-out"></i> Log out
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

            @yield('body')

            <div class="footer">
                <div class="float-right">
                    <strong><a href="http://pixiostudio.com " target="_blank" rel="noopener noreferrer">PixioStudio</a></strong>
                </div>
                <div>
                    <strong>Copyright</strong> <a href="http://facebook.com/ntuan.2502" target="_blank" rel="noopener noreferrer">NAT</a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('public/admin/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/admin/js/popper.min.js')}}"></script>
    <script src="{{asset('public/admin/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/admin/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script src="{{asset('public/admin/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('public/admin/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('public/admin/js/inspinia.js')}}"></script>
    <script src="{{asset('public/admin/js/plugins/pace/pace.min.js')}}"></script>
    <script src="{{asset('public/admin/js/plugins/pwstrength/pwstrength-bootstrap.min.js')}}"></script>
    <script src="{{asset('public/admin/js/plugins/pwstrength/zxcvbn.js')}}"></script>

    <script src="{{ asset('public/admin/js/plugins/flot/jquery.flot.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/flot/jquery.flot.spline.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/flot/jquery.flot.resize.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/flot/jquery.flot.pie.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/peity/jquery.peity.min.js')}}"></script>
    <script src="{{ asset('public/admin/js/demo/peity-demo.js')}}"></script>
    <!-- <script src="{{ asset('public/admin/js/plugins/jquery-ui/jquery-ui.min.js')}}"></script> -->
    <script src="{{ asset('public/admin/js/plugins/gritter/jquery.gritter.min.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <script src="{{ asset('public/admin/js/demo/sparkline-demo.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/chartJs/Chart.min.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/toastr/toastr.min.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/footable/footable.all.min.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/summernote/summernote-bs4.js')}}"></script>

    <script src="{{ asset('public/admin/js/plugins/dataTables/datatables.min.js')}}"></script>
    <script src="{{ asset('public/admin/js/plugins/dataTables/dataTables.bootstrap4.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
    <script src="{{ asset('public/link.js')}}"></script>
    <script>
        function makeTimer() {
            var now = new Date();
            var days = now.getDate();
            var months = now.getMonth() + 1;
            var years = now.getFullYear();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            if (days < "10") {
                days = "0" + days;
            }
            if (months < "10") {
                months = "0" + months;
            }
            if (hours < "10") {
                hours = "0" + hours;
            }
            if (minutes < "10") {
                minutes = "0" + minutes;
            }
            if (seconds < "10") {
                seconds = "0" + seconds;
            }
            $("#days").html(days + " /");
            $("#months").html(months + " /");
            $("#years").html(years + "");
            $("#hours").html(hours + " :");
            $("#minutes").html(minutes + " :");
            $("#seconds").html(seconds + "");
        }
        setInterval(function() {
            makeTimer();
        }, 1000);
    </script>
    <script>
        $(document).ready(function() {
            var token = $('input[name=_token]').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': token
                }
            });

            @if(session('success'))
            setTimeout(function() {
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000
                };
                toastr.success('{{session("success")}}', 'Thành công!');
            }, 1300);
            @endif

            $('.logout').click(function() {
                $.ajax({
                    url: '/logout',
                    type: 'post',
                    data: {
                        url: window.location.pathname
                    },
                    error: function(err) {
                        console.log(err);
                    },
                    success: function(data) {
                        console.log(data);
                        window.location.href = data.redirect;
                    }
                });
                return false;
            });

            $('.footable').footable();

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
    @yield('footer')
</body>

</html>