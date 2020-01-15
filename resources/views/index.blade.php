@extends('layouts.page')
@section('header')
<style>
    .slider_area .single_slider .slider_text h3 {
        font-size: 50px;
        color: wheat;
    }

    .slider_area .single_slider .slider_text .small_text h3 {
        font-size: 30px;
        color: wheat;
    }

    .slider_area .single_slider .slider_text a h3 {
        font-size: 20px;
        color: red;
    }

    .modal-backdrop {
        z-index: 1;
    }
</style>
<title>Blade and Soul VN</title>
<meta property="og:url" content="{{URL::current()}}" />
<meta property="og:type" content="Website" />
<meta property="og:title" content="Blade & Soul Việt Nam" />
<meta property="og:description" content="Blade & Soul Việt Nam" />
<meta property="og:image" content="{{asset($background->value)}}" />
@endsection
@section('body')

<div class="slider_area">
    <div class="single_slider  d-flex align-items-center overlay2" style="background-image: url('{{$background->value}}')">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="slider_text text-center ">
                        <h3>{{$name_version->value}}</h3>
                        <div class="small_text">
                            <h3>
                                Cập nhật ngày {{$update_time->value}} phiên bản {{$version->value}}
                            </h3>
                        </div>
                    </div>
                </div>
                @if($vsp_user)
                <div class="col-xl-12">
                    <div class="slider_text text-center ">
                        @if($download->value == 'on')
                        <a class="pointer" data-toggle="modal" data-target="#download_Mod">
                            <h3>Tải mod</h3>
                        </a>
                        @else
                        <a class="pointer">
                            <h3>Đang cập nhật...</h3>
                        </a>
                        @endif
                    </div>
                </div>
                @else
                <div class="col-xl-12">
                    <div class="slider_text text-center ">
                        <a href="/login">
                            <h3>Tải mod</h3>
                        </a>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@if($vsp_user)
<div class="modal fade" id="download_Mod" tabindex="-1" role="dialog" aria-labelledby="download_ModLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="download_ModLabel">Lựa chọn phiên bản phù hợp với cấu hình của bạn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                32bit XML: <a href="{{$mod_32bit->value}}" class="btn btn-primary">Tải xuống</a>
                <hr>
                64bit XML: <a href="{{$mod_64bit->value}}" class="btn btn-success">Tải xuống</a>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="music_area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-xl-12">
                <div class="row align-items-center">
                    <div class="col-xl-12 col-md-12">
                        <div class="music_field">
                            <div class="audio_name">
                                <div class="name">
                                    <h4><a href="{{$vsp_music->link}}" id="music_link" target="_blank">{{$vsp_music->title}}</a></h4>
                                    <p id="music_artist">{{$vsp_music->artist}}</p>
                                </div>
                                <audio preload="auto" controls {{$vsp_music->auto_play == 1? 'autoplay' : ''}} {{$vsp_music->loop == 1? 'loop' : ''}}>
                                    <source id="music_src" src="{{$vsp_music->audio}}">
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

<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">

                    @if(count($posts) > 0)
                    @foreach($posts as $post)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <a href="/post/{{$post->slug}}">
                                <img class="card-img rounded-0" src="/{{$post->cover}}" alt="">
                            </a>
                            <a href="/post/{{$post->slug}}" class="blog_item_date">
                                <h3>{{$post->day_created}}</h3>
                                <p>{{$post->Month_created}}</p>
                            </a>
                        </div>

                        <div class="blog_details">
                            <a class="d-inline-block" href="/post/{{$post->slug}}">
                                <h2>{{$post->name}}</h2>
                            </a>
                            <!-- <p>That dominion stars lights dominion divide years for fourth have don't stars is that
                                he earth it first without heaven in place seed it second morning saying.</p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>
                                <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                            </ul> -->
                        </div>
                    </article>

                    @endforeach

                    <nav class="blog-pagination justify-content-center d-flex">
                        <ul class="pagination">
                            @if($currPage > 1)
                            <li class="page-item">
                                <a href="{{$currUrl}}?page={{$previousPage}}" class="page-link" aria-label="Previous">
                                    <i class="ti-angle-left"></i>
                                </a>
                            </li>
                            @endif

                            @foreach($listPages as $page)
                            @if($page!= '...')
                            <li class="page-item {{($page==$currPage) ? 'active':''}}">
                                <a href="{{$currUrl}}?page={{$page}}" class="page-link">{{$page}}</a>
                            </li>
                            @else
                            <li class="page-item">
                                <a class="page-link">{{$page}}</a>
                            </li>
                            @endif
                            @endforeach

                            @if ($currPage < $totalPage) <li class="page-item">
                                <a href="{{$currUrl}}?page={{$nextPage}}" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                                </li>
                                @endif
                        </ul>
                    </nav>

                    @endif
                </div>
            </div>
            <!-- <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <form action="#">
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder='Search Keyword' onfocus="this.placeholder = ''" onblur="this.placeholder = 'Search Keyword'">
                                    <div class="input-group-append">
                                        <button class="btn" type="button"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Search</button>
                        </form>
                    </aside>

                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Category</h4>
                        <ul class="list cat-list">
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Resaurant food</p>
                                    <p>(37)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Travel news</p>
                                    <p>(10)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Modern technology</p>
                                    <p>(03)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Product</p>
                                    <p>(11)</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Inspiration</p>
                                    <p>21</p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="d-flex">
                                    <p>Health Care (21)</p>
                                    <p>09</p>
                                </a>
                            </li>
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent Post</h3>
                        <div class="media post_item">
                            <img src="{{asset('/public/homepage/img/post/post_1.png')}}" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>From life was you fish...</h3>
                                </a>
                                <p>January 12, 2019</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="{{asset('/public/homepage/img/post/post_2.png')}}" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>The Amazing Hubble</h3>
                                </a>
                                <p>02 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="{{asset('/public/homepage/img/post/post_3.png')}}" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>Astronomy Or Astrology</h3>
                                </a>
                                <p>03 Hours ago</p>
                            </div>
                        </div>
                        <div class="media post_item">
                            <img src="{{asset('/public/homepage/img/post/post_4.png')}}" alt="post">
                            <div class="media-body">
                                <a href="single-blog.html">
                                    <h3>Asteroids telescope</h3>
                                </a>
                                <p>01 Hours ago</p>
                            </div>
                        </div>
                    </aside>
                    <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Tag Clouds</h4>
                        <ul class="list">
                            <li>
                                <a href="#">project</a>
                            </li>
                            <li>
                                <a href="#">love</a>
                            </li>
                            <li>
                                <a href="#">technology</a>
                            </li>
                            <li>
                                <a href="#">travel</a>
                            </li>
                            <li>
                                <a href="#">restaurant</a>
                            </li>
                            <li>
                                <a href="#">life style</a>
                            </li>
                            <li>
                                <a href="#">design</a>
                            </li>
                            <li>
                                <a href="#">illustration</a>
                            </li>
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Feeds</h4>
                        <ul class="instagram_row flex-wrap">
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('/public/homepage/img/post/post_5.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('/public/homepage/img/post/post_6.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('/public/homepage/img/post/post_7.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('/public/homepage/img/post/post_8.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('/public/homepage/img/post/post_9.png')}}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('/public/homepage/img/post/post_10.png')}}" alt="">
                                </a>
                            </li>
                        </ul>
                    </aside>

                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Newsletter</h4>
                        <form action="#">
                            <div class="form-group">
                                <input type="email" class="form-control" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                            </div>
                            <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn" type="submit">Subscribe</button>
                        </form>
                    </aside>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- <div class="about_area">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-5 col-md-6">
                <div class="about_thumb">
                    <img class="img-fluid" src="{{asset('public/homepage/img/about/about_1.png')}}" alt="">
                </div>
            </div>
            <div class="col-xl-7 col-md-6">
                <div class="about_info">
                    <h3>Jack Kalib</h3>
                    <p>Esteem spirit temper too say adieus who direct esteem. It esteems luckily or picture placing drawing. Apartments frequently or motionless on reasonable projecting expression enim ad minim veniam quis nostrud exercitation we have supported programmes to help alleviate human suffering through animal welfare when people might depend.</p>
                    <div class="signature">
                        <img src="{{asset('public/homepage/img/about/signature.png')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="youtube_video_area">
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single_video">
                    <div class="thumb">
                        <img src="{{asset('public/homepage/img/video/1.png')}}" alt="">
                    </div>
                    <div class="hover_elements">
                        <div class="video">
                            <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>

                        <div class="hover_inner">
                            <span>New York Show-2018</span>
                            <h3><a href="#">Shadows of My Dream</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single_video">
                    <div class="thumb">
                        <img src="{{asset('public/homepage/img/video/2.png')}}" alt="">
                    </div>
                    <div class="hover_elements">
                        <div class="video">
                            <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>

                        <div class="hover_inner">
                            <span>New York Show-2018</span>
                            <h3><a href="#">Shadows of My Dream</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single_video">
                    <div class="thumb">
                        <img src="{{asset('public/homepage/img/video/3.png')}}" alt="">
                    </div>
                    <div class="hover_elements">
                        <div class="video">
                            <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>

                        <div class="hover_inner">
                            <span>New York Show-2018</span>
                            <h3><a href="#">Shadows of My Dream</a></h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-6">
                <div class="single_video">
                    <div class="thumb">
                        <img src="{{asset('public/homepage/img/video/4.png')}}" alt="">
                    </div>
                    <div class="hover_elements">
                        <div class="video">
                            <a class="popup-video" href="https://www.youtube.com/watch?v=Hzmp3z6deF8">
                                <i class="fa fa-play"></i>
                            </a>
                        </div>

                        <div class="hover_inner">
                            <span>New York Show-2018</span>
                            <h3><a href="#">Shadows of My Dream</a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="music_area music_gallery">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-65">
                    <h3>Latest Tracks</h3>
                </div>
            </div>
        </div>
        <div class="row align-items-center justify-content-center mb-20">
            <div class="col-xl-10">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-md-9">
                        <div class="music_field">
                            <div class="thumb">
                                <img src="{{asset('public/homepage/img/music_man/1.png')}}" alt="">
                            </div>
                            <div class="audio_name">
                                <div class="name">
                                    <h4>Frando Kally</h4>
                                    <p>10 November, 2019</p>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="https://www.w3schools.com/html/horse.mp3">
                                </audio>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <div class="music_btn">
                            <a href="#" class="boxed-btn">buy albam</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row align-items-center justify-content-center mb-20">
            <div class="col-xl-10">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-md-9">
                        <div class="music_field">
                            <div class="thumb">
                                <img src="{{asset('public/homepage/img/music_man/2.png')}}" alt="">
                            </div>
                            <div class="audio_name">
                                <div class="name">
                                    <h4>Frando Kally</h4>
                                    <p>10 November, 2019</p>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="https://www.w3schools.com/html/horse.mp3">
                                </audio>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <div class="music_btn">
                            <a href="#" class="boxed-btn">buy albam</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row align-items-center justify-content-center mb-20">
            <div class="col-xl-10">
                <div class="row align-items-center">
                    <div class="col-xl-9 col-md-9">
                        <div class="music_field">
                            <div class="thumb">
                                <img src="{{asset('public/homepage/img/music_man/3.png')}}" alt="">
                            </div>
                            <div class="audio_name">
                                <div class="name">
                                    <h4>Frando Kally</h4>
                                    <p>10 November, 2019</p>
                                </div>
                                <audio preload="auto" controls>
                                    <source src="https://www.w3schools.com/html/horse.mp3">
                                </audio>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-3">
                        <div class="music_btn">
                            <a href="#" class="boxed-btn">buy albam</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<div class="gallery_area">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section_title text-center mb-65">
                    <h3>Image Galleries</h3>
                </div>
            </div>
        </div>
        <div class="row grid">
            <div class="col-xl-5 col-lg-5 grid-item cat1 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="portfolio-img">
                        <img src="{{asset('public/homepage/img/gallery/1.png')}}" alt="">
                    </div>
                    <div class="gallery_hover">
                        <a class="popup-image" href="{{asset('public/homepage/img/gallery/1.png')}}" class="hover_inner">
                            <i class="ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 grid-item cat3 cat4 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="portfolio-img">
                        <img src="{{asset('public/homepage/img/gallery/2.png')}}" alt="">
                    </div>
                    <div class="gallery_hover">
                        <a class="popup-image" href="{{asset('public/homepage/img/gallery/2.png')}}" class="hover_inner">
                            <i class="ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 grid-item cat4 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="portfolio-img">
                        <img src="{{asset('public/homepage/img/gallery/3.png')}}" alt="">
                    </div>
                    <div class="gallery_hover">
                        <a class="popup-image" href="{{asset('public/homepage/img/gallery/3.png')}}" class="hover_inner">
                            <i class="ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 grid-item cat2 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="portfolio-img">
                        <img src="{{asset('public/homepage/img/gallery/4.png')}}" alt="">
                    </div>
                    <div class="gallery_hover">
                        <a class="popup-image" href="{{asset('public/homepage/img/gallery/4.png')}}" class="hover_inner">
                            <i class="ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 grid-item cat2 col-md-6">
                <div class="single-gallery mb-30">
                    <div class="portfolio-img">
                        <img src="{{asset('public/homepage/img/gallery/5.png')}}" alt="">
                    </div>
                    <div class="gallery_hover">
                        <a class="popup-image" href="{{asset('public/homepage/img/gallery/5.png')}}" class="hover_inner">
                            <i class="ti-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="contact_rsvp">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="text text-center">
                    <h3>Contact For RSVP</h3>
                    <a class="boxed-btn3" href="contact.html">Contact Me</a>
                </div>
            </div>
        </div>
    </div>
</div> -->

@endsection
@section('footer')
<script>
    $(document).ready(function() {
        $('audio').audioPlayer();
    });
</script>
@endsection