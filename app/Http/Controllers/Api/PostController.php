<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\AuthorPostsResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{


   public function allPosts(){
        $allpost=Post::all();
        return PostResource::collection($allpost);
    }


    public function userPosts($userId){
        $user=User::find($userId);
        $userPosts=Post::where(['user_id',$userId])->get();
        return PostResource::collection($userPosts);
    }


    public function store(PostRequest $request){
        $post=$request->all();

        Post::create([
            'title' => $post['title'],
            'description' => $post['description'],
            'user_id' => $post['post_creator'],
        ]);

        return new PostResource($post);
    }



    public function update($postId,PostRequest $request){
        $post=$request->all();

        Post::find($post)->update([
            'title' => $post['title'],
            'description' => $post['description'],
            'user_id' => $post['post_creator'],
        ]);

        return new PostResource($post);
    }


    public function getPosts(Request $request){
        // dd($request->user()->id);

        if($request->user()->role == 'admin'){
            $allposts=Post::all();
            return PostResource::collection($allposts);
        }else{
            $posts=Post::where('user_id',$request->user()->id)->get();
            return AuthorPostsResource::collection($posts);
        }
    }
}
