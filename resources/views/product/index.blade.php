@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Trang chủ</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{$cateProduct->c_name}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumbs area end -->
    <!-- shop-with-sidebar Start -->
    <div class="shop-with-sidebar">
        <div class="container">
            <div class="row">
                <!-- left sidebar start -->
                <div class="col-md-3 col-sm-12 col-xs-12 text-left">
                    <div class="topbar-left">
                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{asset('img/bar-ping.png')}}" alt=""></div>
                                <h2>Lọc điều kiện</h2>
                            </div>
                        </aside>

                        <aside class="sidebar-content">
                            <div class="sidebar-title">
                                <h6>Khoảng giá</h6>
                            </div>
                            <ul>
                                <li><a href="#"> Dưới 1.000.000 đ</a></li>
                                <li><a href="#"> 1.000.000 - 3.000.000 đ</a></li>
                                <li><a href="#"> 3.000.000 - 5.000.000 đ</a></li>
                                <li><a href="#"> 5.000.000 - 10.000.000 đ</a></li>
                                <li><a href="#"> 10.000.000 - 20.000.000 đ</a></li>
                                <li><a href="#"> Trên 20.000.000 đ</a></li>
                            </ul>
                        </aside>

                        <aside class="widge-topbar">
                            <div class="bar-title">
                                <div class="bar-ping"><img src="{{asset('img/bar-ping.png')}}" alt=""></div>
                                <h2>Tags</h2>
                            </div>
                            <div class="exp-tags">
                                <div class="tags">
                                    <a href="#">Nokia</a>
                                    <a href="#">Iphone</a>
                                    <a href="#">Giá rẻ</a>
                                    <a href="#">Hàng cũ</a>
                                    <a href="#">Samsung</a>
                                    <a href="#">Laptop</a>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
                <!-- left sidebar end -->
                <!-- right sidebar start -->
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <!-- shop toolbar start -->
                    <div class="shop-content-area">
                        <div class="shop-toolbar">
                            <div class="col-xs-12 nopadding-left ">
                                <form class="tree-most" method="get">
                                    <div class="orderby-wrapper pull-right">
                                        <label>Sắp xếp</label>
                                        <select name="orderby" class="orderby">
                                            <option value="menu_order" selected="selected">Mặc định</option>
                                            <option value="popularity">Mới nhất</option>
                                            <option value="rating">Sản phẩm cũ</option>
                                            <option value="date">Giá tăng dần</option>
                                            <option value="price">Giá giảm dần</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- shop toolbar end -->
                    <!-- product-row start -->
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="shop-grid-tab">
                            <div class="row">
                                <div class="shop-product-tab first-sale">
                                    @foreach($products as $product)
                                    <div class="col-lg-4 col-md-4 col-sm-4">
                                        <div class="two-product">
                                            <!-- single-product start -->
                                            <div class="single-product">
                                                <span class="sale-text">Sale</span>
                                                <div class="product-img">
                                                    <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">
                                                        <img class="primary-image" src="{{asset(pare_url_file($product->pro_avatar))}}" alt="" />
                                                        <img class="secondary-image" src="{{asset(pare_url_file($product->pro_avatar))}}" alt="" />
                                                    </a>
                                                    <div class="action-zoom">
                                                        <div class="add-to-cart">
                                                            <a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}" title="Quick View"><i class="fa fa-search-plus"></i></a>
                                                        </div>
                                                    </div>
                                                    <div class="actions">
                                                        <div class="action-buttons">
                                                            <div class="add-to-links">
                                                                <div class="add-to-wishlist">
                                                                    <a href="#" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                                </div>
                                                                <div class="compare-button">
                                                                    <a href="#" title="Add to Cart"><i class="icon-bag"></i></a>
                                                                </div>
                                                            </div>
                                                            <div class="quickviewbtn">
                                                                <a href="#" title="Add to Compare"><i class="fa fa-retweet"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="price-box">
                                                        <span class="new-price">{{number_format($product->pro_price,0,',','.')}}đ</span>
                                                    </div>
                                                </div>
                                                <div class="product-content">
                                                    <h2 class="product-name"><a href="{{route('get.detail.product',[$product->pro_slug,$product->id])}}">{{$product->pro_name}}</a></h2>
                                                    <p>{{$product->pro_description}}</p>
                                                </div>
                                            </div>
                                            <!-- single-product end -->
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <!-- list view -->
                        <div class="tab-pane fade" id="shop-list-tab">
                            <div class="list-view">
                                <!-- single-product start -->
                                <div class="product-list-wrapper">
                                    <div class="single-product">
                                        <div class="col-md-4 col-sm-4 col-xs-12">
                                            <div class="product-img">
                                                <a href="#">
                                                    <img class="primary-image" src="{{asset('img/products/product-7.jpg')}}" alt="" />
                                                    <img class="secondary-image" src="{{asset('img/products/product-2.jpg')}}" alt="" />
                                                </a>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <div class="product-content">
                                                <h2 class="product-name"><a href="#">Cras neque metus</a></h2>
                                                <div class="rating-price">
                                                    <div class="pro-rating">
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                        <a href="#"><i class="fa fa-star"></i></a>
                                                    </div>
                                                    <div class="price-boxes">
                                                        <span class="new-price">$110.00</span>
                                                    </div>
                                                </div>
                                                <div class="product-desc">
                                                    <p>Nunc facilisis sagittis ullamcorper. Proin lectus ipsum, gravida et mattis vulputate, tristique ut lectus. Sed et lorem nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Aenean eleifend laoreet congue. Viva</p>
                                                </div>
                                                <div class="actions-e">
                                                    <div class="action-buttons">
                                                        <div class="add-to-cart">
                                                            <a href="#">Add to cart</a>
                                                        </div>
                                                        <div class="add-to-links">
                                                            <div class="add-to-wishlist">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                                            </div>
                                                            <div class="compare-button">
                                                                <a href="#" data-toggle="tooltip" title="" data-original-title="Compare"><i class="fa fa-refresh"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-product end -->
                            </div>
                        </div>
                        <!-- shop toolbar start -->
                        <div class="shop-content-bottom">
                            <div class="shop-toolbar btn-tlbr">

                                <div class="col-md-4 col-sm-4 col-xs-12 text-center">
                                    <div class="pages">
                                        <label>Page:</label>
                                        <ul>
                                            <li class="current">1</li>
                                            <li><a href="#">2</a></li>
                                            <li><a href="#" class="next i-next" title="Next"><i class="fa fa-arrow-right"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- shop toolbar end -->
                    </div>
                </div>
                <!-- right sidebar end -->
            </div>
        </div>
    </div>
    <!-- shop-with-sidebar end -->
    <!-- Brand Logo Area Start -->
    <div class="brand-area">
        <div class="container">
            <div class="row">
                <div class="brand-carousel">
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg1-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg2-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg3-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg4-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg5-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg2-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg3-brand.jpg')}}" alt="" /></a></div>
                    <div class="brand-item"><a href="#"><img src="{{asset('img/brand/bg4-brand.jpg')}}" alt="" /></a></div>
                </div>
            </div>
        </div>
    </div>
@stop
