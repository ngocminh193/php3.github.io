@extends('admin.layout.layout')
@section('contents')
<div class="row">
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <div class="inner">
          <h3>{{$product_count}}</h3>

          <p>Product</p>
        </div>
        <div class="icon">
          <i class="ion ion-bag"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-success">
        <div class="inner">
          <h3>{{$category_count}}<sup style="font-size: 20px"></sup></h3>

          <p>Category</p>
        </div>
        <div class="icon">
          <i class="ion ion-stats-bars"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-warning">
        <div class="inner">
          <h3>{{$user_count}}</h3>

          <p>User</p>
        </div>
        <div class="icon">
          <i class="ion ion-person-add"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-danger">
        <div class="inner">
          <h3>65</h3>

          <p>Unique Visitors</p>
        </div>
        <div class="icon">
          <i class="ion ion-pie-graph"></i>
        </div>
        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
{{--Đơn hàng  --}}
<div class="panel-heading">Đơn hàng mới</div>
<div class="panel-body">
    <form action="" method="GET" class="form-inline">
        <div class="form-group">
            <input type="date" class="form-control" name="date_form">
        </div>
        <div class="form-group">
            <input type="date" class="form-control" name="date_to">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<table class="table"><br>
    <thead>
        <tr>
        <th>Stt</th>
        <th>Tên khác hàng</th>
        <th>Ngày đặt</th>
        <tr></tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td></td>
            <td>{{$order->cus->name}}</td>
            <td>{{$order->created_at}}</td>
            <td>1</td>
        </tr>
        @endforeach
    </tbody>
</table>

@stop()

