@if($orders)
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
        @foreach($orders as $key=>$order)
            <tr>
                <td>{{$i}}</td>
                <td><a href="{{route('get.detail.product',[str_slug($order->product->pro_name),$order->or_product_id])}}"> {{isset($order->product->pro_name) ? $order->product->pro_name : ''}} </a></td>
                <td><img  src="{{isset($order->product->pro_avatar) ? pare_url_file($order->product->pro_avatar) : ''}}" alt=""  style="width: 80px;height: 80px;" ></td>
                <td>{{number_format($order->or_price,0,',','.')}}đ</td>
                <td>{{$order->or_qty}}</td>
                <td>{{number_format($order->or_qty * $order->or_price,0,',','.')}}đ</td>
                <td>
                    <a href="" style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" ><i class="far fa-trash-alt" style="font-size: 11px"></i> Xóa</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif
