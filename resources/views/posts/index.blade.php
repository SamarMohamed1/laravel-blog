@extends('layouts.app')

@section('content')
<div class=" container text-center ">

    <div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
            <th scope="col  fw-bold">title</th>
            <th scope="col   fw-bold">description</th>
            <th scope="col  fw-bold">action</th>
           </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr >
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>
                    <a class="btn btn-success" href="{{route('posts.edit',$post->id)}}">update</a>
                    <a class="btn btn-danger" href="{{route('posts.destroy',$post->id)}}" onclick="return confirm('are you sure!!')">delete</a>

                </td>
            </tr>
            @endforeach
        </tbody>
        </table>
    </div>

    <div class="row d-flex w-25 my-5 text-center">
    <a class="btn btn-info p-2 fw-bold  justify-content-center  py-3" href="{{route('posts.create')}}">create new post</a>
    </div>

</div>

@endsection
