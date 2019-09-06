@extends('layouts.app')
@section('content')
    <!-- start home slider -->
    @include('components.slide')
    <!-- end home slider -->
    <!-- San pham noi bat -->
    <div class="our-product-area new-product">
        <div class="container">
            <div class="area-title">
                <h2>Sản phảm nổi bật</h2>
            </div>
        <!-- our-product area start -->
            @if(isset($productHot))
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="features-curosel">

                        @foreach($productHot as $hot)
                            <!-- single-product start -->
                                <div class="col-lg-12 col-md-12">
                                    <div class="single-product first-sale">

                                        <div class="product-img">
                                            @if($hot->pro_number==0)
                                                <span style="position: absolute;background: #e91e63;color: white;padding: 2px 6px;border-radius: 5px;font-size: 10px;">Tạm hết hàng</span>
                                            @endif
                                            @if($hot->pro_sale)
                                                <span style="position: absolute;background-image: linear-gradient(-90deg,#ec1f1f 0%,#ff9c00 100%);border-radius: 10px;padding: 1px 7px;color: white;font-size: 10px;right: 0">{{$hot->pro_sale}}%</span>
                                            @endif
                                            <a href="{{route('get.detail.product',[$hot->pro_slug,$hot->id])}}">
                                                <img class="primary-image" src="{{pare_url_file($hot->pro_avatar)}}" alt="" style="width: 243px;height: 252px"/>
                                                <img class="secondary-image" src="{{pare_url_file($hot->pro_avatar)}}" alt="" style="width: 243px;height: 252px"/>
                                            </a>
                                            <div class="action-zoom">
                                                <div class="add-to-cart">
                                                    <a href="{{route('get.detail.product',[$hot->pro_slug,$hot->id])}}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                </div>
                                            </div>
                                            <div class="actions">
                                                <div class="action-buttons">
                                                    <div class="add-to-links">
                                                        <div class="add-to-wishlist">
                                                            <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                        </div>
                                                        <div class="compare-button">
                                                            <a href="{{route('add.shopping.cart',$hot->id)}}" title="Add to Cart"><i class="icon-bag"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="quickviewbtn">
                                                        <a href="{{route('get.detail.product',[$hot->pro_slug,$hot->id])}}" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="price-box">
                                                <span class="new-price">{{number_format($hot->pro_price,0,',','.')}}đ</span>
                                            </div>

                                        </div>
                                        <div class="product-content">
                                            <h2 class="product-name"><a href="#">{{$hot->pro_name}}</a></h2>
                                            <p>{{$hot->pro_description}}</p>
                                        </div>

                                    </div>
                                </div>
                                <!-- single-product end -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        @endif
            <!-- our-product area end -->
        </div>
    </div>
    <!-- product section end -->
    <!-- latestpost area start -->
    @if(isset($articleNews))
    <div class="latest-post-area">
        <div class="container">
            <div class="area-title">
                <h2>Bài viết mới</h2>
            </div>
            <div class="row">
                <div class="all-singlepost">
                    <!-- single latestpost start -->
                    @foreach($articleNews as $arNew)
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="single-post" style="margin-bottom: 40px">
                            <div class="post-thumb">
                                <a href="#">
                                    <img src="{{asset(pare_url_file($arNew->a_avatar))}}" alt="" style="width: 370px;height: 280px;" />
                                </a>
                            </div>
                            <div class="post-thumb-info">

                                <div class="postexcerpt">
                                    <p style="height: 40px; ">{{$arNew->a_name}}</p>
                                    <a href="{{route('get.detail.article',[$arNew->a_slug,$arNew->id])}}" class="read-more">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- single latestpost end -->
                </div>
            </div>
        </div>
    </div>
    @endif
    <!-- latestpost area end -->

    <!-- testimonial area start -->
    <div class="testimonial-area lap-ruffel">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="crusial-carousel">
                        <div class="crusial-content">
                            <p>“Cuộc sống không phải là một vấn đề cần giải quyết, mà là thực tế để chúng ta cần trải nghiệm”</p>
                            <span>MR X</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Khi bạn thay thế những suy nghĩ tiêu cực bằng suy nghĩ tích cực, bạn sẽ nhận được những kết quả tích cực”</p>
                            <span>MR Y</span>
                        </div>
                        <div class="crusial-content">
                            <p>“Luôn luôn mơ và nhắm cao hơn khả năng của bản thân. Đừng bận tâm tới việc làm tốt hơn những người đương thời hay những người đi trước. Hãy cố để làm tốt hơn chính mình.”</p>
                            <span>MR Z</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->
    <!-- Brand Logo Area Start -->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="brand-carousel">
                    <div class="brand-item"><a href="#"><img src="img/brand/bg1-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg5-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg2-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg3-brand.jpg" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="img/brand/bg4-brand.jpg" alt="" /></a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Area End -->
@stop

