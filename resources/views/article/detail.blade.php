@extends('layouts.app')
@section('content')
    <style>
        .article_content h2{font-size: 1.4rem}
        .article_content{font-family: Roboto,sans-serif}
    </style>
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
                            <li class="home">
                                <a href="{{route('get.list.article')}}">Bài viết</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>
                            <li class="category3"><span>{{$articleDetail->a_name}}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-9">
                   <div class="article_content" style="margin-bottom: 20px">
                        <h1>{{$articleDetail->a_name}}</h1>
                       <p style="font-weight: 500;color: #333">{{$articleDetail->a_description}}</p>
                        <div>
                            {!! $articleDetail->a_content !!}
                        </div>
                       <h4>Bài viết khác</h4>
                       @if(isset($articles))
                           @foreach($articles as $article)
                               <div class="article" style="padding-bottom: 10px;margin-bottom: 10px;border-bottom: 1px solid #f2f2f2;display: flex">
                                   <div class="article_avatar"></div>
                                   <a href="{{route('get.detail.article',[$article->a_slug,$article->id])}}">
                                       <img src="{{pare_url_file(($article->a_avatar))}}" style="width: 200px;height: 120px" alt="">
                                   </a>
                                   <div class="article_info" style="width: 80%;margin-left: 20px">
                                       <h2 style="font-size: 14px"><a href="{{route('get.detail.article',[$article->a_slug,$article->id])}}">{{$article->a_name}}</a></h2>
                                       <p style="font-size: 13px">{{$article->a_description}}</p>
                                       <p>Anh Tú   <span>{{$article->created_at}}</span></p>
                                   </div>
                               </div>
                           @endforeach
                               {!! $articles->links() !!}
                       @endif
                   </div>
                </div>
                <div class="col-sm-3">
                    <h5>Bài viết nổi bật</h5>
                    <div class="list_article_hot">
                        @if(isset($articleHot))
                            @foreach($articleHot as $aHot)
                                <div class="article_hot_item">
                                    <div class="article_img">
                                        <a href="{{route('get.detail.article',[$aHot->a_slug,$aHot->id])}}">
                                            <img src="{{pare_url_file($aHot->a_avatar)}}" alt="" style="max-height: 200px">
                                        </a>
                                    </div>
                                    <div class="article_info">
                                        <h3 style="font-size: 16px;margin-top: 10px;margin-bottom: 10px">{{$aHot->a_name}}</h3>
                                        <p>{{$aHot->a_description}}</p>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
