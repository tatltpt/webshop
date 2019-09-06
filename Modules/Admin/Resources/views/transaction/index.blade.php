@extends('admin::layouts.master')
@section('content')
    <div class="page-header">
        <ol class="breadcrumb">
            <li><a href="">Trang chủ</a></li>
            <li><a href=""> Đơn hàng</a></li>
            <li class="active">Danh sách</li>
        </ol>
    </div>

    <div class="table-responsive">
        <h2>Quản lý đơn hàng</h2>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>STT</th>
                <th>Tên khách hàng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Tổng tiền</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
                @foreach($transactions as $transaction)
                    <tr>
                        <td>{{$transaction->id}}</td>
                        <td>{{isset($transaction->user->name) ? $transaction->user->name : 'N\A'}}</td>
                        <td>{{$transaction->tr_address}}</td>
                        <td>{{$transaction->tr_phone}}</td>
                        <td>{{number_format($transaction->tr_total,0,',','.')}} VNĐ</td>
                        <td>
                            <a href="{{route('admin.get.action.transaction',['active',$transaction->id])}}" class="label {{$transaction->getStatus($transaction->tr_status)['class']}}">{{$transaction->getStatus($transaction->tr_status)['name']}}</a>
                        </td>
                        <td>
                            <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" class="btn_customer_action" href=""><i class="far fa-trash-alt" style="font-size: 11px"></i> Xóa</a>
                            <a style="padding: 5px 10px;border: 1px solid #999;font-size: 12px" data-id="{{$transaction->id}}" class="btn_customer_action js_order_item" href="{{route('admin.get.view.order',$transaction->id)}}"><i class="fas fa-eye" style="font-size: 11px"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="modal fade" id="myModalOrder" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Chi tiết mã đơn hàng #<b class="transaction_id"></b></h4>
                </div>
                <div class="modal-body" id="md_content">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>
@stop
@section('script')
    <script>
        $(function(){
            $(".js_order_item").click(function(event){
                event.preventDefault();
                let $this = $(this);
                let url = $this.attr('href');
                $("#md_content").html('')
                $(".transaction_id").text('').text($this.attr('data-id'))
                $("#myModalOrder").modal('show');

                $.ajax({
                    url:url,
                }).done(function(result) {
                    if(result)
                    {
                        $("#md_content").append(result);
                    }
                });
            });
        })
    </script>
@stop
