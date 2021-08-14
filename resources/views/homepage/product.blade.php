@extends('homepage.layout')
@section('main')
<div class="container">
    <div class="jumbotron">
        <div class="container">
            <h1>Hello home</h1>
            <p>content...</p>
            <p>
                <a href="" class="btn btn-primary btn-lg">Learn more</a>
            </p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <ul class="list-group">
            @foreach ($category as $cat )
            <li class="list-group-item d-flex justify-content-between align-items-center">
              <a href="{{route('homepage.view', [$cat->id])}}">{{$cat->name}}</a>
              <span class="badge badge-primary badge-pill">{{$cat->products->count()}}</span>
            </li>
            @endforeach
          </ul>
    </div>
    <div class="col-md-9">
        <div class="row">
            <div class="col-md-12">
                <h2>Danh mục {{$model->name}}</h2>
            </div>
            @foreach($model->products as $product)
            <div class="col-md-3">
                <div class="thumbnai text-center">
                    <img src="{{url('uploads')}}/{{$product->image}}" alt="" style="width: 100%">
                    <div class="caption"><br>
                        <h5 class="card-subtitle mb-2 text-muted">{{$product->name}}</h5>
                        @if($product->sale_price > 0)
                        <s>Price: {{number_format($product->price)}}Đ</s><br>
                        <b>Sale price: {{number_format($product->sale_price)}}Đ</b>
                        @else
                        <b>Price: {{number_format($product->price)}}Đ</b>
                        @endif
                        <p>

                            <a href="{{route('homepage.detail', ['id' => $product->id])}}" class="btn-xs btn btn-primary">Detail</a>
                            <a href="{{route('cart.add', ['id'=>$product->id])}}" class="btn-xs btn btn-secondary">Add to card</a>

                        </p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>


    </div>
</div>
@stop()
