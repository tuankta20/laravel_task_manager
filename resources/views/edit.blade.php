@extends('layout')

@section('content')

    <form action="{{route('task.update',$task->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title" value="{{$task->title}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <input type="text" class="form-control" name="contents" value="{{$task->content}}">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Images</label>
            <input type="file" class="form-control" name="images" value="{{$task->images}}">
        </div>

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

@endsection
