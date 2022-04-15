<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index(){
        if(auth()->user()->role == 'author'){
           $posts= PostResource::collection(Post::where('user_id',auth()->user()->id)->get());

           return view('posts.index',compact('posts'));
        }else{

            $allPosts=PostResource::collection(Post::all());
            return view('posts.indexAdmin',compact('allPosts'));

        }
    }



    public function create(){
        return view('posts.createPost');
    }



    public function store(PostRequest $request){
        $post=$request->all();

        Post::create([
            'title'=>$post['title'],
            'description'=>$post['description'],
            'user_id'=>auth()->user()->id
        ]);

        return redirect()->route('posts.index');
    }


    public function edit($postId){

        $post = Post::find($postId);
        return view('posts.editPost',compact('post'));

    }



    public function update(PostRequest $request,$postId){

        $data = $request->all();

        POST::find($postId)->update([

        'title' => $data['title'],
        'description' => $data['description'],
        ]);
        return redirect()->route('posts.index');

    }


    public function destroy($postId){

        $post=Post::find($postId)->delete();
        return redirect()->route('posts.index');

    }

}
