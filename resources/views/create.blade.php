@extends('layout')

@section('content')

    <form action="{{route('task.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputEmail1">Title</label>
            <input type="text" class="form-control" name="title">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Content</label>
            <input type="text" class="form-control" name="contents">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Images</label>
            <input type="file" class="form-control" name="images">
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>

@endsection
