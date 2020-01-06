@extends('layout')

@section('content')
    <a class="btn btn-success" href="{{url('tasks\create')}}">Create</a>
    <form class="navbar-form navbar-left" action="{{route('task.search')}}" method="get">

    @csrf

    <div class="row">

        <div class="col-8">

            <div class="form-group">

                <input type="text" class="form-control" name="keyword" placeholder="Search" >

            </div>

        </div>

        <div class="col-4">

            <button type="submit" class="btn btn-default">Tìm kiếm</button>

        </div>

    </div>

    </form>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Images</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasks as $task)
        <tr>
            <td>{{$task->id}}</td>
            <td>{{$task->title}}</td>
            <td>{{$task->content}}</td>
            <td> <img src="{{ asset('/images/'.$task->images) }}" alt="K co img" style="width: 150px"></td>
            <td>
                <form action="{{route('task.destroy',$task->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <a class="btn btn-primary" href="{{route('task.edit',$task->id)}}">Edit</a>
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>

    </table>


@endsection
