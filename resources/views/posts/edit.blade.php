
@extends('layout.app')
@section('content')
@section('title')
    Edit
@endsection   

<div class="mb-3" >
    <form class="mt-5" method="post" action="{{route('posts.update', ['postID'=>$post['id']])}}">
        @csrf
        @method('put')
    <label class="form-label">Title</label>
    <input type="text" class="form-control" name="title" value="{{$post->title}}">
</div>
<div class="mb-3">
    <label class="form-label">Description</label>
    <textarea type="text" class="form-control" name="description">{{$post->description}}</textarea>
</div>
<div class="mb-3">
    <label class="form-label">Post Creator</label>
    <select name="user_id" class="form-select">
        @foreach ($users as $user)          
       <option value="{{$user->id}}" {{$user->id==$post->user_id?"Selected":""}}>{{$user->name}}</option>
        @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Create</button>
</form>

@endsection
