{{-- @dd($posts) --}}
@extends('layout.app')
@section('content')
@section('title')
All Posts
@endsection

<div class="text-center mt-4">
    <a href={{route('posts.create')}} class="btn btn-success">Create Post</a>
</div>
<table class="table table-dark table-striped mt-3 w-75 m-auto">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->title}}</td>
            <td>{{$post->user->name}}</td>
            <td>{{\Carbon\Carbon::parse($post->created_at)->format('Y-m-d')}}</td>
            <td>
                <a href={{route('posts.show',['postID'=>$post->id])}} class="btn btn-info">Show</a>
                <a href={{route('posts.edit',['postID'=>$post->id])}} class="btn btn-primary">Edit</a>
                <form method="POST" action="{{route('posts.destroy',['postID'=>$post->id])}}" class="d-inline">
                    @csrf
                    @method('Delete')
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Delete
                    </button>

                    <!-- Modal -->
                    <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Warning</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure that you want to delete this post? 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">No</button>
                                    <button type="submit" class="btn btn-danger">Yes</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="w-50 m-auto mt-3">
       {!!$posts->links()!!}
</div>
@endsection
