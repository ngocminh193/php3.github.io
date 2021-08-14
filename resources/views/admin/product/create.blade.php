@extends('admin.layout.layout')
@section('contents')
<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data" role="form">
@csrf
<div class="row">
    <div class="col-md-9">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" name="name" value="{{old('name')}}" class="form-control">
            @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="desc" class="form-control" style="height: 210px">{{old('desc')}}</textarea>
            @error('desc')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Category</label>
            <select name="category_id" class="form-control">
                <option value="">Select one</option>
                @foreach ($cats as $cat)
                <option value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            @error('category_id')
    <small class="text-danger">{{$message}}</small>
    @enderror
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="text" name="price" value="{{old('price')}}" class="form-control">
            @error('price')
    <small class="text-danger">{{$message}}</small>
    @enderror
        </div>
        <div class="form-group">
            <label for="">Sale price</label>
            <input type="text" name="sale_price" value="{{old('sale_price')}}" class="form-control">
            @error('sale_price')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" name="file_upload" value="{{old('image')}}" class="form-control">
            @error('image')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection
