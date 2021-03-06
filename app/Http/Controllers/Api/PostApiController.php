<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CommentResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index()
    {
        $posts = Post::with(['author', 'category', 'tags', 'images', 'videos', 'comments'])->paginate();
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::with([
            'author', 'category', 'tags', 'images', 'videos', 'comments' => function ($query) {
                $query->with(['author']);
            }
        ])->find($id);
        return new PostResource($post);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
        ]);
        return Post::create($request->all());
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        return $post->update($request->all());
    }

    public function destroy($id){
        return Post::destroy($id);
    }

    public function comments($id)
    {
        $post = Post::find($id);
        $comments = $post->comments->all();
        return CommentResource::collection($comments);
    }

    public function search($name){
        return Post::where('title', 'like', '%'.$name.'%')->get();
    }
}
