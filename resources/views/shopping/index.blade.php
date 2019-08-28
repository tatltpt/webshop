@extends('layouts.app')
@section('content')
<div class="our-product-area new-product">
    <div class="container">
    <div class="area-title">
        <h2>Giỏ hàng của bạn</h2>
    </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên sản phẩm</th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
           <?php $i = 1 ?>
                @foreach($products as $key=>$product)
                    <tr>
                        <td>{{$i}}</td>
                        <td><a href=""> {{$product->name}}</a></td>
                        <td><img  src="{{ pare_url_file($product->options->avatar) }}" alt=""  style="width: 80px;height: 80px;" ></td>
                        <td>{{number_format($product->price,0,',','.')}}đ</td>
                        <td>{{$product->qty}}</td>
                        <td>{{number_format($product->qty * $product->price,0,',','.')}}đ</td>
                        <td>
                            <a href="" style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" ><i class="fas fa-pencil-alt" style="font-size: 11px"></i> Cập nhật</a>
                            <a href="{{route('delete.shopping.cart',$key)}}" style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" ><i class="far fa-trash-alt" style="font-size: 11px"></i> Xóa</a>
                        </td>
                    </tr>
                    <?php $i ++ ?>
                @endforeach
            </tbody>
        </table>
        <h4 class="pull-right">Tổng tiền cẩn thanh toán {{Cart::subtotal()}}<a href="{{route('get.form.pay')}}" class="btn-success btn">Thanh toán</a></h4>
    </div>
    </div>
@stop
