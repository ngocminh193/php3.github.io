@extends('admin.layout.layout')
@section('contents')
<form action="{{route('category.update',$category->id)}}" method="POST" role="form">
@csrf @method('PUT')
<input type="hidden" name="id" value="{{$category->id}}">
<div class="form-group">
    <label for="">Name</label>
    <input type="text" value="{{$category->name}}" name="name" value="{{old('name')}}" class="form-control">
    @error('name')
    <small class="alert alert-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Status</label>
    <div class="radio">
        <label>
            <input type="radio" name="status" value="1"<?php echo $category->status == 1 ? 'checked' : ''; ?> >
            Public
        </label>
        <label>
            <input type="radio" name="status" value="0"<?php echo $category->status == 0 ? 'checked' : ''; ?> >
            Private
        </label>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
