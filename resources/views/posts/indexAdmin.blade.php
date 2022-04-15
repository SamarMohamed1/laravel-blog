@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    <a class="btn btn-info" href="{{route('posts.create')}}">create post</a>

    </div>
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
                    <a class="btn btn-success" href="{{route('posts.edit',$post->id)}}">update</a>
                    <a class="btn btn-danger" href="{{route('posts.destroy',$post->id)}}">delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>

</div>

@endsection
