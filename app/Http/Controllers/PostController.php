<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{

    public function index()
    {
        // $dt = Carbon::create('2022-02-20 20:57:46');
        // echo $dt->toDateString();  
        $posts = Post::all();
        return view('posts.index', [
            'posts'=>Post::paginate(5), 
        ]);
    }

//========================================================//

    public function create(){
        $users = User::all();
        return view('posts.create',[
            'users'=>$users,
        ]);
    }

    public function store() {
        $formData = request()->all();
        Post::create($formData);
        // Post::create([
        //     'title'=>$formData['title'],
        //     'description'=>$formData['description'],            
        //     'posted_by'=>$formData['posted_by'],            
        // ]);

        // return redirect("/posts");
        return redirect()->route("posts.index");
    }

//========================================================//

    public function show($postId){
        $post = Post::find($postId);
        return view('posts.show',['post'=>$post]);
    }

//========================================================//

    public function edit($postId){
        $post = Post::find($postId);
        $users = User::all();
        return view('posts.edit', ['post'=>$post, 'users'=>$users]);
    }

    public function update($postId){
        $formData = request()->all();
        array_shift($formData);
        array_shift($formData);
        Post::where('id',$postId)->update($formData);
        return redirect()->route("posts.index");
    }

//========================================================//

    public function destroy($postId){
        Post::find($postId)->delete();
        return redirect()->route("posts.index");
    }
}
