@extends('layouts.app')
@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="container-inner">
                        <ul>
                            <li class="home">
                                <a href="/">Home</a>
                                <span><i class="fa fa-angle-right"></i></span>
                            </li>

                            <li class="category3"><span>Contact-us</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-contact-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    @if(isset($articles))
                        @foreach($articles as $article)
                            <div class="article">
                                <div class="article_avatar"></div>
                                <a href="">
                                    <img src="{{pare_url_file(($article->a_avatar))}}" style="width: ;height: " alt="">
                                </a>
                                <div class="article_avatar">
                                    <h2>{{$article->a_name}}</h2>
                                    <p>{{$article->a_description}}</p>
                                    <p>Anh Tú<span>{{$article->create_at}}</span></p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="col-sm-4">
                   aaaa
                </div>
            </div>
        </div>
    </div>
@stop
