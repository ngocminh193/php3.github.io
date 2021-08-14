@extends('admin.layout.layout')
@section('contents')
@section('title')
    Quản lý category
@endsection
<form action="" class="form-inline">
    <a href="{{route('category.create')}}" class="btn btn-info col-md-1">Create</a>

    <div class="form-group" style="margin-left: 10px">
        <input type="text" name="key" class="form-control" placeholder="Search">
    </div>
    <button type="submit" class="btn btn-primary">
        <i class="fas fa-search"></i>
    </button>
</form>
<table class="table table-hover"><br>
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Total product</th>
            <th>Status</th>
            <th>Create at</th>
            <th >Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $cat)
            <tr>
                <td>{{$cat->id}}</td>
                <td>{{$cat->name}}</td>
                <td>{{$cat->products->count()}}</td>
                <td>
                    @if($cat->status == 0)
                    <span class="badge badge-danger">Private</span>
                    @else
                    <span class="badge badge-success">Publish</span>
                    @endif
                </td>
                <td>{{$cat->created_at->format('m-d-Y')}}</td>
                <td>
                    <form method="POST" action="{{route('category.destroy', $cat->id)}}">
                    <a href="{{route('category.edit', $cat->id)}}" class="btn btn-xs btn-primary">Edit</a>
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
<div class="">
    {{$data->appends(request()->all())->links()}}
</div>
@stop()
