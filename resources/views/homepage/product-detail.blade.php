@extends('homepage.layout')
@section('main')
<div class="row">
    <div class="col-md-5">
        <img src="{{url('uploads')}}/{{$model->image}}" alt="" style="width: 100%">
    </div>
    <div class="col-md-7">
        <h1>{{$model->name}}</h1>
        <s>Price: {{number_format($model->price)}}Đ</s><br>
        <b>Sale price: {{number_format($model->sale_price)}}Đ</b>

        <div class="">{{$model->desc}}</div>
        <p>
            <form action="" method="POST" class="form-inline" role="form">
                <div class="form-group">
                    <input type="number" class="form-control" name="quantity" value="{{$cart->total_quantity}}" placeholder="Quantity">
                </div>
                <a href="{{route('cart.add', ['id'=>$model->id])}}" class="btn-xs btn btn-secondary">Add to card</a>
            </form>
        </p>
    </div>
</div>
@stop()
