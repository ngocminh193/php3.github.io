@extends('admin.layout.layout')
@section('contents')
<form action="{{route('user.store')}}" method="POST" role="form">
@csrf
<div class="form-group">
    <label for="">Name</label>
    <input type="text" name="name" value="{{old('name')}}" class="form-control">
    @error('name')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="text" name="email" value="{{old('email')}}" class="form-control">
    @error('email')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Address</label>
    <input type="text" name="address" value="{{old('address')}}" class="form-control">
    @error('address')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Password</label>
    <input type="password" name="password" class="form-control">
    @error('password')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Gender</label>
    <select class="mt-3 form-control" name="gender" value="{{old('gender')}}">
        <option value="">Chọn giới tính</option>
        <option value="1">Female</option>
        <option value="0">Male</option>
    </select>
    @error('gender')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Role</label>
    <select class="mt-3 form-control" name="role" value="{{old('role')}}">
        <option value="">Chọn role</option>
        <option value="1">Admin</option>
        <option value="0">User</option>
    </select>
    @error('role')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>

</form>
@endsection
