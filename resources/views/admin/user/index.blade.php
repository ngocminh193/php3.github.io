@extends('admin.layout.layout')
@section('contents')
<h3 class="font-weight-bold">User</h3>
<form action="" class="form-inline">
    <a  href="{{route('user.create')}}" class="btn btn-info col-md-1">Create</a>

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
            <th>Email</th>
            <th>Address</th>
            <th>Gender</th>
            <th>Role</th>
            <th>Created</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->name}}</td>
                <td>{{$item->email}}</td>
                <td>{{$item->address}}</td>
                <td>{{ $item->gender == config('common.user.gender.male') ? "Nam" : "Nữ" }}</td>
                <td>{{ $item->role == config('common.user.role.user') ? "User" : "Admin" }}</td>
                <td>{{$item->created_at->format('m-d-Y')}}</td>
                <td>
                    <form method="POST" action="{{route('user.destroy', $item->id)}}">
                    <a href="{{route('user.edit', $item->id)}}" class="btn btn-xs btn-primary">Edit</a>
                    @csrf @method('DELETE')
                    <button href="" class="btn btn-xs btn-danger"
                    onclick="return confirm('Bạn có muốn xóa?')"  >Delete
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
