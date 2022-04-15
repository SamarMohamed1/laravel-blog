@extends('layouts.app')

@section('content')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="container d-flex mt-5  justify-content-center" >
    <div class="  text-center  w-50 ">
        <form method="POST" action="{{route('posts.update',$post->id)}}" >
            @csrf
        <div class="form-group">
            <label for="title" class="fw-bold">add title</label>
            <input type="text" class="form-control  bg-white py-3" name="title" value="{{$post->title}}"  id="title">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1" class="fw-bold">add description</label>
            <textarea class="form-control  bg-white py-3" name="description" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-success mt-3 p-3 fw-bold" >update</button>
        </form>
    </div>
</div>
@endsection
