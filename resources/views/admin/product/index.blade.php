@extends('admin.layout.layout')
@section('contents')
<h3 class="font-weight-bold">Product</h3>
<form action="" class="form-inline">
    <a  href="{{route('product.create')}}" class="btn btn-info col-md-1">Create</a>

    <div class="form-group" style="margin-left: 10px">
        <input type="text" name="key" class="form-control" placeholder="Search">
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>
@if (!empty($data))
<table class="table table-hover">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Category</th>
            <th>Price/Sale price</th>
            <th>Description</th>
            <th>Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $model)
            <tr>
                <td>{{$model->id}}</td>
                <td>{{$model->name}}</td>
                <td>{{$model->cat->name}}</td>
                <td>{{$model->price}}/ <span class="badge badge-success">{{$model->sale_price}}</span></td>
                <td>{{$model->desc}}</td>
                {{-- <td>{{url('uploads')}}/{{$model->image}}</td> --}}
                <td><img src="{{url('uploads')}}/{{$model->image}}" alt="not found" width="100px" ></td>
                <td>
                    <form method="POST" action="{{route('product.destroy', $model->id)}}">
                    <a href="{{route('product.edit', $model->id)}}" class="btn btn-xs btn-primary">Edit</a>
                    @csrf @method('DELETE')
                    <button href="" class="btn btn-xs btn-danger"
                    onclick="return confirm('Bạn có muốn xóa không?')">Delete
                    </button>
                </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@else
<h2>Không có dữ liệu</h2>
@endif
<div class="">
    {{$data->appends(request()->all())->links()}}
</div>
@stop()
