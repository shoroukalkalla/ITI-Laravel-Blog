@extends('layout.app')
@section('content')
@section('title')
    Show
@endsection   

<div class="card mt-4">
    <div class="card-header">
      Post Info
    </div>
    <div class="card-body">
      <h5 class="card-title d-inline">Title:</h5>
      <span class="card-text" >{{$post->title}}</span>
      <br/>
      <h5 class="card-title d-inline">Description:</h5>
      <span class="card-text">{{$post->description}}</span>
    </div>
  </div>

  <div class="card mt-5">
    <div class="card-header">
      Post Creator Info
    </div>
    <div class="card-body">
      <h5 class="card-title d-inline">Name:</h5>
      <span class="card-text">{{$post->user->name}}</span>
      <br/>
      <h5 class="card-title d-inline">Email:</h5>
      <span class="card-text">{{$post->user->email}}</span>
      <br/>
      <h5 class="card-title d-inline">Created At:</h5>
      <span class="card-text">{{$post->created_at}}</span>
    </div>
</div>
<div class="mt-3 text-center">
    <a href="{{route('posts.index')}}" class="btn btn-primary">Go Back</a>
</div>
@endsection    
