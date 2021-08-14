@extends('homepage.layout')
@section('main')
<h2>Đặt Hàng</h2>
<div class="row">
    <div class="col-md-4">
        <form action="" method="POST" class="form">
            @csrf
            <div class="form-group">
                <label for="">Name</label>
                <input class="form-control" type="text" name="name" >
            </div>
            <div class="form-group">
                <label for="">Email</label>
                <input class="form-control" type="email" name="email" value="">
            </div>
            <div class="form-group">
                <label for="" >Phone</label>
                <input class="form-control" name="phone" value="">
            </div>
            <div class="form-group">
                <label for="" >Address</label>
                <input class="form-control" type="text" name="address" value="">
            </div>
            <div class="form-group">
                <label for="" >Order note</label>
                <input class="form-control" type="text" name="order_note">
            </div>
            <button type="submit" class="btn btn-primary">Đặt hàng</button>
        </form>
    </div>
    <div class="col-md-8">
        <table class="table"><br>
            <thead>
                <tr>
                <th>Stt</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <tr></tr>
            </thead>
            <tbody>
                <?php $n = 1; ?>
                @foreach ($cart->items as $item )
                <tr>
                    <td>{{$n}}</td>
                    <td>{{$item['name']}}</td>
                    <td>{{$item['price']}}</td>
                    <td>{{$item['quantity']}}</td>
                    <td>{{$item['price']*$item['quantity']}}</td>
                </tr>
                <?php $n++; ?>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@stop
{{-- value="{{Auth::guard('cus')->user()->name}}" --}}
