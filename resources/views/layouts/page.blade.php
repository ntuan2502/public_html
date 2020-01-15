@if($vsp_maintenance->value == 'on')
<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Bảo trì</title>

        <link rel="icon" type="image/png" href="{{asset('public/logo.png')}}">
        <link rel="stylesheet" href="{{asset('public/comingsoon/vendor/bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/comingsoon/vendor/animate/animate.css')}}">
        <link rel="stylesheet" href="{{asset('public/comingsoon/vendor/select2/select2.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/comingsoon/css/util.css')}}">
        <link rel="stylesheet" href="{{asset('public/comingsoon/css/main.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

        <style>
            .logo {
                max-width: 100px !important;
            }
        </style>
    </head>

    <body>

        <div class="simpleslide100">
            <div class="simpleslide100-item bg-img1" style="background-image: url({{$background->value}})"></div>
        </div>

        <div class="flex-col-c-sb size1 overlay1">
            <div class="w-full flex-w flex-sb-m p-l-80 p-r-80 p-t-22 p-lr-15-sm">
                <div class="wrappic1 m-r-30 m-t-10 m-b-10">
                    <a href="/"><img class="logo" src="{{asset('public/logo.png')}}" alt="LOGO"></a>
                </div>

                <!-- <div class="flex-w m-t-10 m-b-10">
                    <a href="#" class="size2 m1-txt1 flex-c-m how-btn1 trans-04">
                        Sign Up
                    </a>
                </div> -->
            </div>

            <div class="flex-col-c-m p-l-15 p-r-15 p-t-50 p-b-120">
                <h3 class="l1-txt1 txt-center p-b-35 respon1">
                    Coming Soon
                </h3>

                <div class="flex-w flex-c cd100 respon2">
                    <div class="flex-col-c wsize1 m-b-30">
                        <span class="l1-txt2 p-b-37 days"></span>
                        <span class="m1-txt2 p-r-20">Days</span>
                    </div>

                    <span class="l1-txt2 p-t-15 dis-none-sm">:</span>

                    <div class="flex-col-c wsize1 m-b-30">
                        <span class="l1-txt2 p-b-37 hours"></span>
                        <span class="m1-txt2 p-r-20">Hr</span>
                    </div>

                    <span class="l1-txt2 p-t-15 dis-none-lg">:</span>

                    <div class="flex-col-c wsize1 m-b-30">
                        <span class="l1-txt2 p-b-37 minutes"></span>
                        <span class="m1-txt2 p-r-20">Min</span>
                    </div>

                    <span class="l1-txt2 p-t-15 dis-none-sm">:</span>

                    <div class="flex-col-c wsize1 m-b-30">
                        <span class="l1-txt2 p-b-37 seconds"></span>
                        <span class="m1-txt2 p-r-20">Sec</span>
                    </div>
                </div>
            </div>

            <div class="flex-w flex-c-m p-b-35">
                <a href="{{$vsp_facebook->value}}" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
                    <i class="fab fa-facebook"></i>
                </a>

                <a href="{{$vsp_youtube->value}}" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
                    <i class="fab fa-youtube"></i>
                </a>

                <a href="{{$vsp_discord->value}}" class="size3 flex-c-m how-social trans-04 m-r-3 m-l-3 m-b-5">
                    <i class="fab fa-discord"></i>
                </a>
            </div>
        </div>





        <script src="{{asset('public/comingsoon/vendor/jquery/jquery-3.2.1.min.js')}}"></script>
        <script src="{{asset('public/comingsoon/vendor/bootstrap/js/popper.js')}}"></script>
        <script src="{{asset('public/comingsoon/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/comingsoon/vendor/select2/select2.min.js')}}"></script>
        <script src="{{asset('public/comingsoon/vendor/countdowntime/moment.min.js')}}"></script>
        <script src="{{asset('public/comingsoon/vendor/countdowntime/moment-timezone.min.js')}}"></script>
        <script src="{{asset('public/comingsoon/vendor/countdowntime/moment-timezone-with-data.min.js')}}"></script>
        <script src="{{asset('public/comingsoon/vendor/countdowntime/countdowntime.js')}}"></script>
        <script>
            function makeTimer() {

                var endTime = new Date("15 January 2020 21:00:00 GMT+07:00");
                endTime = (Date.parse(endTime) / 1000);

                var now = new Date();
                now = (Date.parse(now) / 1000);

                var timeLeft = endTime - now;

                var days = Math.floor(timeLeft / 86400);
                var hours = Math.floor((timeLeft - (days * 86400)) / 3600);
                var minutes = Math.floor((timeLeft - (days * 86400) - (hours * 3600)) / 60);
                var seconds = Math.floor((timeLeft - (days * 86400) - (hours * 3600) - (minutes * 60)));

                if (hours < "10") {
                    hours = "0" + hours;
                }
                if (minutes < "10") {
                    minutes = "0" + minutes;
                }
                if (seconds < "10") {
                    seconds = "0" + seconds;
                }

                $(".days").html(days);
                $(".hours").html(hours);
                $(".minutes").html(minutes);
                $(".seconds").html(seconds);

            }

            setInterval(function() {
                makeTimer();
            }, 1000);

        </script>
        <script src="{{asset('public/comingsoon/vendor/tilt/tilt.jquery.min.js')}}"></script>
        <script>
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <script src="{{asset('public/comingsoon/js/main.js')}}"></script>

    </body>

    </html>
</div>
@else
<div>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link rel="shortcut icon" type="image/x-icon" href="{{asset('public/logo.png')}}">

        <link rel="stylesheet" href="{{asset('public/homepage/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/magnific-popup.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/nice-select.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/audioplayer.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/flaticon.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/gijgo.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/animate.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/slick.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/slicknav.css')}}">
        <link rel="stylesheet" href="{{asset('public/homepage/css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">

        <link rel="stylesheet" href="{{asset('public/custom_homepage.css')}}">

        @yield('header')
    </head>

    <body>
        <div id="fb-root"></div>

        <div class="fb-customerchat" attribution=setup_tool page_id="2277354669210570" logged_in_greeting="Tham gia discord tại https://discord.gg/JtcN8yF" logged_out_greeting="Tham gia discord tại https://discord.gg/JtcN8yF">
        </div>

        @csrf
        <header>
            <div class="header-area ">
                <div id="sticky-header" class="main-header-area">
                    <div class="container-fluid">
                        <div class="header_bottom_border">
                            <div class="row align-items-center">
                                <div class="col-xl-3 col-lg-2">
                                    <div class="logo">
                                        <a href="/">
                                            <img src="{{asset('public/logo.png')}}" alt="">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-7">
                                    <div class="main-menu  d-none d-lg-block">
                                        <nav>
                                            <ul id="navigation">
                                                <li><a class="active" href="/">home</a></li>
                                                <li><a class="pointer">Category<i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        @foreach($vsp_categories as $category)
                                                        <li><a href="/category/{{$category->slug}}" class="pointer">{{$category->name}}</a></li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                @if($vsp_user)
                                                <li><a class="pointer">Hi {{$vsp_user->name}} <i class="ti-angle-down"></i></a>
                                                    <ul class="submenu">
                                                        @if($vsp_user->role_id == 1)
                                                        <li><a href="/admin" target="_blank" class="pointer">Admin</a></li>
                                                        @endif
                                                        <li><a href="/account" class="pointer">Infomation</a></li>
                                                        <li><a class="pointer logout">Logout</a></li>
                                                    </ul>
                                                </li>
                                                @else
                                                <li><a href="/login">Đăng nhập</a></li>
                                                <!-- <li><a href="/register">Đăng ký</a></li> -->
                                                @endif
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-3 d-none d-lg-block">
                                    <div class="social_icon text-right">
                                        <ul>
                                            <li><a href="{{$vsp_facebook->value}}"> <i class="fab fa-facebook"></i> </a></li>
                                            <li><a href="{{$vsp_youtube->value}}"> <i class="fab fa-youtube"></i> </a></li>
                                            <li><a href="{{$vsp_discord->value}}"> <i class="fab fa-discord"></i> </a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mobile_menu d-block d-lg-none"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        @yield('body')

        <footer class="footer">
            <div class="footer_top">
                <div class="container">
                    <div class="row">
                        <!-- <div class="col-xl-6 col-md-6">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Services
                            </h3>
                            <div class="subscribe-from">
                                <form action="#">
                                    <input type="text" placeholder="Enter your mail">
                                    <button type="submit">Subscribe</button>
                                </form>
                            </div>
                            <p class="sub_text">Esteem spirit temper too say adieus who direct esteem esteems luckily.</p>
                        </div>
                    </div> -->
                        <div class="col-xl-12 col-md-12" style="text-align: center;">
                            <div class="footer_widget">
                                <h3 class="footer_title">
                                    Contact Me
                                </h3>
                                <ul>
                                    <li>Facebook:
                                        <a href="{{$vsp_facebook->value}}">
                                            NAT
                                        </a>
                                    </li>
                                    <li>Youtube:
                                        <a href="{{$vsp_youtube->value}}">
                                            Khánh Linh
                                        </a>
                                    </li>
                                    <li>Discord:
                                        <a href="{{$vsp_discord->value}}">
                                            {{$vsp_discord->value}}
                                        </a>
                                    </li>
                                </ul>
                                <div class="socail_links">
                                    <ul>
                                        <li>
                                            <a href="{{$vsp_facebook->value}}">
                                                <i class=" fab fa-facebook "></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{$vsp_youtube->value}}">
                                                <i class="fab fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{$vsp_discord->value}}">
                                                <i class="fab fa-discord"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copy-right_text">
                <div class="container">
                    <div class="footer_border"></div>
                    <div class="row">
                        <div class="col-xl-12 col-md-12">
                            <p class="copy_right">
                                Copyright &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved | Made with <i class="fas fa-heart" aria-hidden="true"></i> by <a href="{{$vsp_facebook->value}}" target="_blank">NAT</a>
                            </p>
                        </div>
                        <!-- <div class="col-xl-5 col-md-6">
                        <div class="footer_links">
                            <ul>
                                <li><a href="#">home</a></li>
                                <li><a href="#">about</a></li>
                                <li><a href="#">tracks</a></li>
                                <li><a href="#">blog</a></li>
                                <li><a href="#">contact</a></li>
                            </ul>
                        </div>
                    </div> -->
                    </div>
                </div>
            </div>
        </footer>


        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="{{asset('public/homepage/js/vendor/modernizr-3.5.0.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/vendor/jquery-1.12.4.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/popper.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/ajax-form.js')}}"></script>
        <script src="{{asset('public/homepage/js/waypoints.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/audioplayer.js')}}"></script>
        <script src="{{asset('public/homepage/js/scrollIt.js')}}"></script>
        <script src="{{asset('public/homepage/js/jquery.scrollUp.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/wow.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/nice-select.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/jquery.slicknav.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/plugins.js')}}"></script>
        <script src="{{asset('public/homepage/js/gijgo.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/slick.min.js')}}"></script>

        <script src="{{asset('public/homepage/js/contact.js')}}"></script>
        <script src="{{asset('public/homepage/js/jquery.ajaxchimp.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/jquery.form.js')}}"></script>
        <script src="{{asset('public/homepage/js/jquery.validate.min.js')}}"></script>
        <script src="{{asset('public/homepage/js/mail-script.js')}}"></script>

        <script src="{{asset('public/homepage/js/main.js')}}"></script>

        <script>
            $(document).ready(function() {
                var token = $('input[name=_token]').val();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': token
                    }
                });

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
            });
        </script>

        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml: true,
                    version: 'v5.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>

        @yield('footer')
    </body>

    </html>
</div>
@endif