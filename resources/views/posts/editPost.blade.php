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
<form method="POST" action="{{route('posts.update',$post->id)}}" >
    @csrf
  <div class="form-group">
    <label for="exampleInputEmail1">add title</label>
    <input type="text" class="form-control" name="title" value="{{$post->title}}"  id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">add description</label>
    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3">{{$post->description}}</textarea>
  </div>
  <button type="submit" class="btn btn-primary" >Submit</button>
</form>

@endsection
