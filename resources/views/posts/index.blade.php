@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel CRUD Example </h2>
        </div>
        <div class="pull-right pb-5">
            <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($posts as $post)
    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->description }}</td>
        <td>
            <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>



@endsection
