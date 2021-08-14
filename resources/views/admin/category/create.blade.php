@extends('admin.layout.layout')
@section('contents')
<form action="{{route('category.store')}}" method="POST" role="form">
@csrf
<div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" value="{{old('name')}}" class="form-control">
    @error('name')
    <small class="alert alert-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Status</label>
    <div class="radio">
        <label>
            <input type="radio" name="status" value="1" checked>
            Public
        </label>
        <label>
            <input type="radio" name="status" value="0" checked>
            Private
        </label>
    </div>
</div>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection
