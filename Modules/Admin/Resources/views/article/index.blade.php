@extends('admin::layouts.master')
@section('content')
		<div class="page-header">
			<ol class="breadcrumb">
 				<li><a href="#">Trang chủ</a></li>
  				<li><a href="#">Bài viết</a></li>
 				<li class="active">Danh sách</li>
			</ol>
		</div>
            <div class="row">
                <div class="col-sm-12">
                    <form class="form-inline" action="" style="margin-bottom: 20px">
                        <div class="form-group">
                            <input type="text" class="form-control"  placeholder="Tên bài viết ..." name="name" value="{{\Request::get('name')}}">
                        </div>
                        <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </form>
                </div>
            </div>
		    <div class="table-responsive">
		    	<h2>Quản lý bài viết<a href="{{ route('admin.get.create.article')}}" class='pull-right'><i class="fa fa-plus-circle" aria-hidden="true"></i></a></h2>
                <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên bài viết</th>
                                    <th>Hình ảnh</th>
                                    <th>Mô tả</th>
                                    <th>Trạng thái</th>
                                    <th>Ngày tạo</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if ( isset($article))
                                @foreach($article as $article)
                                    <tr>
                                        <td>{{$article->id}}</td>
                                        <td>
                                            {{$article->a_name}}
                                        </td>
                                        <td>
                                            <img src="{{ pare_url_file($article->a_avatar) }}" alt="" class="img img-responsive" style="width: 80px;height: 80px;">
                                        </td>
                                        <td>{{$article->a_description}}</td>
                                        <td>
                                            <a href="{{route('admin.get.action.article',['active',$article->id])}}" class="label {{$article->getStatus($article->a_active)['class']}}">{{$article->getStatus($article->a_active)['name']}}</a>
                                        </td>
                                        <td>
                                            {{$article->created_at}}
                                        </td>

                                        <td>
                                            <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" class="btm_customer_action" href="{{route('admin.get.edit.article',$article->id)}}"><i class="fas fa-pencil-alt" style="font-size: 11px"></i> Cập nhật</a>
                                            <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" class="btm_customer_action" href="{{route('admin.get.action.article',['delete',$article->id])}}"><i class="far fa-trash-alt" style="font-size: 11px"></i> Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
            </div>
@stop
