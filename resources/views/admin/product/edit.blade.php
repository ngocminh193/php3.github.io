@extends('admin.layout.layout')
@section('contents')
<form action="{{route('product.update', $product->id)}}" method="POST" enctype="multipart/form-data" role="form">
@csrf @method('PUT')
<div class="row">
    <div class="col-md-9">
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" value="{{$product->name}}" name="name" class="form-control">
            @error('name')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea name="desc" value="" class="form-control" style="height: 210px">{{$product->desc}}</textarea>
            @error('desc')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="">Category</label>
            <select name="category_id" value="{{$product->category_id}}" class="form-control">
                @foreach ($cats as $cat)
                <?php $selected = $cat->id == $product->category_id ? 'selected' : ''; ?>
                <option {{$selected}} value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="text" name="price" value="{{$product->price}}" class="form-control">
            @error('price')
            <small class="text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Sale price</label>
            <input type="text" name="sale_price" value="{{$product->sale_price}}" class="form-control">
            @error('sale_price')
            <small class="text-danger"{{$message}}></small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <span class="input-group-btn">
                <input type="file"  name="file_upload" value="{{$product->image}}">
            </span>
            <img src="{{url('uploads')}}/{{$product->image}}" width="100px" alt="">
            @error('image')
            <small class="text-danger"></small>
            @enderror
        </div>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection
