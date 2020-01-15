@extends('layouts.page')
@section('header')
<title>{{$category->name}}</title>
@endsection
@section('body')

<div class="bradcam_area" style="background-image: url('{{$background->value}}')">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="bradcam_text text-center">
                    <h3>{{$category->name}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

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

                            @if($currPage < $totalPage)
                            <li class="page-item">
                                <a href="{{$currUrl}}?page={{$nextPage}}" class="page-link" aria-label="Next">
                                    <i class="ti-angle-right"></i>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </nav>
                    @else
                    <nav class="blog-pagination justify-content-center d-flex">
                        <h1>
                            Empty Category
                        </h1>
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

@endsection
@section('footer')
<script>
    $(document).ready(function() {

    });
</script>
@endsection