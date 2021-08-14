@extends('homepage.layout')
@section('main')
<form action="" class="form">
    @csrf
    <div class="form-group">
        <label class="sr-only" for="">Email</label>
        <input type="email" class="form-control" name="email">
    </div>
    <div class="form-group">
        <label class="sr-only" for="">Password</label>
        <input type="password" class="form-control" name="password">
    </div>
    <div class="form-group">
        <label for="">
            <input type="checkbox" value="remember">
            Lưu mật khẩu
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@stop
