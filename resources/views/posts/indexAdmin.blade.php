@extends('layouts.app')

@section('content')
<div class="container">


    <div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col">title</th>
            <th scope="col">description</th>
            <th scope="col">post creator</th>
            <th scope="col">action</th>
           </tr>
        </thead>
        <tbody>
            @foreach($allPosts as $post)
            <tr >
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>{{ isset($post->user) ? $post->user->name : 'Not Found' }}</td>
                <td>

                    <a class="btn btn-danger" href="{{route('posts.destroy',$post->id)}}" onclick="return confirm('are you sure!!')">delete</a>
                    @if($post->user->id == auth()->user()->id)
                    <a class="btn btn-success" href="{{route('posts.edit',$post->id)}}">update</a>
                    @endif

                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>

    <div class="row d-flex w-25 my-5 text-center">
    <a class="btn btn-info p-2 fw-bold  justify-content-center  py-3"href="{{route('posts.create')}}">create ew post</a>
    </div>

</div>

@endsection
