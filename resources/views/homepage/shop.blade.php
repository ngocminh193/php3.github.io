@extends('homepage.layout')
@section('main')
<div class="panel-heading">Giỏ hàng</div>
<table class="table"><br>
    <thead>
        <tr>
        <th>Stt</th>
        <th>Tên sản phẩm</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <tr></tr>
    </thead>
    <tbody>
        <?php $n = 1; ?>
        @foreach ($cart->items as $item )
        <tr>
            <td>{{$n}}</td>
            <td>{{$item['name']}}</td>
            <td>{{$item['price']}}</td>
            <td>
                <form action="{{route('cart.update',['id' => $item['id']])}}" method="get">
                <div class="input">
                <input  type="number" name="quantity" value="{{$item['quantity']}}">
                <input type="submit" class="btn btn-xs btn-primary" value="Update" >
                </form>
            </td>
            <td>
            <button class="btn btn-xs btn-danger" onclick="return confirm('Bạn có muốn xóa sản phẩm?')" >
                <a href="{{route('cart.remove', ['id'=>$item['id']])}}" style="color: white;text-decoration:none ">Remove</a>
            </button>
            </td>
        </tr>
        <?php $n++; ?>
        @endforeach

    </tbody>
</table>
    <div class="container">
        <h3>Tổng tiền: {{number_format($cart->total_price)}} Đ</h3>
        <p>
            <a href="{{route('cart.clear')}}" class="btn btn-danger">Remove all</a>
            <a href="{{route('homepage.home')}}" class="btn btn-primary">Tiếp tục mua hàng</a>
            <a href="{{route('checkout')}}" class="btn btn-secondary">Đặt hàng</a>
        </p>
    </div>

@stop()
