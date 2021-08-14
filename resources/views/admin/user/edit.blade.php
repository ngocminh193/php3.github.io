@extends('admin.layout.layout')
@section('contents')
<form action="{{route('user.update',$user->id)}}" method="POST" role="form">
@csrf @method('PUT')
<div class="form-group">
    <label for="">Name</label>
    <input type="text" value="{{$user->name}}" name="name" class="form-control">
    @error('name')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Email</label>
    <input type="text" value="{{$user->email}}" name="email" class="form-control">
    @error('email')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Address</label>
    <input type="text" value="{{$user->address}}" name="address" class="form-control">
    @error('address')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Gender</label>
    <select class="mt-3 form-control" name="gender" value="{{$user->gender}}">
        <option value="">Cho gioi tinh</option>
        <option {{ $user->gender == 1 ? "selected" : "" }} value="1">Female</option>
        <option {{ $user->gender == 0 ? "selected" : "" }} value="0">Male</option>
    </select>
    @error('gender')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<div class="form-group">
    <label for="">Role</label>
    <select class="mt-3 form-control" name="role" value="{{$user->role}}">
        <option {{ $user->role == 0 ? "selected" : "" }} value="0">User</option>
        <option {{ $user->role == 1 ? "selected" : "" }} value="1">Admin</option>
    </select>
    @error('role')
    <small class="text-danger">{{$message}}</small>
    @enderror
</div>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection
